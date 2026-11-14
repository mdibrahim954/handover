<?php
if (isset($header)) {
    echo $header;
}

$orderId = isset($orderinfo->order_id) ? $orderinfo->order_id : '';
$trackingNumber = isset($orderinfo->track_number) ? $orderinfo->track_number : '';
$customerName = isset($orderinfo->customer_name) ? $orderinfo->customer_name : '';
$customerMobile = isset($orderinfo->customer_mobile) ? $orderinfo->customer_mobile : '';
$customerAddress = isset($orderinfo->customer_address) ? $orderinfo->customer_address : '';
?>

<style>
    .insert-qty-page {
        margin-top: 30px;
    }

    .insert-qty-heading {
        margin: 0 0 22px;
        color: #344453;
    }

    .insert-qty-workspace,
    .insert-qty-sidebar {
        background: #fff;
        border: 1px solid #e6e9ed;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(34, 54, 75, 0.06);
    }

    .insert-qty-workspace {
        min-height: 560px;
        padding: 22px;
    }

    .insert-qty-scan-form {
        margin-bottom: 24px;
    }

    .insert-qty-scan-form .input-group {
        width: 100%;
    }

    .insert-qty-result {
        display: none;
        margin-bottom: 24px;
        padding: 18px;
        border: 1px solid #d8e6f3;
        border-radius: 6px;
        background: #f7fbff;
    }

    .insert-qty-result h4 {
        margin-top: 0;
        font-weight: 600;
    }

    .insert-qty-status {
        display: none;
        margin-bottom: 18px;
    }

    .insert-qty-list-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 0 0 12px;
    }

    .insert-qty-list-heading h4 {
        margin: 0;
        color: #344453;
    }

    .insert-qty-table-wrap {
        overflow-x: auto;
    }

    .insert-qty-table {
        margin-bottom: 0;
    }

    .insert-qty-pagination {
        margin-bottom: 0;
    }

    .insert-qty-state-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #edf0f2;
    }

    .insert-qty-sidebar {
        position: sticky;
        top: 20px;
        padding: 20px;
    }

    .insert-qty-sidebar h4 {
        margin: 0 0 18px;
        padding-bottom: 14px;
        border-bottom: 1px solid #edf0f2;
        color: #344453;
        font-weight: 600;
    }

    .insert-qty-detail {
        margin-bottom: 16px;
    }

    .insert-qty-detail:last-child {
        margin-bottom: 0;
    }

    .insert-qty-detail-label {
        display: block;
        margin-bottom: 4px;
        color: #7b8794;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .insert-qty-detail-value {
        color: #344453;
        overflow-wrap: anywhere;
    }

    @media (max-width: 767px) {
        .insert-qty-page {
            margin-top: 20px;
        }

        .insert-qty-workspace {
            min-height: 360px;
            margin-bottom: 20px;
        }

        .insert-qty-sidebar {
            position: static;
        }
    }
