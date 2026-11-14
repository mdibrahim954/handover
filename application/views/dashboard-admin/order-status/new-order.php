<?php
if (isset($header)) {
    echo $header;
}
?>

<style>
      .print-preview-header {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #fff;
            flex-shrink: 0;
        }
</style>

<script type="text/javascript">
    $(document).ready(function () {
//    alert('hi');
        $('#select_all').on('click', function () {
            if (this.checked) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
        });
    });
</script>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component _nghost-c0=""><ol _ngcontent-c0="" class="breadcrumb">
            <li _ngcontent-c0=""><span _ngcontent-c0="" class="glyphicon glyphicon-home"></span> </li>
            <li _ngcontent-c0="" class="active">Dashboard</li>
        </ol>
        <div _ngcontent-c0="" class="maincontent">
            <div _ngcontent-c0="" style="margin:auto; margin-bottom:20px;">
                <div _ngcontent-c0="" class="page-header" style="margin-top: -10px;">
                    <div _ngcontent-c0="" class="row">

                        <div _ngcontent-c0="" class="col-md-12">
                            <h3 _ngcontent-c0="">Todays Order Status</h3>
                        </div>

                        <?php
                        if (isset($todays_order_status)) {
                            echo $todays_order_status;
                        }
                        ?>

                        <div class="col-md-12">
                            <h3 class="order_delete_status" style="color:green"></h3>
                        </div>


                    </div>

                </div>

                <div _ngcontent-c0="" class="tabbable-panel">
                    <div _ngcontent-c0="" class="tabbable-line">

                        <ul _ngcontent-c0="" class="nav nav-tabs ">
                            <li _ngcontent-c0="" >
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard">
                                    Pending 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_pending; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="" class="active" >
                                <!--<a _ngcontent-c0="" data-toggle="tab" href="#tab_default_2">-->
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/new_order">
                                    New 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_new; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="">
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/completed_order">
                                    Completed 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_completed; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="">
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/paid_order">
                                    Paid 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_completed; ?></span>
                                </a>
                            </li>
                            <li _ngcontent-c0="" >
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/canceled_order">
                                    Canceled 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_cancelled; ?></span>
                                </a>
                            </li>
                            <?php if($this->session->userdata('menu_permission')==1){?>
                            <!----><li _ngcontent-c0="" >
                                <a _ngcontent-c0="" href="<?php echo base_url(); ?>admin/dashboard/deleted_order">
                                    Deleted 
                                    <span _ngcontent-c0="" class="badge"><?php echo $count_declined; ?></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                            <!-- Button trigger modal -->

                        <div _ngcontent-c0="" class="tab-content">

    <div class="d-flex gap-3">

        <select id="ndev-invoice-day-selection" class="rounded p-2 border-gray ndev-fields form-control" value="0">
            <option value="0" >Select Day</option>
            <option slected value="1">today</option>
            <option value="2">Yesterday</option>
            <option value="3">Last 3 days</option>
            <option value="7">Last 7 days</option>
            <option value="15">Last 15 days</option>
            <option value="30">Last 30 days</option>
            <option value="0">all</option>

        </select>
        <select id="ndev-invoice-limit-selection" class="rounded p-2 border-gray ndev-fields form-control" value="50">
            <option value="0">Select</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
            <option value="500">500</option>
             <option slected value="0">all</option>
        </select>


        <button type="button" class="btn btn-info mt-2" id="ndev-print-invoice-filter">
            Invoice filter
        </button>

        <button type="button" class="btn btn-success mt-2" id="ndev-print-invoice">
            Print Invoices
        </button>
    </div>



                            <div _ngcontent-c0="" class="tab-pane active" id="tab_default_1">
                                
                                
                                
                                <div  class="content table-responsive table-full-width">
                                    <br>
                                    <?php $this->load->view('error-message-display'); ?>
                                    <br>
                                    <form class="form-inline" action="<?php echo base_url() ?>admin/order/assign_selected_order" method="post">
                                        <div _ngcontent-c0="" class="form-group">
                                            <input type="checkbox" id="select_all" /> <span style="color:black;font-size: 18px;"> Select all</span><br><br>
                                        </div>
                                        <!--<div _ngcontent-c0="" class="form-group">-->                                            
                                        <select class="form-control" name="userid" required="">
                                            <option value="">Pickup/Delivery Man</option>
                                            <?php foreach ($delivery_man as $dMan) { ?>
                                                <option value="<?php echo $dMan->userid; ?>"><?php echo $dMan->first_name . ' ' . $dMan->last_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="form-control" name="type" required="">
                                            <option value="">Select type</option>
                                            <option value="Delivery">Delivery</option>
                                            <option value="Pickup">Pickup</option>
                                        </select>
                                        <!--</div>-->
                                        <input class="form-control" name="remarks" placeholder="Remarks" style="width:300px;" type="text">
                                        <input class="btn btn-success" type="submit" value="Assign"><br>
                                        <br>


                                        <table id="example" class="display table" style="width:100%" data-order-state-filter="13">
                                            <thead>
                                                <tr style="background-color: #5ba3ae">
                                                    <th>ID</th>
                                                    <th>Track Number</th>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Created DateTime</th>
                                                    <th>Pickup</th>
                                                    <th>Seller</th>
                                                    <th>Customer</th>
                                                    <th>Delivery</th>
                                                    <th>Sale By</th>
                                                </tr>
                                            </thead>
                                            <thead class="filters">
                                                <tr style="background-color: #5ba3ae">
                                                    <th>ID</th>
                                                    <th>Track Number</th>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Created DateTime</th>
                                                    <th>Pickup</th>
                                                    <th>Seller</th>
                                                    <th>Customer</th>
                                                    <th>Delivery</th>
                                                    <th>Sale By</th>
                                                </tr>
                                            </thead>
                                            <tbody class="ndev-table-data" id="ndev-table-data" >
                                                


                                            </tbody>
                                            <tfoot>
                                                <tr style="">
                                                    <th>ID</th>
                                                    <th>Track Number</th>
                                                    <th>Action</th>
                                                    <th>Status</th>
                                                    <th>Created DateTime</th>
                                                    <th>Pickup</th>
                                                    <th>Seller</th>
                                                    <th>Customer</th>
                                                    <th>Delivery</th>
                                                    <th>Ref Invoice</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                    </table>
                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div></div></ng-component>
</div>

</div>

    <!-- Modal -->
    <div class="modal" tabindex="-1" id="ndev-ivoices-model">
        <div class="modal-dialog">
            <div class="modal-content" style="height: 85vh;  overflow: auto;">
                <div _ngcontent-c0="" class="modal-header print-preview-header d-flex justify-content-between align-items-center" bis_skin_checked="1">
                    <h4 _ngcontent-c0="" class="title mb-0">Print Preview</h4>
                    <div>
                        <button _ngcontent-c0="" class="btn btn-primary ndev-print-invoice" type="button">Print</button>
                        <button _ngcontent-c0="" class="btn btn-secondary" data-bs-dismiss="modal" id="btnClose" type="button">Close</button>
                    </div>
                </div>
                <div _ngcontent-c0="" class="modal-body divPrintContentPapers" style="margin:0px auto;" bis_skin_checked="1"></div>
            </div>
        </div>
    </div>

</ng-component></app-root></div></div>
<script src="<?php echo base_url(); ?>assets/js/invoice-print.js" ></script>
</body>
</html>
