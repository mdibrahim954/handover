<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
//        $this->load->model('user_model');
    }

    public function test() {
        echo 'This is testing Module';
    }

    public function index() {
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');

        $data['delivery'] = $this->db
                ->select('*')
                ->get('order_type')
                ->result();
        $data['area'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();
        //get serller/merchant-----------------------
        $data['sellerInfo'] = $this->db
                ->select('*')
                ->where('isactive', 1)
                ->get('users')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/new-order', $data);
    }

    public function insert_qty($id) {
        $data = array();
        $data['orderinfo'] = $this->db
                ->select('*')
                ->where('order_id', $id)
                ->get('orders')
                ->row();

        if (empty($data['orderinfo'])) {
            show_404();
            return;
        }

        $data['current_order_status'] = $this->db
                ->select('order_state.orderstatename, order_state.state_color')
                ->from('orders')
                ->join('order_state', 'order_state.orderstateid = orders.order_state_id')
                ->where('orders.order_id', $id)
                ->limit(1)
                ->get()
                ->row();

        $orderItemCodesQuery = $this->db->query(
                'SELECT order_details.item_code, SUM(order_details.quantity) AS quantity, '
                . '(SELECT COUNT(*) FROM inventory_log '
                . 'WHERE inventory_log.order_id = order_details.order_id '
                . 'AND inventory_log.item_code = order_details.item_code) AS added_quantity '
                . 'FROM order_details '
                . 'WHERE order_details.order_id = ? '
                . "AND order_details.item_code != '' AND order_details.item_code != '0' "
                . 'GROUP BY order_details.order_id, order_details.item_code '
                . 'ORDER BY order_details.item_code ASC',
                array($id)
        );
        if ($orderItemCodesQuery === FALSE) {
            log_message('error', 'Could not load item quantities for order ' . $id . ': ' . $this->db->last_query());
            show_error('Could not load the order item quantities.');
            return;
        }
        $data['order_item_codes'] = $orderItemCodesQuery->result();

        $this->load->library('pagination');
        $offset = max(0, (int) $this->uri->segment(5));
        $perPage = 20;
        $totalRows = $this->db
                ->where('order_id', $id)
                ->count_all_results('inventory_log');

        $config['base_url'] = base_url() . 'admin/order/insert_qty/' . $id;
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config['uri_segment'] = 5;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['qty_items'] = $this->db
                ->select('inventory_log.item_code, inventory_log.serial, product.name AS product_name')
                ->from('inventory_log')
                ->join('product', 'product.item_code = inventory_log.item_code', 'left')
                ->where('inventory_log.order_id', $id)
                ->order_by('inventory_log.item_code', 'asc')
                ->order_by('inventory_log.serial', 'asc')
                ->limit($perPage, $offset)
                ->get()
                ->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['qty_item_count'] = $totalRows;
        $data['order_id'] = $id;
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/insert_qty', $data);
    }

    public function insert_qty_lookup($id) {
        if (!$this->insert_qty_order_exists($id)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Order not found.'), 404);
            return;
        }

        $barcode = trim((string) $this->input->post('barcode', TRUE));
        if ($barcode === '') {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Scan a barcode first.'), 400);
            return;
        }

        $parts = $this->barcode_extractor($barcode);
        if (empty($parts)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Barcode must contain an item code and serial in ITEMCODE-SERIAL format.'), 400);
            return;
        }

        $product = $this->find_insert_qty_product($parts['item_code']);
        if (empty($product)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'No product was found for item code "' . $parts['item_code'] . '".'), 404);
            return;
        }

        if (!$this->insert_qty_order_has_item_code($id, $parts['item_code'])) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'This item code is not included in the current order.'), 409);
            return;
        }

        $quota = $this->insert_qty_get_order_quota($id, $parts['item_code']);
        if ($quota === FALSE) {
            log_message('error', 'Could not check item quota for order ' . $id . ', item code ' . $parts['item_code']);
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not check the remaining item quantity.'), 500);
            return;
        }
        if ($quota['added'] >= $quota['ordered']) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The order quantity for this item code has already been reached.'), 409);
            return;
        }

        $inventory = $this->db
                ->where('item_code', $parts['item_code'])
                ->where('serial', $parts['serial'])
                ->get('inventory_log')
                ->row();
        if (empty($inventory)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'No inventory record was found for this item code and serial.'), 404);
            return;
        }

        if ($this->insert_qty_has_order($inventory->order_id) || (int) $inventory->sold === 1) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'This item has already been added to an order. Remove it from that order before adding it again.'), 409);
            return;
        }

        $this->send_insert_qty_json(array(
            'success' => TRUE,
            'product' => array(
                'name' => $product->name,
                'item_code' => $product->item_code,
                'serial' => $parts['serial']
            )
        ));
    }

    public function insert_qty_add($id) {
        if (!$this->insert_qty_order_exists($id)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Order not found.'), 404);
            return;
        }

        $itemCode = trim((string) $this->input->post('item_code', TRUE));
        $serial = trim((string) $this->input->post('serial', TRUE));
        if ($itemCode === '' || $serial === '') {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Item code and serial are required.'), 400);
            return;
        }

        if (empty($this->find_insert_qty_product($itemCode))) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Product not found.'), 404);
            return;
        }

        if (!$this->insert_qty_order_has_item_code($id, $itemCode)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'This item code is not included in the current order.'), 409);
            return;
        }

        $this->db->trans_begin();
        $orderQuery = $this->db->query(
                'SELECT order_id FROM orders WHERE order_id = ? FOR UPDATE',
                array($id)
        );
        if ($orderQuery === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not lock order ' . $id . ' while adding item ' . $itemCode . ': ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not check the order quantity.'), 500);
            return;
        }
        if (empty($orderQuery->row())) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Order not found.'), 404);
            return;
        }

        $quota = $this->insert_qty_get_order_quota($id, $itemCode);
        if ($quota === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not check item quota for order ' . $id . ', item code ' . $itemCode);
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not check the remaining item quantity.'), 500);
            return;
        }
        if ($quota['added'] >= $quota['ordered']) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The order quantity for this item code has already been reached.'), 409);
            return;
        }

        $inventoryQuery = $this->db->query(
                'SELECT order_id, sold FROM inventory_log WHERE item_code = ? AND serial = ? FOR UPDATE',
                array($itemCode, $serial)
        );
        if ($inventoryQuery === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not load inventory item ' . $itemCode . '-' . $serial . ': ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The inventory record could not be loaded.'), 500);
            return;
        }
        $inventory = $inventoryQuery->row();

        if (empty($inventory)) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'No inventory record was found for this item code and serial.'), 404);
            return;
        }

        if ($this->insert_qty_has_order($inventory->order_id) || (int) $inventory->sold === 1) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'This item has already been added to an order. Remove it from that order before adding it again.'), 409);
            return;
        }

        if (!$this->insert_qty_decrease_product_quantity($itemCode)) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The product quantity could not be updated.'), 500);
            return;
        }

        $updated = $this->db
                ->where('item_code', $itemCode)
                ->where('serial', $serial)
                ->update('inventory_log', array(
                    'order_id' => $id,
                    'sold' => 1
                ));

        if (!$updated || $this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not assign inventory item ' . $itemCode . '-' . $serial . ' to order ' . $id . ': ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The item could not be added. Please try again.'), 500);
            return;
        }

        if (!$this->db->trans_commit()) {
            $this->db->trans_rollback();
            log_message('error', 'Could not commit inventory assignment for ' . $itemCode . '-' . $serial . ' to order ' . $id);
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The item could not be added. Please try again.'), 500);
            return;
        }

        $this->send_insert_qty_json(array('success' => TRUE, 'message' => 'Item added to the order.'));
    }

    public function insert_qty_remove($id) {
        if (!$this->insert_qty_order_exists($id)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Order not found.'), 404);
            return;
        }

        $itemCode = trim((string) $this->input->post('item_code', TRUE));
        $serial = trim((string) $this->input->post('serial', TRUE));
        if ($itemCode === '' || $serial === '') {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Item code and serial are required.'), 400);
            return;
        }

        $this->db->trans_begin();
        $inventoryQuery = $this->db->query(
                'SELECT order_id FROM inventory_log WHERE item_code = ? AND serial = ? FOR UPDATE',
                array($itemCode, $serial)
        );
        if ($inventoryQuery === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not load inventory item ' . $itemCode . '-' . $serial . ' for removal: ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The inventory record could not be loaded.'), 500);
            return;
        }

        $inventory = $inventoryQuery->row();
        if (empty($inventory) || (string) $inventory->order_id !== (string) $id) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'This item is not assigned to this order.'), 409);
            return;
        }

        $updated = $this->db
                ->where('item_code', $itemCode)
                ->where('serial', $serial)
                ->where('order_id', $id)
                ->update('inventory_log', array(
                    'order_id' => '',
                    'sold' => 0
                ));

        if (!$updated || $this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not remove inventory item ' . $itemCode . '-' . $serial . ' from order ' . $id . ': ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The item could not be removed. Please try again.'), 500);
            return;
        }

        if (!$this->db->trans_commit()) {
            $this->db->trans_rollback();
            log_message('error', 'Could not commit removal of inventory item ' . $itemCode . '-' . $serial . ' from order ' . $id);
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The item could not be removed. Please try again.'), 500);
            return;
        }

        $this->send_insert_qty_json(array('success' => TRUE, 'message' => 'Item removed from the order.'));
    }

    public function insert_qty_set_state($id) {
        if (!$this->insert_qty_order_exists($id)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Order not found.'), 404);
            return;
        }

        $stateName = trim((string) $this->input->post('state', TRUE));
        $allowedStates = array('Pending', 'Cancelled', 'Declined', 'Failed');
        if (!in_array($stateName, $allowedStates, TRUE)) {
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Invalid order state.'), 400);
            return;
        }

        $state = $this->db
                ->select('orderstateid')
                ->where('orderstatename', $stateName)
                ->limit(1)
                ->get('order_state')
                ->row();
        if (empty($state)) {
            log_message('error', 'Order state "' . $stateName . '" is not configured.');
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'The requested order state is not configured.'), 500);
            return;
        }

        $this->db->trans_begin();
        $orderQuery = $this->db->query(
                'SELECT order_id FROM orders WHERE order_id = ? FOR UPDATE',
                array($id)
        );
        if ($orderQuery === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not lock order ' . $id . ' to change its state: ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not update the order state.'), 500);
            return;
        }
        if (empty($orderQuery->row())) {
            $this->db->trans_rollback();
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Order not found.'), 404);
            return;
        }

        if ($stateName !== 'Pending') {
            $released = $this->db
                    ->where('order_id', $id)
                    ->update('inventory_log', array(
                        'order_id' => '',
                        'sold' => 0
                    ));
            if (!$released) {
                $this->db->trans_rollback();
                log_message('error', 'Could not release inventory for order ' . $id . ': ' . $this->db->last_query());
                $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not release the order items.'), 500);
                return;
            }
        }

        $updated = $this->db
                ->where('order_id', $id)
                ->update('orders', array(
                    'order_state_id' => $state->orderstateid,
                    'updated_at' => date('Y-m-d H:i:s')
                ));
        if (!$updated || $this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            log_message('error', 'Could not change order ' . $id . ' state to ' . $stateName . ': ' . $this->db->last_query());
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not update the order state.'), 500);
            return;
        }

        if (!$this->db->trans_commit()) {
            $this->db->trans_rollback();
            log_message('error', 'Could not commit state change for order ' . $id);
            $this->send_insert_qty_json(array('success' => FALSE, 'message' => 'Could not update the order state.'), 500);
            return;
        }

        $this->send_insert_qty_json(array(
            'success' => TRUE,
            'message' => $stateName === 'Pending'
                ? 'Order state updated to Pending.'
                : 'Order state updated to ' . $stateName . ' and its items were released.'
        ));
    }

    private function barcode_extractor($barcode) {
        if (preg_match('/^(.+)-(\d+)$/', $barcode, $matches)) {
            return array(
                'item_code' => trim($matches[1]),
                'serial' => $matches[2]
            );
        }

        return NULL;
    }

    private function find_insert_qty_product($itemCode) {
        return $this->db
                ->select('name, item_code')
                ->where('item_code', $itemCode)
                ->limit(1)
                ->get('product')
                ->row();
    }

    private function insert_qty_order_exists($id) {
        return ctype_digit((string) $id)
                && (int) $id > 0
                && !empty($this->db->where('order_id', $id)->get('orders')->row());
    }

    private function insert_qty_order_has_item_code($orderId, $itemCode) {
        return !empty($this->db
                ->where('order_id', $orderId)
                ->where('item_code', $itemCode)
                ->limit(1)
                ->get('order_details')
                ->row());
    }

    private function insert_qty_get_order_quota($orderId, $itemCode) {
        $orderQuantityQuery = $this->db->query(
                'SELECT COALESCE(SUM(quantity), 0) AS ordered_quantity '
                . 'FROM order_details WHERE order_id = ? AND item_code = ?',
                array($orderId, $itemCode)
        );
        if ($orderQuantityQuery === FALSE) {
            return FALSE;
        }

        $addedQuantityQuery = $this->db->query(
                'SELECT COUNT(*) AS added_quantity FROM inventory_log '
                . 'WHERE order_id = ? AND item_code = ?',
                array($orderId, $itemCode)
        );
        if ($addedQuantityQuery === FALSE) {
            return FALSE;
        }

        $orderQuantity = $orderQuantityQuery->row();
        $addedQuantity = $addedQuantityQuery->row();
        return array(
            'ordered' => max(0, (float) $orderQuantity->ordered_quantity),
            'added' => (int) $addedQuantity->added_quantity
        );
    }

    private function insert_qty_has_order($orderId) {
        $orderId = trim((string) $orderId);
        return $orderId !== '' && $orderId !== '0';
    }

    private function insert_qty_decrease_product_quantity($itemCode) {
        $productQuery = $this->db->query(
                'SELECT qty FROM product WHERE item_code = ? FOR UPDATE',
                array($itemCode)
        );
        if ($productQuery === FALSE) {
            log_message('error', 'Could not lock product quantity for item code ' . $itemCode . ': ' . $this->db->last_query());
            return FALSE;
        }

        $product = $productQuery->row();
        if (empty($product)) {
            log_message('error', 'Could not find product quantity for item code ' . $itemCode);
            return FALSE;
        }

        $quantity = (int) trim((string) $product->qty) - 1;
        $updated = $this->db->query(
                'UPDATE product SET qty = ? WHERE item_code = ?',
                array((string) $quantity, $itemCode)
        );
        if ($updated === FALSE || $this->db->affected_rows() !== 1) {
            log_message('error', 'Could not update product quantity for item code ' . $itemCode . ': ' . $this->db->last_query());
            return FALSE;
        }

        return TRUE;
    }

    private function send_insert_qty_json($data, $status = 200) {
        $this->output
                ->set_status_header($status)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($data));
    }

   

    public function order_track() {

        $tracknumber = trim($this->input->post('tracknumber'));
        if (!isset($tracknumber)) {
            redirect('admin/dashboard');
        }
        $data['result'] = $this->db
                ->select('*')
                ->where('track_number', $tracknumber)
                ->get('orders')
                ->row();
//           echo '<pre>';
//           print_r($data['result']);
//           echo '</pre>';

        $data['orderComments'] = $this->db
                ->select('*')
                ->where('order_id', $data['result']->order_id)
                ->get('order_comments')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/home-order-track', $data);
    }

    public function order_comments() {
        $order_id = $this->input->post('order_id');
        if (!isset($order_id)) {
            redirect('admin/dashboard');
        }
        $fullname = trim($this->input->post('fullname'));
        $comment = trim($this->input->post('comment'));

        $input = array(
            'order_id' => $order_id,
            'Fullname' => $fullname,
            'Comment' => $comment,
        );

        $response = $this->db->insert('order_comments', $input);

        $data['orderComments'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('order_comments')
                ->result();

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);


            $data['result'] = $this->db
                    ->select('*')
                    ->where('order_id', $order_id)
                    ->get('orders')
                    ->row();

            $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
            $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
            $this->load->view('dashboard-admin/home-order-track', $data);
        }
    }

    public function seller_info() {
        $seller_id = $this->input->post('sellerid');
        $sellerInfo = $this->db->select('*')->where('userid', $seller_id)->get('users')->row();

        $data_act = array('mobile' => $sellerInfo->mobile, 'address' => $sellerInfo->address);
        echo json_encode($data_act);
    }

    public function order_save() {


        // $item = $this->input->post('item'); //array
        // foreach($item as $item2){
        //     echo '<pre>';
        //     print_r($item2);
        //     echo '</pre>';            
        // }
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit();

        $item = $this->input->post('item'); //array

        $sellerID = trim($this->input->post('sellerid'));
        $sellerInfo = $this->db
                ->select('*')
                ->where('userid', $sellerID)
                ->get('users')
                ->row();

        $sellersname = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;
        
        $deliverytypeid = $this->input->post('deliverytypeid');
        $sellersmobile = trim($this->input->post('sellersmobile'));
        $sellersaddress = trim($this->input->post('sellersaddress'));
        $pickupareaid = $this->input->post('pickupareaid');
        $pickupDate = $this->input->post('pickupDate');
        $pickupDate = date('Y-m-d', strtotime($pickupDate));
        $pickupTime = $this->input->post('pickupTime');
        $pickupTime = date("H:i:s", strtotime($pickupTime)); //convert 12 hr to 24 hours

        $customername = trim($this->input->post('customername'));
        $customermobile = trim($this->input->post('customermobile'));
        $customermobilealt = trim($this->input->post('customermobilealt'));
        
        $customeraddress = trim($this->input->post('customeraddress'));
        $deliveryareaid = trim($this->input->post('deliveryareaid'));
        $deliveryDate = $this->input->post('deliveryDate');
        $deliveryDate = date('Y-m-d', strtotime($deliveryDate));
        $deliveryTime = $this->input->post('deliveryTime');
        $deliveryTime = date("H:i:s", strtotime($deliveryTime)); //convert 12 hr to 24 hours

        $referenceinvoice = trim($this->input->post('referenceinvoice'));
        $packagedescription = trim($this->input->post('packagedescription'));
        $deliverynote = trim($this->input->post('deliverynote'));

        $itemname_delivery = trim($this->input->post('itemname_delivery'));
        $quantity_delivery = $this->input->post('quantity_delivery');
        $unitprice_delivery = $this->input->post('unitprice_delivery');
       
        //Getting details for api R
        $district=$this->input->post('district');
        echo $area=$this->input->post('area');
        $thana=$this->input->post('thana');
        $postcode=$this->input->post('postcode');
        $packagecode=$this->input->post('packagecode');
        $redx_area=$this->input->post('redex_area');
      
        $area_name_redx=$this->input->post('area_name_redx1');
        $redx_postcode=$this->input->post('redex_postcode');
        $redx_packagecode=$this->input->post('redex_packagecode');
        
        $pathao_city=$this->input->post('pathao_city1');
        
        $pathao_zone=$this->input->post('pathao_zone1');
        
        if ($quantity_delivery == '') {
            $unitprice_delivery = '';
        }

        $itemname = (array) $this->input->post('itemname'); //array
        $quantity = (array) $this->input->post('quantity'); //array
        $unitprice = (array) $this->input->post('unitprice'); //array

        $final_array = array_map(NULL, $itemname, $quantity, $unitprice);

        //order Track Number---------------------------------------------------------------------------
        $areaInfo = $this->db
                ->select('*')
                ->where('areaid', $deliveryareaid)
                ->get('areas')
                ->row();

        $OrderID = $this->db->select("*")->limit(1)->order_by('order_id', "DESC")->get("orders")->row();
        $lastOrderID = $OrderID->order_id;
        $lastOrderID = $lastOrderID + 1;
        $track_number = strtoupper(substr($areaInfo->area_name, 0, 2)) . sprintf("%06d", $lastOrderID);

        $user_id = $this->session->userdata('user_id');

        $newOrder_Default = $this->db
                ->select('orderstateid')
                ->where('neworder_default', 1)
                ->get('order_state')
                ->row();

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $input = array(
            'track_number' => $track_number,
            'delivery_charge' => '0',
            'order_type_id' => $deliverytypeid,
            'seller_name' => $sellersname,
            'seller_mobile' => $sellersmobile,
            'seller_address' => $sellersaddress,
            'pickup_area_id' => $pickupareaid,
            'pickup_time' => $pickupDate . ' ' . $pickupTime,
            'customer_name' => $customername,
            'customer_mobile' => $customermobile,
            'customer_mobile_alt' => $customermobilealt, 
           'customer_address' => $customeraddress.' '.$district.' '.$thana.' '.$postcode,
            'delivery_area_id' => $deliveryareaid,
            'delivery_time' => $deliveryDate . ' ' . $deliveryTime,
            'reference_invoice' => $referenceinvoice,
            'package_description' => $packagedescription,
            'deliveryman_note' => $deliverynote,
            'is_client_order' => 1,
            'order_state_id' => $newOrder_Default->orderstateid,
            'user_id' => $sellerID,
            'order_created_by' => $user_id,
            'created_at' => $cenvertedCurrentTime,
            'updated_at' => $cenvertedCurrentTime,
        );

        $response = $this->db->insert('orders', $input);
        $last_insert_id = $this->db->insert_id();

      //  echo '<pre>';
          //  print_r($newOrder_Default);
        //print_r($input);
//        print_r($final_array);
//        print_r($_POST);
//        echo '</pre>';
//exit();       
        //insert item delivery charge---------------------------------------------------------
        $orderItemCharge = array(
            'order_id' => $last_insert_id,
            'item_name' => $itemname_delivery,
            'quantity' => $quantity_delivery,
            'unit_price' => $unitprice_delivery,
            'total' => $quantity_delivery * $unitprice_delivery,
            'created_at' => $cenvertedCurrentTime,
            'updated_at' => $cenvertedCurrentTime,
        );
        $response2 = $this->db->insert('order_details', $orderItemCharge);

        //insert item price---------------------------------------------------------
        if (!empty($item)) {
            foreach ($item as $item2) {
                if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
                    if($item2['item_code'] ==0){
                        $item_code='';
                    }else{                        
                        $item_code=$item2['item_code'];
                    }
                    $orderItem = array(
                        'order_id' => $last_insert_id,
                        'item_name' => $item2['itemname'],
                        'item_code' => $item_code,
                        'quantity' => $item2['quantity'],
                        'unit_price' => $item2['price'],
                        'total' => $item2['quantity'] * $item2['price'],
                        'created_at' => $cenvertedCurrentTime,
                        'updated_at' => $cenvertedCurrentTime,
                    );
                    $response3 = $this->db->insert('order_details', $orderItem);
                    
                        if ($item_code != '') {

                        $productInfo = $this->db
                                ->where('item_code', $item_code)
                                ->get('product')
                                ->row();

                        if (!empty($productInfo)) {
                            
                            $itemQtyOld=$productInfo->qty;
                            $remItemQty=$itemQtyOld-$item2['quantity'];

                            //update Product Qty by  item_code to product inventory-----------------------------------------
                            $responseInventory = $this->db
                                    ->where('item_code', $item_code)
                                    ->set('qty', $remItemQty)
                                    ->update('product');

                            //insert to product log----------------------------------------------------------------------
                            $inventoryLog = array(
                                'product_id' => 0,
                                'order_id' => $last_insert_id,
                                'category_id' => 0,
                                'name' => $item2['itemname'],
                                'item_code' => $item_code,
                                'qty' => $item2['quantity'],
                                'type' => 'New Order Create',
                                'created_by' => $this->session->userdata('user_id'),
                                'created_at' => $cenvertedCurrentTime,
                                'updated_at' => $cenvertedCurrentTime,
                            );
                            $responseInventoryLog = $this->db->insert('product_logs', $inventoryLog);
                        }
                    }
                }
            }
        }
        
        $orderDetails = $this->db
        ->select('*')
        ->where('order_id', $orderItem['order_id'])
        ->get('order_details')
        ->result();
        $it = 1;
        $itemTotalPrice = 0;
        if (!empty($orderDetails)) {
            foreach ($orderDetails as $item) {
                if ($item->quantity != '' && $item->quantity != 0) {

                    $itemTotalPrice += $item->quantity * $item->unit_price;
            //$itemTotalPrice +=$item->total;
                 
                      
                    $it++;
                }
            }
        } 
		
		
		
        //Call Ecourior api R
            //$pp=$orderItem['total']+$orderItemCharge['total'];
             if ($deliveryareaid == "68") {
                 
                 $jayParsedAry = [
                   "recipient_name" =>$customername, 
                   "recipient_mobile" => $customermobile, 
                   "recipient_city" =>$district, 
                   "recipient_area" => $area, 
                   "recipient_thana" => $thana, 
                   "recipient_address" => $customeraddress, 
                   "package_code" => $packagecode, 
                   "product_price" => $itemTotalPrice, 
                   "payment_method" => "COD",  
                   "parcel_type" => "BOX", 
                   "recipient_zip" => $postcode, 
                   "comments" => $deliverynote ,
                   "special_instruction"=>$deliverynote,
                   "is_ipay"=>"1"
                ];
                
                $orderData=json_encode($jayParsedAry);
                
                //Test account details 
                 //https://staging.ecourier.com.bd/api/order-place
                   
                   //live account details
                  // https://backoffice.ecourier.com.bd/api/order-place
                  
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://backoffice.ecourier.com.bd/api/order-place',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS =>json_encode($jayParsedAry),
                  CURLOPT_HTTPHEADER => array(
                    'API-SECRET: UYPm7',
                    'API-KEY: XfRh',
                    'USER-ID: C1721',
                    'Content-Type: application/json'
                  ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
               
                file_put_contents('ecouriorLogs.txt',"Order Data :$orderData  , Response:  .$response". PHP_EOL, FILE_APPEND);
                   //ecourior API ends here R  
                   $parchel_id = $response["ID"] ?? "1234";
                   $msg = "Dear $customername,";
                   $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$parchel_id by Ecuriar courier."; 
                   $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                   $this->sendSMS($customermobile , $msg , $redx_tracking_id );
             }else if($deliveryareaid == "130"){
                 //Redx API integration 
                    
                 //Data array 
                  $redxData = [
                       "customer_name" =>$customername, 
                       "customer_phone" => $customermobile, 
                       "delivery_area" => $area_name_redx, 
                       "delivery_area_id" => $redx_area, 
                       "customer_address" => $customeraddress." ".$district." ". $redx_postcode,  
                       "cash_collection_amount" => $itemTotalPrice, 
                       "parcel_weight" => 500, 
                       "instruction" => $deliverynote,
                         "value"=> $itemTotalPrice
                    ]; 
                    $redxData1=json_encode($redxData);
                     file_put_contents('redxinputdata.txt',$redxData1);
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://openapi.redx.com.bd/v1.0.0-beta/parcel',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'POST',
                      CURLOPT_POSTFIELDS =>json_encode($redxData),
                      CURLOPT_HTTPHEADER => array(
                        'API-ACCESS-TOKEN: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyNTA0NDgiLCJpYXQiOjE2OTMxMTA5MjAsImlzcyI6ImVYNU5admpudjZPOEdqS0ltZ1c1QnZyUzJYUDNOVVJ6Iiwic2hvcF9pZCI6MjUwNDQ4LCJ1c2VyX2lkIjo2MDk3N30.1N7YfpdcBXII8Gj9vH2cA2KATsXkwSh3XPFhmfercpQ',
                        'Content-Type: application/json'
                      ),
                    ));
                    
                    $response = curl_exec($curl);
                    
                    curl_close($curl);
                file_put_contents('redxlogs.txt',"Order Data :$redxData1  , Response:  .$response". PHP_EOL, FILE_APPEND);    
                        // Decode and save tracking ID
                $responseArray = json_decode($response, true);
                if ($responseArray && isset($responseArray['tracking_id'])) {
                    $redx_tracking_id = $responseArray['tracking_id'];
            
                    // Store in DB
                    $updateData = [
                        'redx_tracking_id' => $redx_tracking_id
                    ];
                    $this->db->where('order_id', $last_insert_id);
                    $this->db->update('orders', $updateData);

                    $msg = "Dear $customername,";
                    $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$redx_tracking_id by Redx courier."; 
                    $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                    $this->sendSMS($customermobile , $msg , $redx_tracking_id );
                }
                    
                    
             }else if ($deliveryareaid == "126"){
                 //Pathao API starts here 
                 
                 $pathaoData = [
                        "store_id" => "64828",
                        "recipient_name" => $customername,
                        "recipient_phone" => $customermobile,
                        "recipient_address" =>$customeraddress." ".$district." ". $redx_postcode,
                        "recipient_city" => $pathao_city,
                        "recipient_zone" => $pathao_zone,
                        "delivery_type" => 48,
                        "item_type" => 2,
                        "special_instruction" => $deliverynote,
                        "item_quantity" => 1,
                        "item_weight" => "1",
                        "amount_to_collect" => 0,
                        "item_description" => $itemTotalPrice,
                    ];
                $pathoDataJson=json_encode($pathaoData);    
                 $curl = curl_init();
                 curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://api-hermes.pathao.com/aladdin/api/v1/orders',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'POST',
                  CURLOPT_POSTFIELDS =>json_encode($pathaoData),
                  CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyODQxIiwianRpIjoiMWFmZWQ2YjdlOTQwZjY3YWQzZWY4YWIwMTRhZTNlM2FjN2FkMzA0NzMwOTJjMjYwY2Y5YzVhYzQ2OWI5YWZkM2VhMTE1NWU2MDViYjg4NGIiLCJpYXQiOjE3NTA5MjUzNTcuNzcwMDMsIm5iZiI6MTc1MDkyNTM1Ny43NzAwMzQsImV4cCI6MTc1ODcwMTM1Ny43NTY2LCJzdWIiOiI4NDgzMyIsInNjb3BlcyI6W119.VYvLk99MfdGkwlihLBLXMNoCUYcz_N5-rhVDe68RbjjHkd67_pXACOETYtM7xnuU-F5pzt7NWUgS130VzOyNPLofGKC4y1kXPhZKBXNxXt5lqzb-_wG06d1yFieCTpK7-hkaWROvWIPYgAqDFSDuhMVN_t9Ny_LywzHmx-Duyyhy_DglW2CpT1RHNfmMQSnByGYpGcjY6dvOQ94aysHWJNb_9tUj09IHoOj8TQ7c47piwE76l9mmgsJd9HVrQRs_uSjp8D4ISY3zuR95tcFHKQI5d8KcsUEB8W6No5IYAeI0DNNDGZMpRw81nhXvCix4A8-kxJQUG3Jcgg4X1X5ZcrHcL4Q89KC_BF4azm8CM5TVrn_hAS4UOtCsmKOicBpuA0208o88cUNZ0J6JxvVb3mnNnV54eIEX7j2PAoDA1y0W-l4UR8CWGcMhEbEooAkeGQAAJ2x0KovIY12Dtf8Bs997ASId3u8Plmd2aeiF3gvr6JX-wU3OeP1evjbBVPp82Sb9vYH1SOdOWPqwzpYnEVrgdxNXzjCKJzV-Gd9mxcjH-8rJ-0mimKMeHoTVsbAFs_3neK64elmg9WI-NcHYeV2wCVE8qOZEWYIU0AkNjDPuOw3YdqrUBPVcuEATFPbImCOunMwCkGYMmoCmZs7u--VgfoPB7JN4M2uCVoeY5l4',
                    'Content-Type: application/json'
                  ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                //echo $response;
                 file_put_contents('pathaologs.txt',"Admin  Order Data :$pathoDataJson  , Response:  .$response". PHP_EOL, FILE_APPEND); 
                                      // Decode and save tracking ID
                    $responseArray = json_decode($response, true);
                    if (
                        $responseArray &&
                        isset($responseArray['code']) &&
                        $responseArray['code'] == 200 &&
                        isset($responseArray['data']['consignment_id'])
                    ) {
                        $pathao_consignment_id = $responseArray['data']['consignment_id'];
                
                        // Store in DB
                        $updateData = [
                            'pathao_consignment_id' => $pathao_consignment_id
                        ];
                        $this->db->where('order_id', $last_insert_id);
                        $this->db->update('orders', $updateData);

                        $msg = "Dear $customername,";
                        $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$pathao_consignment_id by Pathao courier."; 
                        $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                        $this->sendSMS($customermobile , $msg , $pathao_consignment_id );
                    }


                 //Pathao API ends here
             }
             else if($deliveryareaid == '133'){
                $useridForAPI = $this->session->userdata('user_id');
                $userinfoForAPI = $this->db
                ->select('*')
                ->where('userid', $useridForAPI)
                ->where('isactive', '1')
                ->get('users')
                ->row();
                // **Steadfast Courier API Integration**
                $steadfastData = [
                    "invoice" => $track_number, // Tracking ID is Percel ID
                    "recipient_name" => $customername,
                    "recipient_phone" => $customermobile,
                    "recipient_address" => $customeraddress . " " . $district . " " . $redx_postcode,
                    "cod_amount" => $itemTotalPrice,
                    "note" => $deliverynote
                ];
    
                $steadfastDataJson = json_encode($steadfastData);
                if (!empty($userinfoForAPI->steadfast_api_key) && !empty($userinfoForAPI->steadfast_api_secret)) {
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://portal.packzy.com/api/v1/create_order',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $steadfastDataJson,
                        CURLOPT_HTTPHEADER => array(
                            "Api-Key: $userinfoForAPI->steadfast_api_key",
                            "Secret-Key: $userinfoForAPI->steadfast_api_secret",
                            "Content-Type: application/json"
                        ),
                    ));
                
                    $response = curl_exec($curl);
                    curl_close($curl);
                
                    file_put_contents('steadfastlogs.txt', "Admin Order Data: $steadfastDataJson, Response: $response" . PHP_EOL, FILE_APPEND);
                    // Store required info in database 
                    $responseArray = json_decode($response, true);
                    if ($responseArray && isset($responseArray['status']) && $responseArray['status'] == 200) {
                        if (isset($responseArray['consignment']['consignment_id'], $responseArray['consignment']['tracking_code'])) {
                            $steadfast_parcel_id = $responseArray['consignment']['consignment_id'];
                            $steadfast_tracking_id = $responseArray['consignment']['tracking_code'];
            
                            // Update the order only if response status is 200
                            $updateData = [
                                'steadfast_parcel_id' => $steadfast_parcel_id,
                                'steadfast_tracking_id' => $steadfast_tracking_id
                            ];
                            $this->db->where('order_id', $last_insert_id);
                            $this->db->update('orders', $updateData);
                            // $this->db->
                            
                            $msg = "Dear $customername,";
                            $msg .= "Your order from red shop BD has been confirmed. We are processing your order parcel id -$steadfast_parcel_id by staedfast courier."; 
                            $msg .= "And amount is -$itemTotalPrice BDT  You will get a SMS once it gets ready for the delivery.";

                            $res = $this->sendSMS($customermobile , $msg , $steadfast_parcel_id );

                            // echo "<script> console.log( " . $res  . ")</script>";
                        }

                        // $this->sendSMS();
                    }
                } else {
                    file_put_contents('steadfastlogs.txt', "API Key or Secret is missing for User ID: $useridForAPI" . PHP_EOL, FILE_APPEND);
                }
            }
          
        $sess['success'] = "Created successfully!!";
       // $sess['success'] = $response;

        $this->session->set_userdata($sess);
        redirect('admin/order');
    }

    public function deleteOrderItem() {
        $order_details_id = $this->input->post('order_details_id');

        if (isset($order_details_id)) {
            //adjust product inventory-------------------------------------------
            $productDetails = $this->db->select('*')->where('order_details_id', $order_details_id)->get('order_details')->row();
            if (!empty($productDetails)) {
                $item_code = $productDetails->item_code;
                $order_id = $productDetails->order_id;
                if ($item_code != '') {

                    $prodLogs = $this->db
                            ->select('*')
                            ->where('order_id', $order_id)
                            ->where('item_code', $item_code)
                            ->where('status', 1)
                            ->get('product_logs')
                            ->row();
                    if (!empty($prodLogs)) {
                            $pQty = $prodLogs->qty;
                            $itemCode_get = $prodLogs->item_code;
                            $itemInfoGet = $this->db->where('item_code', $itemCode_get)->get('product')->row();
                            if (!empty($itemInfoGet)) {
                                $itemOldQty = $itemInfoGet->qty;
                                $totalItemQty = $pQty + $itemOldQty;
                                //update item qty---------------------------
                                $this->db
                                        ->where('item_code', $itemCode_get)
                                        ->set('qty', $totalItemQty)
                                        ->update('product');
                                $this->db
                                        ->where('order_id', $order_id)
                                        ->where('item_code', $itemCode_get)
                                        ->set('status', 0)
                                        ->update('product_logs');
                            }
                    }
                }
            }
        }

        $response = $this->db
                ->where('order_details_id', $order_details_id)
                ->delete('order_details');

        if ($response == 1) {
            echo 'Success';
        }
    }

    public function order_update() {

        $item = $this->input->post('item'); //array
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();
        $order_id = $this->input->post('order_id');

        $order_type_id = $this->input->post('order_type_id');
        $sellersname = trim($this->input->post('seller_name'));
        $sellersmobile = trim($this->input->post('sellersmobile'));
        $sellersaddress = trim($this->input->post('sellersaddress'));
        $pickupareaid = $this->input->post('pickupareaid');
        $pickupDate = $this->input->post('pickupDate');
        $pickupDate = date('Y-m-d', strtotime($pickupDate));
        $pickupTime = $this->input->post('pickupTime');
        $pickupTime = date("H:i:s", strtotime($pickupTime)); //convert 12 hr to 24 hours

        $customername = trim($this->input->post('customername'));
        $customermobile = trim($this->input->post('customermobile'));
        $customeraddress = trim($this->input->post('customeraddress'));
        $deliveryareaid = $this->input->post('deliveryareaid');
        $deliveryDate = $this->input->post('deliveryDate');
        $deliveryDate = date('Y-m-d', strtotime($deliveryDate));
        $deliveryTime = $this->input->post('deliveryTime');
        $deliveryTime = date("H:i:s", strtotime($deliveryTime)); //convert 12 hr to 24 hours

        $referenceinvoice = trim($this->input->post('referenceinvoice'));
        $packagedescription = trim($this->input->post('packagedescription'));
        $deliverynote = trim($this->input->post('deliverynote'));

//        $itemname_delivery = trim($this->input->post('itemname_delivery'));
//        $quantity_delivery = $this->input->post('quantity_delivery');
//        $unitprice_delivery = $this->input->post('unitprice_delivery');
//
//        if ($quantity_delivery == '') {
//            $unitprice_delivery = '';
//        }


        /*
          //for new item-------------------------------------------------------------
          $itemname = array();
          $quantity = array();
          $unitprice = array();
          $final_array = array();

        $itemname = $this->input->post('itemname'); //array
        $quantity = $this->input->post('quantity'); //array
        $unitprice = $this->input->post('unitprice'); //array

          if (!empty($itemname) && !empty($quantity) && !empty($unitprice)) {
          $final_array = array_map(NULL, $itemname, $quantity, $unitprice);
          }

          //for old item information update---------------------------------------------------
          $itemname2 = array();
          $quantity2 = array();
          $unitprice2 = array();
          $final_array2 = array();

          $itemname2 = $this->input->post('itemname2'); //array
          $quantity2 = $this->input->post('quantity2'); //array
          $unitprice2 = $this->input->post('unitprice2'); //array
          $oder_details_id2 = $this->input->post('oder_details_id2'); //array

          if (!empty($itemname2) && !empty($quantity2) && !empty($unitprice2)) {
          $final_array2 = array_map(NULL, $itemname2, $quantity2, $unitprice2, $oder_details_id2);
          }
          foreach ($final_array2 as $item2) {

          $orderItem2 = array(
          'item_name' => $item2[0],
          'quantity' => $item2[1],
          'unit_price' => $item2[2],
          'total' => $item2[1]*$item2[2],
          'updated_at' => date('Y-m-d H:i:s'),
          );


          $responseUpdateItem = $this->db
          ->where('order_details_id', $item2[3])
          ->update('order_details', $orderItem2);
          echo '<br>';
          }
         */


        //order Track Number---------------------------------------------------------------------------
        $areaInfo = $this->db
                ->select('*')
                ->where('areaid', $deliveryareaid)
                ->get('areas')
                ->row();

        $OrderID = $this->db->select("*")->limit(1)->order_by('order_id', "DESC")->get("orders")->row();
        $lastOrderID = $OrderID->order_id;
        $track_number = strtoupper(substr($areaInfo->area_name, 0, 2)) . sprintf("%06d", $lastOrderID);

        $user_id = $this->session->userdata('user_id');

        $newOrder_Default = $this->db
                ->select('orderstateid')
                ->where('neworder_default', 1)
                ->get('order_state')
                ->row();


        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));
        $update_order = array(
            'delivery_charge' => '0',
            'order_type_id' => $order_type_id,
            'seller_name' => $sellersname,
            'seller_mobile' => $sellersmobile,
            'seller_address' => $sellersaddress,
            'pickup_area_id' => $pickupareaid,
            'pickup_time' => $pickupDate . ' ' . $pickupTime,
            'customer_name' => $customername,
            'customer_mobile' => $customermobile,
            'customer_address' => $customeraddress,
            'delivery_area_id' => $deliveryareaid,
            'delivery_time' => $deliveryDate . ' ' . $deliveryTime,
            'reference_invoice' => $referenceinvoice,
            'package_description' => $packagedescription,
            'deliveryman_note' => $deliverynote,
            'order_state_id' => $newOrder_Default->orderstateid,
//            'user_id' => $user_id,
            'updated_at' => $cenvertedCurrentTime,
        );

        $response = $this->db
                ->where('order_id', $order_id)
                ->update('orders', $update_order);



        /*
          //insert for new item charge---------------------------------------------------------
          if (!empty($final_array)) {
          foreach ($final_array as $item) {
          if ($item[0] != '' && $item[1] && $item[2]) {
          $orderItem = array(
          'order_id' => $order_id,
          'item_name' => $item[0],
          'quantity' => $item[1],
          'unit_price' => $item[2],
          'total' => '',
          'created_at' => date('Y-m-d H:i:s'),
          );
          $response3 = $this->db->insert('order_details', $orderItem);
          //                    echo '<pre>';
          //                    print_r($orderItem);
          //                    echo '</pre>';
          }
          }
          }
         * 
         */
        
        
        //update (adjust) product inventory--------------------------------------------------------------------
        
        $prodLogs=$this->db
                ->select('*')
                ->where('order_id',$order_id)
                ->where('status',1)
                ->get('product_logs')
                ->result();
        if(!empty($prodLogs)){
            foreach($prodLogs as $pLogs){
                $pQty = $pLogs->qty;
                $itemCode_get=$pLogs->item_code;
                $itemInfoGet=$this->db->where('item_code',$itemCode_get)->get('product')->row();
                if(!empty($itemInfoGet)){
                    $itemOldQty = $itemInfoGet->qty;
                    $totalItemQty= $pQty + $itemOldQty;
                    //update item qty---------------------------
                    $this->db
                            ->where('item_code',$itemCode_get)
                            ->set('qty',$totalItemQty)
                            ->update('product');
                    $this->db
                            ->where('order_id',$order_id)
                            ->where('item_code',$itemCode_get)
                            ->set('status',0)
                            ->update('product_logs');
                }
            }
        }
        