</style>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <main class="insert-qty-page">
        <h3 class="insert-qty-heading">Insert Quantity</h3>

        <div class="row">
            <section class="col-md-8" aria-label="Quantity workspace">
                <div class="insert-qty-workspace">
                    <form id="insert-qty-scan-form" class="insert-qty-scan-form">
                        <div class="form-group">
                            <label for="insert-qty-barcode">Scan barcode or QR code</label>
                            <div class="input-group">
                                <input
                                    class="form-control"
                                    id="insert-qty-barcode"
                                    type="text"
                                    autocomplete="off"
                                    placeholder="Scan ITEMCODE-SERIAL here"
                                    required
                                    autofocus
                                >
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Find item</button>
                                </span>
                            </div>
                        </div>
                    </form>

                    <div class="alert insert-qty-status" id="insert-qty-status" role="status" aria-live="polite"></div>

                    <section class="insert-qty-result" id="insert-qty-result" aria-live="polite">
                        <h4 id="insert-qty-product-name"></h4>
                        <p><strong>Item code:</strong> <span id="insert-qty-item-code"></span></p>
                        <p><strong>Serial:</strong> <span id="insert-qty-serial"></span></p>
                        <button class="btn btn-success" id="insert-qty-add-button" type="button">Add quota</button>
                    </section>

                    <div class="insert-qty-list-heading">
                        <h4>Added items</h4>
                        <span class="text-muted"><?php echo (int) $qty_item_count; ?> total</span>
                    </div>
                    <div class="insert-qty-table-wrap">
                        <table class="table table-bordered table-striped insert-qty-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Item Code</th>
                                    <th>Serial</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($qty_items)) { ?>
                                    <?php foreach ($qty_items as $item) { ?>
                                        <tr>
                                            <td><?php echo html_escape($item->product_name ? $item->product_name : 'Product not found'); ?></td>
                                            <td><?php echo html_escape($item->item_code); ?></td>
                                            <td><?php echo html_escape($item->serial); ?></td>
                                            <td>
                                                <button
                                                    class="btn btn-danger btn-xs insert-qty-remove-button"
                                                    type="button"
                                                    data-item-code="<?php echo html_escape($item->item_code); ?>"
                                                    data-serial="<?php echo html_escape($item->serial); ?>"
                                                >Remove</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No items have been added to this order.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if (!empty($pagination)) { ?>
                        <nav class="insert-qty-pagination" aria-label="Added items pages">
                            <?php echo $pagination; ?>
                        </nav>
                    <?php } ?>
                    <div class="insert-qty-state-actions" aria-label="Order status actions">
                        <a class="btn btn-info" href="<?php echo base_url('admin/order/order_edit/' . rawurlencode((string) $orderId)); ?>">Edit</a>
                        <button class="btn btn-primary insert-qty-state-button" type="button" data-state="Pending">Pending</button>
                        <button class="btn btn-warning insert-qty-state-button" type="button" data-state="Cancelled">Cancelled</button>
                        <button class="btn btn-default insert-qty-state-button" type="button" data-state="Declined">Declined</button>
                        <button class="btn btn-danger insert-qty-state-button" type="button" data-state="Failed">Failed</button>
                    </div>
                </div>
            </section>

            <aside class="col-md-4" aria-label="Order details">
                <div class="insert-qty-sidebar">
                    <h4>Order Details</h4>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Order ID</span>
                        <div class="insert-qty-detail-value"><?php echo html_escape($orderId); ?></div>
                    </div>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Tracking Number</span>
                        <div class="insert-qty-detail-value"><?php echo html_escape($trackingNumber); ?></div>
                    </div>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Current Order Status</span>
                        <div class="insert-qty-detail-value">
                            <?php if (!empty($current_order_status)) { ?>
                                <span style="display:inline-block;background:<?php echo html_escape($current_order_status->state_color); ?>;border-radius:3px;color:#fff;padding:4px 8px;">
                                    <?php echo html_escape($current_order_status->orderstatename); ?>
                                </span>
                            <?php } else { ?>
                                <span class="text-muted">Unknown</span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Order Item Codes</span>
                        <div class="insert-qty-detail-value">
                            <?php if (!empty($order_item_codes)) { ?>
                                <?php foreach ($order_item_codes as $orderItemCode) { ?>
                                    <div>
                                        <?php echo html_escape($orderItemCode->item_code); ?>
                                        <span>— Qty: <?php echo html_escape($orderItemCode->quantity); ?></span>
                                        <small class="text-muted">
                                            (Added: <?php echo (int) $orderItemCode->added_quantity; ?>)
                                        </small>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <span class="text-muted">No item codes on this order.</span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Customer</span>
                        <div class="insert-qty-detail-value"><?php echo html_escape($customerName); ?></div>
                    </div>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Phone</span>
                        <div class="insert-qty-detail-value"><?php echo html_escape($customerMobile); ?></div>
                    </div>

                    <div class="insert-qty-detail">
                        <span class="insert-qty-detail-label">Address</span>
                        <div class="insert-qty-detail-value"><?php echo html_escape($customerAddress); ?></div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
</div>

<script>
    (function () {
        var scanForm = document.getElementById('insert-qty-scan-form');
        var barcodeInput = document.getElementById('insert-qty-barcode');
        var status = document.getElementById('insert-qty-status');
        var result = document.getElementById('insert-qty-result');
        var addButton = document.getElementById('insert-qty-add-button');
        var lookupUrl = <?php echo json_encode(base_url() . 'admin/order/insert_qty_lookup/' . rawurlencode((string) $orderId), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        var addUrl = <?php echo json_encode(base_url() . 'admin/order/insert_qty_add/' . rawurlencode((string) $orderId), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        var removeUrl = <?php echo json_encode(base_url() . 'admin/order/insert_qty_remove/' . rawurlencode((string) $orderId), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        var stateUrl = <?php echo json_encode(base_url() . 'admin/order/insert_qty_set_state/' . rawurlencode((string) $orderId), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        var listUrl = <?php echo json_encode(base_url() . 'admin/order/insert_qty/' . rawurlencode((string) $orderId), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
        var selectedItem = null;

        function showStatus(message, isError) {
            status.textContent = message;
            status.className = 'alert insert-qty-status ' + (isError ? 'alert-danger' : 'alert-info');
            status.style.display = 'block';
        }

        function postForm(url, values) {
            return fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                body: new URLSearchParams(values).toString()
            }).then(function (response) {
                return response.json().then(function (body) {
                    if (!response.ok || !body.success) {
                        throw new Error(body.message || 'The request could not be completed.');
                    }
                    return body;
                });
            });
        }

        scanForm.addEventListener('submit', function (event) {
            event.preventDefault();
            result.style.display = 'none';
            selectedItem = null;
            showStatus('Looking up item...', false);

            postForm(lookupUrl, { barcode: barcodeInput.value.trim() })
                .then(function (response) {
                    selectedItem = response.product;
                    document.getElementById('insert-qty-product-name').textContent = selectedItem.name;
                    document.getElementById('insert-qty-item-code').textContent = selectedItem.item_code;
                    document.getElementById('insert-qty-serial').textContent = selectedItem.serial;
                    result.style.display = 'block';
                    status.style.display = 'none';
                    addButton.disabled = false;
                })
                .catch(function (error) {
                    showStatus(error.message, true);
                    barcodeInput.select();
                });
        });

        addButton.addEventListener('click', function () {
            if (!selectedItem) {
                return;
            }

            addButton.disabled = true;
            showStatus('Adding item to this order...', false);
            postForm(addUrl, {
                item_code: selectedItem.item_code,
                serial: selectedItem.serial
            })
                .then(function () {
                    window.location.href = listUrl;
                })
                .catch(function (error) {
                    showStatus(error.message, true);
                    addButton.disabled = false;
                });
        });

        document.querySelectorAll('.insert-qty-remove-button').forEach(function (button) {
            button.addEventListener('click', function () {
                if (!window.confirm('Remove this item from the order?')) {
                    return;
                }

                button.disabled = true;
                postForm(removeUrl, {
                    item_code: button.getAttribute('data-item-code'),
                    serial: button.getAttribute('data-serial')
                })
                    .then(function () {
                        window.location.href = listUrl;
                    })
                    .catch(function (error) {
                        showStatus(error.message, true);
                        button.disabled = false;
                    });
            });
        });

        document.querySelectorAll('.insert-qty-state-button').forEach(function (button) {
            button.addEventListener('click', function () {
                var state = button.getAttribute('data-state');
                var buttons = document.querySelectorAll('.insert-qty-state-button');
                if (state !== 'Pending' && !window.confirm('Change the order to ' + state + '? Added inventory items will be released.')) {
                    return;
                }

                buttons.forEach(function (stateButton) {
                    stateButton.disabled = true;
                });
                showStatus('Updating order status...', false);

                postForm(stateUrl, { state: state })
                    .then(function (response) {
                        showStatus(response.message, false);
                        window.location.href = listUrl;
                    })
                    .catch(function (error) {
                        showStatus(error.message, true);
                        buttons.forEach(function (stateButton) {
                            stateButton.disabled = false;
                        });
                    });
            });
        });
    }());
</script>

<?php
if (isset($footer)) {
    echo $footer;
}
?>