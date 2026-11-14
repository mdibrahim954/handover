<?php
if (isset($header)) {
    echo $header;
}
?>

<main class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <div class="card" style="margin:50px auto;max-width:650px;">
        <div class="header">
            <h4 class="title">Scan Product Barcode</h4>
        </div>
        <div class="content">
            <?php $this->load->view('error-message-display'); ?>
            <p>Scan a product barcode. The matching product details will open automatically.</p>
            <form action="<?php echo base_url(); ?>admin/product/scan_lookup" method="post">
                <div class="form-group">
                    <label for="item_code">Product item code</label>
                    <input
                        class="form-control"
                        id="item_code"
                        name="item_code"
                        type="text"
                        autocomplete="off"
                        autofocus
                        required
                    >
                </div>
                <button class="btn btn-primary" type="submit">Find Product</button>
                <a class="btn btn-default" href="<?php echo base_url(); ?>admin/product/all">Back to products</a>
            </form>
        </div>
    </div>
</main>

</ng-component></app-root></div></div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>
