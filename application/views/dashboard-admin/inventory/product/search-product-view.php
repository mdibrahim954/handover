<?php
if (isset($header)) {
    echo $header;
}
?>
<div class="col-sm-10 col-md-10 col-lg-10 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <div class="card" style="margin:50px auto;max-width:850px;">
            
            <div class="header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="title">Search Result</h4>  
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
                <?php // $this->load->view('error-message-display'); ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Item Code</th>
                            <th>Category Name</th>
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
                                    ->where('id', $row['category_id'])
                                    ->get('product_category')
                                    ->row();
                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['item_code']; ?>
                                </td>
                                <td>
                                    <?php echo $category->name; ?>
                                </td>
                                <td>
                                    <span class="label <?php if ($row['qty'] >= 10) { ?>label-success <?php } else if ($row['qty'] < 10 && $row['qty'] >= 1) { ?>label-warning <?php } else if ($row['qty'] == 0) { ?> label-danger <?php } ?> " style="font-weight: bold; font-size: 16px">&nbsp;&nbsp; <?php echo $row['qty']; ?> &nbsp;&nbsp; </span>

                                </td>

                                <td style="text-align:center">
                                    <a href="<?php echo base_url(); ?>admin/product/edit/<?php echo $row['id']; ?>" class="btn btn-xs btn-default" tabindex="0">Edit</a>
                                    <?php if ($this->session->userdata('menu_permission') == 1) { ?>
                                        <?php if ($row['status'] == 1 && $this->session->userdata('menu_permission')==1) { ?>
                                            <a href="<?php echo base_url(); ?>admin/product/delete/<?php echo $row['id']; ?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-xs btn-warning disabled" >Deleted</a>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                            $sl++;
                        }
                        ?>

                    </tbody>
                </table>


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