//        echo $pQty;
//        echo '<pre>';
//        print_r($prodLogs);
//        echo '</pre>';        
//        die();
        
        
        

        //update or insert item info-------------------------------------------------------------------------
        if (!empty($item)) {
            foreach ($item as $item2) {
                if (!isset($item2['order_details_id'])) { // insert new item
                    if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
//                        $item_code = $item2['item_code'];
                           if($item2['item_code']==0){
                                $item_code='';
                            }else{                        
                                $item_code=$item2['item_code'];
                            }
                        $insertOrderItem = array(
                            'order_id' => $order_id,
                            'item_name' => $item2['itemname'],
                            'item_code' => $item_code,
                            'quantity' => $item2['quantity'],
                            'unit_price' => $item2['price'],
                            'total' => $item2['quantity'] * $item2['price'],
                            'created_at' => $cenvertedCurrentTime,
                        );
                        $response3 = $this->db->insert('order_details', $insertOrderItem);

                        //update product inventory---------------------------------------------------------------
                        if ($item_code != '') {
                            $productInfo = $this->db
                                    ->where('item_code', $item_code)
                                    ->get('product')
                                    ->row();

                            if (!empty($productInfo)) {
                                $itemQtyOld = $productInfo->qty;
                                $remItemQty = $itemQtyOld - $item2['quantity'];

                                //update Product Qty by  item_code to product inventory-----------------------------------------
                                $responseInventory = $this->db
                                        ->where('item_code', $item_code)
                                        ->set('qty', $remItemQty)
                                        ->update('product');

                                //insert to product log----------------------------------------------------------------------
                                $inventoryLog = array(
                                    'product_id' => 0,
                                    'order_id' => $order_id,
                                    'category_id' => 0,
                                    'name' => $item2['itemname'],
                                    'item_code' => $item_code,
                                    'qty' => $item2['quantity'],
                                    'type' => 'New Order Create',
                                    'created_by' => $this->session->userdata('user_id'),
                                    'created_at' => $cenvertedCurrentTime,
                                    'updated_at' => $cenvertedCurrentTime,
                                );
                                $responseInventoryLog = $this->db->insert('product_logs', $inventoryLog);
                            }
                        }

//                    echo '<pre>';
//                    print_r($insertOrderItem);
//                    echo '</pre>';
//                    exit();
                    }
                } elseif (isset($item2['order_details_id'])) {//update item info
                    if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
                        $item_code = $item2['item_code'];
                        $updateOrderItem = array(
                            'item_name' => $item2['itemname'],
                            'item_code' => $item_code,
                            'quantity' => $item2['quantity'],
                            'unit_price' => $item2['price'],
                            'total' => $item2['quantity'] * $item2['price'],
                            'updated_at' => $cenvertedCurrentTime,
                        );

                        $responseUpdateItem = $this->db
                                ->where('order_details_id', $item2['order_details_id'])
                                ->update('order_details', $updateOrderItem);
                        
                            //update product inventory---------------------------------------------------------------
                            if ($item_code != '') {
                                $productInfo = $this->db
                                        ->where('item_code', $item_code)
                                        ->get('product')
                                        ->row();

                                if (!empty($productInfo)) {
                                    $itemQtyOld_1 = $productInfo->qty;
                                    $remItemQty_ = $itemQtyOld_1 - $item2['quantity'];

                                    //update Product Qty by  item_code to product inventory-----------------------------------------
                                    $responseInventory = $this->db
                                            ->where('item_code', $item_code)
                                            ->set('qty', $remItemQty_)
                                            ->update('product');

                                    //insert to product log----------------------------------------------------------------------
                                    $inventoryLog = array(
                                        'product_id' => 0,
                                        'order_id' => $order_id,
                                        'category_id' => 0,
                                        'name' => $item2['itemname'],
                                        'item_code' => $item_code,
                                        'qty' => $item2['quantity'],
                                        'created_by' => $this->session->userdata('user_id'),
                                        'type' => 'Update Order Info',
                                        'created_at' => $cenvertedCurrentTime,
                                        'updated_at' => $cenvertedCurrentTime,
                                    );
                                    $responseInventoryLog = $this->db->insert('product_logs', $inventoryLog);
                                }
                            }
                    }
                }
            }
        }


        $sess['success'] = 'Updated Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/order/order_edit/' . $order_id);
    }

    public function order_edit($order_id) {
        $data = array();
        $data['menu'] = '';
        $user_id = $this->session->userdata('user_id');

        $data['orderinfo'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('orders')
                ->row();
        $data['orderItem'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('order_details')
                ->result();

        $data['orderItemTotal'] = count($data['orderItem']);

        $data['orderType'] = $this->db
                ->select('*')
                ->where('order_type_id', $data['orderinfo']->order_type_id)
                ->get('order_type')
                ->row();
        $data['pickupArea'] = $this->db
                ->select('*')
                ->where('areaid', $data['orderinfo']->pickup_area_id)
                ->get('areas')
                ->row();
        $data['deliveryArea'] = $this->db
                ->select('*')
                ->where('areaid', $data['orderinfo']->delivery_area_id)
                ->get('areas')
                ->row();

        /* time convert to am/pm
          $currentDateTime = '08/04/2010 22:15:00';
          $currentDateTime = '22:15:00';
          echo $newDateTime = date('h:i A', strtotime($currentDateTime));
         * 
         */

//        echo '<pre>';
//        print_r($data['orderinfo']);
//        echo '</pre>';
//        exit();

        $data['delivery'] = $this->db
                ->select('*')
                ->get('order_type')
                ->result();
        $data['area'] = $this->db
                ->select('*')
                ->order_by('area_name', 'asc')
                ->get('areas')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/edit-order', $data);
    }

    public function states() {
        $data = array();
        $data['menu'] = '';

        $data['states'] = $this->db
                ->select('*')
                ->order_by('orderstatename', 'asc')
                ->get('order_state')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/order-states', $data);
    }

//
    public function order_states_save() {

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $data['orderstatename'] = $this->input->post('statename');
        $data['state_color'] = $this->input->post('color');
        $data['created_at'] = $cenvertedCurrentTime;

        $this->db->insert('order_state', $data);

        $sess['success'] = 'Created Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/order/states');
    }

    public function edit_order_state($id) {
        $data = array();
        $data['menu'] = '';
        $data['result'] = $this->db
                ->select('*')
                ->where('orderstateid', $id)
                ->get('order_state')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/order-states-edit', $data);
    }

    public function order_states_update() {

        $id = $this->input->post('id');
        $orderstatename = $this->input->post('orderstatename');
        $state_color = $this->input->post('state_color');
        $this->db
                ->where('orderstateid', $id)
                ->set('orderstatename', $orderstatename)
                ->set('state_color', $state_color)
                ->update('order_state');

        $sess['success'] = 'Updated Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/order/states');
    }

    public function payment_type() {
        $data = array();
        $data['menu'] = '';

        $data['result'] = $this->db
                ->select('*')
                ->order_by('payment_type_name', 'asc')
                ->get('payment_types')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/payment-type', $data);
    }

    public function payment_type_save() {
        $data['payment_type_name'] = $this->input->post('paymenttypename');
        $this->db->insert('payment_types', $data);

        $sess['success'] = 'Created Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/order/payment_type');
    }

    public function edit_payment_type($id) {
        $data = array();
        $data['menu'] = '';
        $data['result'] = $this->db
                ->select('*')
                ->where('payment_type_id', $id)
                ->get('payment_types')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/payment-type-edit', $data);
    }

