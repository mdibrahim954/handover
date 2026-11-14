<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barcodescan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('user_id') || $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
    }

    public function index() {
        $data = array();
        $data['menu'] = 'inventory';
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);

        $this->load->view('dashboard-admin/inventory/barcodescan/barcodescan-view', $data);
    }

    public function lookup() {
        $barcode = trim((string) $this->input->post('barcode', TRUE));
        if ($barcode === '') {
            $this->send_json(array('success' => FALSE, 'message' => 'Scan or enter a barcode first.'), 400);
            return;
        }

        $itemCode = $barcode;
        $serialNumber = NULL;
        $product = $this->find_product($itemCode);

        if (empty($product) && preg_match('/^(.+)-(\d+)$/', $barcode, $matches)) {
            $itemCode = $matches[1];
            $serialNumber = $matches[2];
            $product = $this->find_product($itemCode);
        }

        if (empty($product)) {
            $this->send_json(array('success' => FALSE, 'message' => 'No product was found for barcode "' . $barcode . '".'), 404);
            return;
        }

        $inventoryLog = NULL;
        if ($serialNumber !== NULL) {
            $inventoryLog = $this->find_inventory_log($itemCode, $serialNumber);
        }

        $this->send_json(array(
            'success' => TRUE,
            'product' => array(
                'name' => $product->name,
                'item_code' => $product->item_code,
                'category' => $product->category_name ? $product->category_name : 'Uncategorized',
                'quantity' => (int) $product->qty,
                'serial_number' => $serialNumber,
                'sold' => !empty($inventoryLog) ? (int) $inventoryLog->sold : NULL,
                'serial_tracked' => !empty($inventoryLog)
            )
        ));
    }

    public function mark_sold() {
        $barcode = trim((string) $this->input->post('barcode', TRUE));
        if ($barcode === '') {
            $this->send_json(array('success' => FALSE, 'message' => 'Scan a serialized product barcode first.'), 400);
            return;
        }

        $itemCode = $barcode;
        $serialNumber = NULL;
        $product = $this->find_product($itemCode);
        if (empty($product) && preg_match('/^(.+)-(\d+)$/', $barcode, $matches)) {
            $itemCode = $matches[1];
            $serialNumber = $matches[2];
            $product = $this->find_product($itemCode);
        }

        if (empty($product)) {
            $this->send_json(array('success' => FALSE, 'message' => 'No product was found for barcode "' . $barcode . '".'), 404);
            return;
        }
        if ($serialNumber === NULL) {
            $this->send_json(array('success' => FALSE, 'message' => 'This barcode has no serial number. Scan the full product barcode.'), 400);
            return;
        }

        $inventoryLog = $this->find_inventory_log($itemCode, $serialNumber);
        if ($inventoryLog && (int) $inventoryLog->sold === 1) {
            $this->send_json(array(
                'success' => TRUE,
                'sold' => 1,
                'quantity' => (int) $product->qty,
                'message' => 'This product was already marked as sold.'
            ));
            return;
        }

        if (!$this->inventory_log_update($itemCode, $serialNumber)) {
            $this->send_json(array('success' => FALSE, 'message' => 'The sale status or product quantity could not be updated.'), 500);
            return;
        }

        $inventoryLog = $this->find_inventory_log($itemCode, $serialNumber);
        if (empty($inventoryLog) || !(int) $inventoryLog->sold) {
            $this->send_json(array('success' => FALSE, 'message' => 'The product could not be marked as sold.'), 500);
            return;
        }

        $this->send_json(array(
            'success' => TRUE,
            'sold' => (int) $inventoryLog->sold,
            'quantity' => (int) $this->find_product($itemCode)->qty,
            'message' => 'Product marked as sold.'
        ));
    }

    private function find_inventory_log($item_code, $serial) {
      
        return $this->db
                ->where('item_code', $item_code)
                ->where('serial', $serial)
                ->get('inventory_log')
                ->row();
    }
/**
 * sold = 1 korbe + product qty 1 komabe.
 * - log row nai       -> sold = 1 diye insert + qty - 1
 * - log row, sold = 0 -> sold = 1 update + qty - 1
 * - log row, sold = 1 -> kichu hobe na
 */
private function inventory_log_update($item_code, $serial)
{
    log_message('error', "CALLED: [$item_code] [$serial]");

    $this->db->trans_begin();

    $log = $this->find_inventory_log($item_code, $serial);
    log_message('error', 'LOG ROW: ' . json_encode($log));

    // already sold hole qty abar kombe na
    if ($log && (int) $log->sold === 1) {
        log_message('error', 'EARLY RETURN: already sold');
        $this->db->trans_rollback();
        return TRUE;
    }

    if ($log) {
        // UPDATE: sold 0 -> 1
        $this->db
            ->where('item_code', $item_code)
            ->where('serial', $serial)
            ->where('sold', 0)
            ->update('inventory_log', array('sold' => 1));

        $logOk = ($this->db->affected_rows() === 1);
    } else {
        // INSERT: sold = 1
        $logOk = $this->inventory_log_insert($item_code, $serial);
    }

    if (!$logOk) {
        log_message('error', 'LOG SAVE FAILED: ' . $this->db->last_query());
        $this->db->trans_rollback();
        return FALSE;
    }

    // product qty - 1 (insert ar update duitar jonnoi)
    if (!$this->product_qty_decrease($item_code)) {
        $this->db->trans_rollback();
        return FALSE;
    }

    if ($this->db->trans_status() === FALSE) {
        log_message('error', 'TRANS STATUS FALSE');
        $this->db->trans_rollback();
        return FALSE;
    }

    $this->db->trans_commit();
    log_message('error', "DONE: [$item_code] [$serial]");
    return TRUE;
}

private function inventory_log_insert($item_code, $serial)
{
    $this->db->insert('inventory_log', array(
        'item_code' => $item_code,
        'serial'    => $serial,
        'sold'      => 1
    ));

    return ($this->db->affected_rows() === 1);
}

/**
 * qty varchar(20): '10' => '9'
 */
private function product_qty_decrease($item_code)
{
    $product = $this->db
        ->query("SELECT qty FROM product WHERE item_code = ? FOR UPDATE", array($item_code))
        ->row();

    if (!$product) {
        log_message('error', 'Product not found: ' . $item_code);
        return FALSE;
    }

    $currentQty = (int) trim($product->qty);

    if ($currentQty < 1) {
        log_message('error', 'Qty already 0: ' . $item_code);
        return FALSE;
    }

    $this->db
        ->where('item_code', $item_code)
        ->update('product', array('qty' => (string) ($currentQty - 1)));

    if ($this->db->affected_rows() !== 1) {
        log_message('error', 'Qty update failed: ' . $this->db->last_query());
        return FALSE;
    }

    return TRUE;
}

/**
 * product qty (varchar) theke 1 minus kore string hishebe save kore.
 * Row lock (FOR UPDATE) thake, tai ek shathe duita request ashleo double minus hobe na.
 */


    private function find_product($itemCode) {
        return $this->db
                ->select('product.name, product.item_code, product.qty, product_category.name AS category_name')
                ->from('product')
                ->join('product_category', 'product_category.id = product.category_id', 'left')
                ->where('product.item_code', $itemCode)
                ->limit(1)
                ->get()
                ->row();
    }

    private function send_json($data, $status = 200) {
        $this->output
                ->set_status_header($status)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($data));
    }
}
