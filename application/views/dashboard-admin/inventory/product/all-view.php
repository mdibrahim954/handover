<?php
if (isset($header)) {
    echo $header;
}
?>
<div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <div class="card" style="margin:50px auto;max-width:900px;">
            <div class="header">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="title">Product</h4>  
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-default" href="<?php echo base_url(); ?>admin/barcodescan">Scan barcode</a>
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/product/create">Create new</a>
                    </div>
                </div>

            </div>
            <div class="header">
                <div class="row text-center">
                    <br>
                    <form class="form-inline" action="<?php echo base_url() ?>admin/product/search_product" method="post">

                        <select class="form-control" name="category_id">
                            <option value="">Select Any</option>
                            <?php
                            $categoryAll = $this->db
                                    ->select('*')
                                    ->where('status', 1)
                                    ->get('product')
                                    ->result();
                            foreach ($categoryAll as $aCategory) {
                                ?>
                                <option value="<?php echo $aCategory->id; ?>"><?php echo $aCategory->name; ?></option>
<?php } ?>
                        </select>                                        
                        <input class="form-control" required="" name="search_text" placeholder="Search" style="width:300px;" type="text">
                        <input class="btn btn-default" type="submit" value="Search"><br>
                        <br>
                    </form>
                </div>

            </div>
            <br>
            <div class="content table-responsive table-full-width">
<?php $this->load->view('error-message-display'); ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Item Code</th>
                            <th>Category Name</th>
                            <th>Total Solded</th>
                            <th>Qty</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        foreach ($result as $row) {
                            $category = $this->db
                                    ->select('*')
                                    ->where('id', $row->category_id)
                                    ->get('product_category')
                                    ->row();
                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td>
             <?php echo $row->name; ?>
                                </td>
                                <td>
    <?php echo $row->item_code; ?>
                                </td>
                                <td>
    <?php echo $category->name; ?>
                                </td>
                                <td>
                                    <span class=" badge " ><?php echo $row->total_solded; ?></span>
                                </td>
                                <td>
                                    <span class="label <?php if ($row->qty >= 10) { ?>label-success <?php } else if ($row->qty < 10 && $row->qty >= 1) { ?>label-warning <?php } else if ($row->qty == 0) { ?> label-danger <?php } ?> " style="font-weight: bold; font-size: 16px">&nbsp;&nbsp; <?php echo $row->qty; ?> &nbsp;&nbsp; </span>

                                    

                                </td>

                                <td style="text-align:center">
                                    <div class="dropdown product-actions">
                                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo base_url(); ?>admin/product/history/<?php echo $row->id; ?>">History</a></li>
                                            <li><a href="<?php echo base_url(); ?>admin/product/print_view/<?php echo $row->id; ?>">Print Barcode</a></li>
                                            <li><a href="<?php echo base_url(); ?>admin/product/edit/<?php echo $row->id; ?>">Edit</a></li>
                                            <?php if ($this->session->userdata('menu_permission') == 1) { ?>
                                                <li class="divider"></li>
                                                <?php if ($row->status == 1) { ?>
                                                    <li><a href="<?php echo base_url(); ?>admin/product/delete/<?php echo $row->id; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a></li>
                                                <?php } else { ?>
                                                    <li class="disabled"><a href="#" aria-disabled="true">Deleted</a></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $sl++;
                        }
                        ?>

                    </tbody>
                </table>
                <div class="text-center">

                <?php echo $this->pagination->create_links(); ?>
                </div>

            </div>
        </div>


    </ng-component>


</div>

</div>

</ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>