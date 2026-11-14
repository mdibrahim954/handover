<?php
if (isset($header)) {
    echo $header;
}
?>

<style>
    .header{
        display: flex;
        justify-content: space-between;
    }
     .pagination{
        display: flex !important;
   
        width: 100% !important;
        justify-content: center !important;
        padding-bottom: 15px !important;
     }   
</style>

<main class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <div class="card" style="margin:50px auto;max-width:1100px;">
        <div class="header">
            <div>
                <h4 class="title">History</h4>
            </div>
            <div><a href="<?php echo site_url('admin/product/all'); ?>" class="btn btn-default">Back</a>
            <a href="<?php echo site_url('admin/product/export_history_csv/' . $result->id); ?>" class="btn btn-success">Export CSV</a></div>
            
        </div>

        <?php if (empty($history)): ?>
            <p>Product Log Not Found!</p>
        <?php else: ?>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Item Code</th>
                        <th>Qty</th>
                        <th>Created By</th>
                        <!-- <th>Status</th> -->
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($history as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars(isset($item->name) ? $item->name : '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars(isset($item->item_code) ? $item->item_code : '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars(isset($item->qty) ? $item->qty : '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars(!empty($item->created_by_name) ? $item->created_by_name : (isset($item->created_by) ? $item->created_by : '-'), ENT_QUOTES, 'UTF-8'); ?></td>
                            <!-- <td><?php // echo htmlspecialchars(isset($item->status) ? $item->status : (isset($item->type) ? $item->type : '-'), ENT_QUOTES, 'UTF-8'); ?></td> -->
                            <td><?php echo htmlspecialchars(isset($item->created_at) ? $item->created_at : '', ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php echo $pagination; ?>
        <?php endif; ?>
    </div>
</main>

<?php
if (isset($footer)) {
    echo $footer;
}
?>