//
    public function payment_type_update() {

        $id = $this->input->post('id');
        $payment_type_name = $this->input->post('payment_type_name');

        $this->db
                ->where('payment_type_id', $id)
                ->set('payment_type_name', $payment_type_name)
                ->update('payment_types');

        $sess['success'] = 'Updated Successfully!';
        $this->session->set_userdata($sess);
        redirect('admin/order/payment_type');
    }

    public function delete_order($order_id) {
        $data = array();
        $data['orderinfo'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('orders')
                ->row();
//        echo '<pre>';
//        print_r($data['orderinfo']);
//        echo '</pre>';
        if (empty($data['orderinfo'])) {
            echo 'No record found!';
        } else {
            $data['order_id'] = $order_id;
            $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
            $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
            $this->load->view('dashboard-admin/order-status/order-task/delete-order', $data);
        }
    }

    public function delete_order_by_orderid() {
//        echo 'DELETE';
//        echo '<pre>';
//       print_r($_POST);
//        echo '</pre>';
//        exit();

        $response = '';
        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $order_id = $this->input->post('order_id');
        $remarks = $this->input->post('remarks');
        if ($order_id != '' && $remarks != '') {
            $response = $this->db
                    ->where('order_id', $order_id)
                    ->set('showing_status', 0)
                    ->set('updated_at', $cenvertedCurrentTime)
                    ->set('deleted_at', $cenvertedCurrentTime)
                    ->update('orders');

            if ($response == 1) {
                //update (adjust) product inventory--------------------------------------------------------------------

                $prodLogs = $this->db
                        ->select('*')
                        ->where('order_id', $order_id)
                        ->where('status', 1)
                        ->get('product_logs')
                        ->result();
//        echo '<pre>';
//       print_r($prodLogs);
//        echo '</pre>';
        
                if (!empty($prodLogs)) {
                    foreach ($prodLogs as $pLogs) {
                        $pQty = $pLogs->qty;
                        $itemCode_get = $pLogs->item_code;
                        $itemInfoGet = $this->db->where('item_code', $itemCode_get)->get('product')->row();
                        if (!empty($itemInfoGet)) {
                            $itemOldQty = $itemInfoGet->qty;
                            $totalItemQty = $pQty + $itemOldQty;
                            //update item qty---------------------------
                            $this->db
                                    ->where('item_code', $itemCode_get)
                                    ->set('qty', $totalItemQty)
                                    ->update('product');
                            $this->db
                                    ->where('order_id', $order_id)
                                    ->where('item_code', $itemCode_get)
                                    ->set('status', 0)
                                    ->set('updated_at', $cenvertedCurrentTime)
                                    ->update('product_logs');
                        }
                    }
                }

                echo 'Deleted Successfully!';
            } else {
                echo 'false';
            }
        }
    }

    public function report() {
        $data = array();
        $data['menu'] = '';

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/order/order-report', $data);
    }

    public function pickup($order_id) {
        $data = array();
        $data['orderinfo'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('orders')
                ->row();
//        echo '<pre>';
//        print_r($data['orderinfo']);
//        echo '</pre>';
        if (empty($data['orderinfo'])) {
            echo 'No record found!';
        } else {
            $data['order_id'] = $order_id;
            $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
            $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
            $this->load->view('dashboard-admin/order-status/order-task/pickup-task', $data);
        }
    }

    public function pickup_task() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();
//        echo 'Pickup Task';
//        exit();

        /*
         * $orderstate = DB::select("SELECT orderstateid FROM order_state WHERE orderstatename='Completed'");
          $task_type = DB::select("SELECT task_type_id FROM task_types WHERE type_name='Pickup'");

          // Saving task
          $task = new OrderTask;
          $task->order_id = $request->input('orderid');
          $task->remarks = $request->input('remarks');
          $task->task_state_id = $orderstate[0]->orderstateid;
          $task->task_type_id =  $task_type[0]->task_type_id;
          $task->user_id = $request->input('userid');
          $task->save();

          // Updating order
          $order = Order::find($request->input('orderid'));
          $order->ispickup_completed =  1;
          $order->save();
         */

        $data = array();
        $response = '';

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $data['order_id'] = $order_id = $this->input->post('order_id');
        $data['remarks'] = $remarks = $this->input->post('remarks');
        $task_type = $this->db
                ->select('*')
                ->where('type_name', 'Pickup') // task type for pickup
                ->get('task_types')
                ->row();
        $order_state = $this->db
                ->select('*')
                ->where('orderstatename', 'Started') //for order status name
                ->get('order_state')
                ->row();
        $data['task_state_id'] = $task_state_id = $order_state->orderstateid;
        $data['task_type_id'] = $task_type->task_type_id;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['created_at'] = $cenvertedCurrentTime;

        if ($task_state_id != '' && $remarks != '') {
            $response = $this->db->insert('order_tasks', $data);
        }

        if ($response == 1) {
            $this->db
                    ->where('order_id', $order_id)
                    ->set('ispickup_completed', 1)
                    ->set('order_state_id', $task_state_id)
                    ->set('updated_at', $cenvertedCurrentTime)
                    ->update('orders');
            echo 'Success!';
        } else {
            echo 'Failed! Try again.';
        }
    }

    public function delivery($order_id) {
        $data = array();
        $data['orderinfo'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('orders')
                ->row();
//        echo '<pre>';
//        print_r($data['orderinfo']);
//        echo '</pre>';
        if (empty($data['orderinfo'])) {
            echo 'No record found!';
        } else {
            $data['states'] = $this->db
                    ->select('*')
                    ->order_by('orderstatename', 'asc')
                    ->get('order_state')
                    ->result();
            $data['order_id'] = $order_id;
            $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
            $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
            $this->load->view('dashboard-admin/order-status/order-task/delivery-task', $data);
        }
    }

    public function delivery_task() {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        echo 'Delivery Task';
//        exit();


        $data = array();
        $response = '';
        $data['task_state_id'] = $task_state_id = $this->input->post('orderstateid'); // order status name (complete/pending/etc)
        $data['order_id'] = $order_id = $this->input->post('order_id');
        $data['remarks'] = $remarks = $this->input->post('remarks');
        $task_type = $this->db
                ->select('*')
                ->where('type_name', 'Delivery') //for delivery
                ->get('task_types')
                ->row();

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $data['task_type_id'] = $task_type->task_type_id;
        $data['user_id'] = $this->session->userdata('user_id');
        $data['created_at'] = $cenvertedCurrentTime;

        if ($task_state_id != '' && $remarks != '') {
            $response = $this->db->insert('order_tasks', $data);
        }
        if ($response == 1) {
            //update order status to Orders table----------------------------------
            $this->db
                    ->where('order_id', $order_id)
                    ->set('order_state_id', $task_state_id)
                    ->set('updated_at', $cenvertedCurrentTime)
                    ->update('orders');

            echo 'Success!';
        } else {
            echo 'Failed! Try again.';
        }

//       echo '<pre>';
//        print_r($task_type);
//        echo '</pre>';
    }

    public function task_assign($order_id) {
        $data = array();
        $data['orderinfo'] = $this->db
                ->select('*')
                ->where('order_id', $order_id)
                ->get('orders')
                ->row();
//        echo '<pre>';
//        print_r($data['orderinfo']);
//        echo '</pre>';
        if (empty($data['orderinfo'])) {
            echo 'No record found!';
        } else {
            $data['states'] = $this->db
                    ->select('*')
                    ->order_by('orderstatename', 'asc')
                    ->get('order_state')
                    ->result();

            $data['delivery_man'] = $this->db
                    ->select('*')
//                ->where('isactive', 1) // active delivery man
                    ->where('user_type_id', 2)// delivery man
                    ->get('users')
                    ->result();

            $data['pickupMan'] = $this->db
                    ->select('*')
                    ->where('order_id', $order_id)
                    ->where('task_type_id', 1)//Pickup
                    ->get('order_task_person')
                    ->result();

            $data['deliveryMan'] = $this->db
                    ->select('*')
                    ->where('order_id', $order_id)
                    ->where('task_type_id', 2)//delivery
                    ->get('order_task_person')
                    ->result();


            $data['order_id'] = $order_id;
            $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
            $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
            $this->load->view('dashboard-admin/order-status/order-task/assign-person', $data);
        }
    }

    public function task_assign_pickup() {
        $data = array();
        $data2 = array();
        $response = '';

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $task_type = $this->db
                ->select('*')
                ->where('type_name', 'Pickup') //for pickup
                ->get('task_types')
                ->row();

        $data['order_id'] = $order_id = $this->input->post('order_id');
        $data['task_type_id'] = $task_type_id = $task_type->task_type_id;
        $data['remarks'] = $remarks = $this->input->post('remarks');
        $data['user_id'] = $this->input->post('userid');
        $data['created_at'] = $cenvertedCurrentTime;

        if ($task_type_id != '' && $remarks != '') {
            $response = $this->db->insert('order_task_person', $data);
        }


//        echo '<pre>';
//        print_r($data);
//        print_r($_POST);
//        echo '</pre>';

        if ($response == 1) {
            $order_state = $this->db
                    ->select('*')
                    ->where('orderstatename', 'Started') //for order status name
                    ->get('order_state')
                    ->row();

            $response2 = $this->db
                    ->where('order_id', $order_id)
                    ->set('order_state_id', $order_state->orderstateid)
                    ->set('updated_at', $cenvertedCurrentTime)
                    ->update('orders');
        }

//        echo $response;
//        echo '<br>';
//        echo $response2;
//        echo '<br>';

        if ($response == 1) {
//            echo 'success';
            $data2['pickupMan'] = $this->db
                    ->select('*')
                    ->where('order_id', $order_id)
                    ->where('task_type_id', 1)//Pickup
                    ->get('order_task_person')
                    ->result();
            $this->load->view('dashboard-admin/order-status/assign/assign-pickup-man', $data2);
        } else {
            echo 'Failed! Try again.';
        }
    }

    public function task_assign_delivery() {

//        echo 'Hello delivery';
//        exit();

        $data = array();
        $data2 = array();
        $response = '';
        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $task_type = $this->db
                ->select('*')
                ->where('type_name', 'Delivery') //for delivery
                ->get('task_types')
                ->row();

        $data['order_id'] = $order_id = $this->input->post('order_id');
        $data['task_type_id'] = $task_type_id = $task_type->task_type_id;
        $data['remarks'] = $remarks = $this->input->post('remarks');
        $data['user_id'] = $this->input->post('userid');
        $data['created_at'] = $cenvertedCurrentTime;

        if ($task_type_id != '' && $remarks != '') {
            $response = $this->db->insert('order_task_person', $data);
        }

//        echo '<pre>';
//        print_r($data);
//        print_r($_POST);
//        echo '</pre>';

        if ($response == 1) {
            $order_state = $this->db
                    ->select('*')
                    ->where('orderstatename', 'Started') //for order status name
                    ->get('order_state')
                    ->row();

            $response2 = $this->db
                    ->where('order_id', $order_id)
                    ->set('order_state_id', $order_state->orderstateid)
                    ->set('updated_at', $cenvertedCurrentTime)
                    ->update('orders');
        }

        if ($response == 1) {
//            echo 'success';
            $data2['deliveryMan'] = $this->db
                    ->select('*')
                    ->where('order_id', $order_id)
                    ->where('task_type_id', 2)//delivery
                    ->get('order_task_person')
                    ->result();
            $this->load->view('dashboard-admin/order-status/assign/assign-delivery-man', $data2);
        } else {
            echo 'Failed! Try again.';
        }
    }

    public function assign_selected_order() {

//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        exit();
        $order_id = array();
        $data = array();
        $data2 = array();
        $inputArray = array();

        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        $order_id = $this->input->post('order_id'); //array
        $data['user_id'] = $userid = $this->input->post('userid');
        $type = $this->input->post('type'); //pickup/delivery
        $data['remarks'] = $remarks = $this->input->post('remarks');
        $data['created_at'] = $created_at = $cenvertedCurrentTime;


        $order_state = $this->db
                ->select('*')
                ->where('orderstatename', 'Started') //for order status name
                ->get('order_state')
                ->row();

        if ($type == 'Pickup') {
            $task_type = $this->db
                    ->select('*')
                    ->where('type_name', 'Pickup') //for pickup
                    ->get('task_types')
                    ->row();
        } elseif ($type == 'Delivery') {
            $task_type = $this->db
                    ->select('*')
                    ->where('type_name', 'Delivery') //for delivery
                    ->get('task_types')
                    ->row();
        }
        $data['task_type_id'] = $task_type_id = $task_type->task_type_id;

        if (!empty($order_id)) {

            foreach ($order_id as $oRow) {
                $inputArray = array(
                    'order_id' => $oRow,
                    'user_id' => $userid,
                    'task_type_id' => $task_type_id,
                    'remarks' => $remarks,
                    'created_at' => $created_at,
                );


                $response = $this->db->insert('order_task_person', $inputArray);

                if ($response == 1) {
                    $response2 = $this->db
                            ->where('order_id', $oRow)
                            ->set('order_state_id', $order_state->orderstateid)
                            ->set('updated_at', $cenvertedCurrentTime)
                            ->update('orders');
                }
            }
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/dashboard/new_order');
        } else {
            $sess['exception'] = 'Please select atleast one order';
            $this->session->set_userdata($sess);
            redirect('admin/dashboard/new_order');
        }
    }

    public function assign_selected_pending_order() {

        $data = array();
        $order_array = $this->input->post('order_id'); //array
        $order_state_id = $this->input->post('orderstateid'); // order status name (complete/pending/etc)
        $remarks = $this->input->post('remarks');
        $order_stateInfo = $this->db
                ->select('*')
                ->where('orderstateid', $order_state_id)
                ->get('order_state')
                ->row();

        $order_stateName = $order_stateInfo->orderstatename;
        $user_id = $this->session->userdata('user_id');
        $task_type_id = 0; // none of delivery/pickup


        $startTime = date("Y-m-d H:i:s");
        $cenvertedCurrentTime = date('Y-m-d H:i:s', strtotime('+6 hour', strtotime($startTime)));

        if (!empty($order_array)) {
            foreach ($order_array as $row) {
                $inputArray = array(
                    'order_id' => $row,
                    'remarks' => $remarks,
                    'task_state_id' => $order_state_id,
                    'task_type_id' => $task_type_id,
                    'user_id' => $user_id,
                    'created_at' => $cenvertedCurrentTime,
                    'updated_at' => $cenvertedCurrentTime,
                );
                $response = $this->db->insert('order_tasks', $inputArray);
                if ($response == 1) {
                    //update order status to Orders table----------------------------------
                    $this->db
                            ->where('order_id', $row)
                            ->set('order_state_id', $order_state_id)
                            ->set('updated_at', $cenvertedCurrentTime)
                            ->update('orders');
                }
            }

            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/dashboard');
        } else {
            $sess['exception'] = 'Please select at least one order';
            $this->session->set_userdata($sess);
            redirect('admin/dashboard');
        }

//        echo '<pre>';
//        print_r($order_stateInfo);
//        print_r($_POST);
//        echo '</pre>';
//        exit();
    }
    

    private function sendSMS($numbers = null, $message = null, $invoice = "00000") {
        $hash = "0390d737d5de692f56b1b1b55205e2da";
        $sender = "8809617640017";
        $msisdn = $numbers;

        $params = [
            'msisdn' => $msisdn,
            'smstext' => $message,
            'apikey' => $hash,
            'sender' => $sender
        ];

        $url = "https://api.automas.com.bd/smsapiv3";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $timeNdate = gmdate("Y-m-d H:i", time() + 6*60*60);
        $this->db->insert('sms_log', array(
            'mobile' => $numbers,
            'invoice' => $invoice,
            'message' => $message,
            'response' => $response,
            'created_at' => $timeNdate,
        ));

        return $response;
    }
}
