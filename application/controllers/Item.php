<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
     public function index() {
        $item = $this->input->get('item', TRUE);
        $serial = $this->input->get('serial', TRUE);
        $orderIdInput = $this->input->get('order', TRUE);
        $item = is_string($item) ? trim($item) : '';
        $serial = is_string($serial) ? trim($serial) : '';
        $orderIdInput = is_string($orderIdInput) ? trim($orderIdInput) : '';

        $product = NULL;
        $inventoryLog = NULL;
        $order = NULL;
        $orderRequested = $orderIdInput !== '';


        if ($item !== '') {
            $product = $this->db
                    ->select('product.name, product.item_code, product.qty, product_category.name AS category')
                    ->from('product')
                    ->join('product_category', 'product_category.id = product.category_id', 'left')
                    ->where('product.item_code', $item)
                    ->get()
                    ->row();

            if ($product && $serial !== '') {
                $inventoryLog = $this->db
                        ->where('item_code', $product->item_code)
                        ->where('serial', $serial)
                        ->get('inventory_log')
                        ->row();
            }
        }

        if ($orderRequested && ctype_digit($orderIdInput) && (int) $orderIdInput > 0) {
            $order = $this->db
                        ->where('order_id', (int) $orderIdInput)
                        ->get('orders')
                        ->row();
        }

        $data = array(
            'product' => $product,
            'serial' => $serial,
            'inventory_log' => $inventoryLog,
            'order' => $order,
            'order_requested' => $orderRequested
        );

        $this->load->view('frontend/items-view', $data);
    }
}