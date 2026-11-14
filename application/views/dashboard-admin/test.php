<?php

//insert item price---------------------------------------------------------
if (!empty($item)) {
    foreach ($item as $item2) {
        if (($item2['quantity'] != '' || $item2['quantity'] != 0) && ($item2['price'] != '' || $item2['price'] != 0)) {
            $item_code = $item2['item_code'];
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