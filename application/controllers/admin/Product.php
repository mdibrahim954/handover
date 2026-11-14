<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id') && $this->session->userdata('user_type_id') != 1) {
            redirect(base_url());
        }
        $this->load->model('user_dashboard_model');
    }

    public function index() {
//        $this->load->library('form_validation');
//        $data = array();
//        $data['menu'] = 'inventory';
//        $user_id = $this->session->userdata('user_id');
//
//        $data['testimonial'] = $this->db
//                ->select('*')
//                ->get('product')
//                ->result();
//
//        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
//        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
//        $this->load->view('dashboard-admin/inventory/price-view', $data);
    }
    
    public function search_product() {
        
        $data = array();
        $data['menu'] = 'inventory';

        $category_id = trim($this->input->post('category_id'));
        $search_text = trim($this->input->post('search_text'));
        
        $data['result'] = $this->user_dashboard_model->searchProduct($search_text, $category_id);
        
        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/product/search-product-view', $data);
    }

    public function all($id = null) {

        if ($this->uri->segment(5)) {

            $offset = $this->uri->segment(5);
        } else {

            $offset = 0;
        }

        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'inventory';
        $user_id = $this->session->userdata('user_id');

        $data['all_product'] = $this->db
                ->select('*')
//                ->join('product_category','product_category.id=product.category_id')
                ->get('product')
                ->result();

        //        ------------------------Pagination Start----------------------------------------------
        $abc = count($data['all_product']);

        //        Pagination Start
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'admin/product/all/' . $id;
        $config['total_rows'] = $abc;
        $config['per_page'] = 20;
        $config['uri_segment'] = 5;
        $config['num_links'] = 4;

        //pagination settings
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
//        Pagination End
        $data['result'] = $this->user_dashboard_model->selectAllProductPagination($config['per_page'], $offset);

//        echo '<pre>';
//        print_r($data['result']);
//        echo '</pre>';
//        die();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/product/all-view', $data);
    }

    public function create() {
        $this->load->library('form_validation');
        $data = array();
        $data['menu'] = 'inventory';
        $user_id = $this->session->userdata('user_id');

        $data['category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->get('product_category')
                ->result();

//        echo '<pre>';
//        print_r($category);
//        echo '</pre>';

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/product/create-view', $data);
    }

    public function save() {
        $data = array();
        $data['name'] = $name = trim($this->input->post('name'));
        $data['category_id'] = trim($this->input->post('category_id'));
        $data['item_code'] = $item_code = trim($this->input->post('item_code'));
        $data['qty'] = trim($this->input->post('qty'));
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $duplicateCheck = $this->db
                ->select('*')
//                ->where('name', $name)
//                ->or_where('item_code', $item_code)
                ->where('item_code', $item_code)
                ->get('product')
                ->row();

        if (empty($duplicateCheck)) {

            $response = $this->db->insert('product', $data);
            $insert_id = $this->db->insert_id();

            if ($response == 1) {
                $data['product_id'] = $insert_id;
                $data['type'] = 'Insert';
                $data['created_by'] = $this->session->userdata('user_id');
                $response2 = $this->db->insert('product_logs', $data);

                $sess['success'] = 'Success!';
                $this->session->set_userdata($sess);
                redirect('admin/product/all');
            } else {
                $sess['exception'] = 'Something went to wrong! Try again';
                $this->session->set_userdata($sess);
                redirect('admin/product/create');
            }
        } else {
            $sess['exception'] = 'Oh! Already exist this Item Code. You can\'t create duplicate Item Code.';
            $this->session->set_userdata($sess);
            redirect('admin/product/create');
        }
    }

    public function edit($id) {
        $data = array();
        $data['menu'] = 'inventory';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('product')
                ->row();
        $data['category'] = $this->db
                ->select('*')
                ->where('status', 1)
                ->get('product_category')
                ->result();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/product/edit-view', $data);
    }

    public function print_view($id) {
        $data = array();
        $data['menu'] = 'inventory';
        $data['result'] = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('product')
                ->row();

        if (empty($data['result'])) {
            show_404();
            return;
        }

        $data['category'] = $this->db
                ->select('name')
                ->where('id', $data['result']->category_id)
                ->get('product_category')
                ->row();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);
        $this->load->view('dashboard-admin/inventory/product/print-view', $data);
    }

    public function update() {
        $data = array();
        $id = $this->input->post('id');

        $product = $this->db->where('id', $id)->get('product')->row();
        $get_total_solded = $product ? (int) $product->total_solded : 0;
        $get_qty = $product ? (int) $product->qty : 0;
        $new_qty = max(0, intval($this->input->post('qty')));

        $calculate_qty = $get_qty > $new_qty ? max(0, $new_qty - $get_qty) : $new_qty;

        $total_solded = $get_total_solded +  $new_qty ;

        $data['name'] = $name = trim($this->input->post('name'));
        $data['category_id'] = trim($this->input->post('category_id'));
        $data['item_code'] = $item_code = trim($this->input->post('item_code'));
        $data["total_solded"] = $total_solded;
        $data['qty'] = $get_qty + $new_qty;

        $data['updated_at'] = date('Y-m-d H:i:s');

        $current_serial =  $total_solded - $new_qty + 1;

        $response = $this->db
                ->where('id', $id)
                ->update('product', $data);

        for (; $current_serial <= $total_solded; $current_serial++) {
            $this->db->insert('inventory_log', array(
                'item_code' => $item_code,
                'serial' => $current_serial,
                'sold' => 0
            ));
        }
        


        if ($response == 1) {
            $data['product_id'] = $id;
            $data['type'] = 'Update';
            $data['created_by'] = $this->session->userdata('user_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $response2 = $this->db->insert('product_logs', $data);

            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/product/all');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/product/all');
        }
    }
    public function history($id) {
        $result = $this->db
                ->select('*')
                ->where('id', $id)
                ->get('product')
                ->row();

        if (empty($result)) {
            show_404();
            return;
        }

        $data['result'] = $result;
        $per_page = 10;
        $offset = max(0, (int) $this->uri->segment(5, 0));
        $total_rows = $this->db
                ->where('item_code', $result->item_code)
                ->count_all_results('product_logs');

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/product/history/' . $id;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 5;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
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

        $data['history'] = $this->db
                ->select('product_logs.*, CONCAT(users.first_name, " ", users.last_name) AS created_by_name')
                ->from('product_logs')
                ->join('users', 'users.userid = product_logs.created_by', 'left')
                ->where('product_logs.item_code', $result->item_code)
                ->order_by('product_logs.created_at', 'DESC')
                ->limit($per_page, $offset)
                ->get()
                ->result();
        $data['pagination'] = $this->pagination->create_links();

        $data['header'] = $this->load->view('dashboard-admin/common/admin-header', $data, TRUE);
        $data['footer'] = $this->load->view('dashboard-admin/common/admin-footer', $data, TRUE);

        $this->load->view('dashboard-admin/inventory/product/history', $data);
    }

    public function export_history_csv($id) {
        $product = $this->db
                ->select('id, item_code')
                ->where('id', $id)
                ->get('product')
                ->row();

        if (empty($product)) {
            show_404();
            return;
        }

        $history = $this->db
                ->select('product_logs.*, CONCAT(users.first_name, " ", users.last_name) AS created_by_name')
                ->from('product_logs')
                ->join('users', 'users.userid = product_logs.created_by', 'left')
                ->where('product_logs.item_code', $product->item_code)
                ->order_by('product_logs.created_at', 'DESC')
                ->get()
                ->result();

        $total_qty = 0;
        foreach ($history as $item) {
            if (isset($item->qty) && is_numeric($item->qty)) {
                $total_qty += (float) $item->qty;
            }
        }

        $filename = 'product-history-' . preg_replace('/[^A-Za-z0-9._-]/', '-', $product->item_code) . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        if ($output === false) {
            show_error('Unable to generate the CSV export.', 500);
            return;
        }

        fwrite($output, "\xEF\xBB\xBF");
        fputcsv($output, array('Product Name', 'Item Code', 'Qty', 'Created By', 'Status', 'Date'));

        foreach ($history as $item) {
            $created_by = !empty($item->created_by_name)
                    ? $item->created_by_name
                    : (isset($item->created_by) ? $item->created_by : '-');
            $status = isset($item->status)
                    ? $item->status
                    : (isset($item->type) ? $item->type : '-');

            fputcsv($output, array(
                $this->safe_csv_value(isset($item->name) ? $item->name : ''),
                $this->safe_csv_value(isset($item->item_code) ? $item->item_code : ''),
                isset($item->qty) && is_numeric($item->qty) ? $item->qty : 0,
                $this->safe_csv_value($created_by),
                $this->safe_csv_value($status),
                $this->safe_csv_value(isset($item->created_at) ? $item->created_at : ''),
            ));
        }

        fputcsv($output, array());
        fputcsv($output, array('Total Qty', $total_qty));
        fclose($output);
        exit;
    }

    private function safe_csv_value($value) {
        $value = (string) $value;
        if (preg_match('/^[\s]*[=+\-@]/', $value)) {
            return "'" . $value;
        }

        return $value;
    }

    public function delete($id) {
        $response = $this->db
                ->where('id', $id)
                ->set('status', 0)
                ->update('product');

        if ($response == 1) {
            $sess['success'] = 'Success!';
            $this->session->set_userdata($sess);
            redirect('admin/product/all');
        } else {
            $sess['exception'] = 'Something went to wrong! Try again';
            $this->session->set_userdata($sess);
            redirect('admin/product/all');
        }
    }

}
