<!DOCTYPE html>
<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Handover Express</title><!-- base href="http://handoverexpressbd.com/" -->
        <meta name="viewport" content="image/png" href="./assets/images/favicon.png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sidebar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datePicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/progress.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/filterable.css">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <style>.status[_ngcontent-c0]{font-family:Source Sans Pro,sans-serif}.status[_ngcontent-c0]   .panel-title[_ngcontent-c0]{font-family:Oswald,sans-serif;font-size:72px;font-weight:700;color:#fff;line-height:45px;padding-top:20px;letter-spacing:-.8px}.status[_ngcontent-c0]{box-shadow:4px 4px 4px #d4d4d4}</style>

        <link rel=stylesheet type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!--        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/inline.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/polyfills.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JsBarcode.all.min.js"></script>


        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $(".datepicker").datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                // Setup - add a text input to each footer cell
                $('#example tfoot th').each(function () {
                    var title = $(this).text();
                    $(this).html('<input type="text" placeholder="Search ' + title + '" />');
                });

                // DataTable
                var table = $('#example').DataTable({
                    "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
                    responsive: true,
                    "order": [[4, 'desc']]
//                    scrollY:        "400px",
//                    scrollX:        true,
//                    scrollCollapse: true,
//                    paging:         false,
//                    fixedColumns:   true
//                    https://datatables.net/extensions/fixedcolumns/examples/styling/col_filter.html

                });



                // Apply the search
                table.columns().every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change', function () {
                        if (that.search() !== this.value) {
                            that
                                    .search(this.value)
                                    .draw();
                        }
                    });
                });
            });

            $(document).ready(function () {
                // Setup - add a text input to each footer cell
                $('#example .filters th').each(function () {
                    var title = $('#example thead th').eq($(this).index()).text();
                    $(this).html('<input type="text" placeholder="Search ' + title + '" />');
                });

                // DataTable
                var table = $('#example').DataTable();

                // Apply the search
                table.columns().eq(0).each(function (colIdx) {
                    $('input', $('.filters th')[colIdx]).on('keyup change', function () {
                        table
                                .column(colIdx)
                                .search(this.value)
                                .draw();
                    });
                });


            });
        </script>
        <style>
            thead input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;
            }
            tfoot input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;
            }
            .dataTables_info{
                display:none;
            }

            /*           table.dataTable th:nth-child(n) {
              width: 300px;
              max-width: 300px;
              word-break: break-all;
              white-space: pre-line;
            }
            
            table.dataTable td:nth-child(n) {
              width: 300px;
              max-width: 300px;
              word-break: break-all;
              white-space: pre-line;
            }*/

            /*th, td { white-space: nowrap; }*/
            /*            th, td { white-space: wrap; }
                div.dataTables_wrapper {
                    width: 800px;
                    margin: 0 auto;
                }
             
                th input {
                    width: 90%;
                }*/


        </style>

    </head>
    <body>
        <div class="container-fluid"><div class="row"><div id="divProgressLine" class="progress"><div class="indeterminate"></div></div><app-root ng-version="4.4.6"><router-outlet></router-outlet><ng-component>


                        <admin-navbar>
                            <div class="main-navigation navbar-fixed-top">
                                <nav class="navbar navbar-default">
                                    <div style="padding-right:10px;">	
                                        <div class="navbar-header">
                                            <button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="<?php echo base_url(); ?>admin/dashboard">Handover Express</a>
                                        </div>
                                        <div class="collapse navbar-collapse" id="myNavbar">
                                            <ul class="nav navbar-nav">
                                                <li style="margin-left:20px;">
                                                    <div id="custom-search-input">
                                                        <form action="<?php echo base_url(); ?>admin/order/order_track" method="post">
                                                            <div class="input-group" style="width:180px;background-color:#EEEEEE;">
                                                                <input class="form-control input-lg" name="tracknumber" required="" placeholder="Track number" style="height:22px;background-color:#EEEEEE" type="text">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-info btn-lg" type="submit">
                                                                        <i class="glyphicon glyphicon-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>	
                                            <ul class="nav navbar-nav navbar-right">						
                                                <li routerlinkactive="active" class="active"><!---->
                                                    <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                                <li><!----><a href="<?php echo base_url(); ?>logout/user_logout"> <?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?> | Sign Out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>

                        </admin-navbar>

                        <div class="row" style="margin-top:57px;">


                            <div class="col-sm-4 col-md-4 col-lg-2 sidebar">
                                <side-bar>


                                    <div class=" nav-sidebar">

                                        <i class="fa fa-bars fa-2x toggle-btn" data-target="#menu-content" data-toggle="collapse"></i>

                                        <div class="menu-list" style="margin-top:35px;">

                                            <ul class="menu-content collapse out" id="menu-content">

                                                <li tabindex="0"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a></li>


                                                <!----><li class="collapsed" data-target="#Order" data-toggle="collapse" id="liOrder">
                                                    <a><i class="fa fa-gift fa-lg"></i>Order</a><span class="arrow"></span>
                                                </li>
                                                <ul class="sub-menu collapse" id="Order">
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/order">New Order</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/order/states">Order States</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/order/payment_type">Payment Type</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/order/report">Report</a></li>
                                                    <!--<li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/import_order/excel_upload">Order Upload(Excel)</a></li>-->
                                                </ul>


                                                <!----><li class="collapsed" data-target="#Report" data-toggle="collapse" id="liReport"><a><i class="fa fa-users fa-lg"></i> Report <span class="arrow"></span></a></li>
                                                <ul class="sub-menu collapse" id="Report">
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/report/delivery_list">Delivery List</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/report/client_report">Client Report</a></li>

                                                </ul>

                                                <!----><li class="collapsed" data-target="#User" data-toggle="collapse" id="liUser"><a><i class="fa fa-users fa-lg"></i> Users <span class="arrow"></span></a></li>
                                                <ul class="sub-menu collapse" id="User">
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/user_list">User List</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/approval">Approval Waiting</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/deactivated_user">Deactivated User List</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/rider_list">All Rider</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/new_user">New User</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/user_type">User Type</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/area">Area</a></li>
                                                </ul>


                                                <li class="collapsed" data-target="#Profile" data-toggle="collapse" id="liProfile">
                                                    <a><i class="fa fa-user fa-lg"></i> Profile<span class="arrow"></span></a>                                
                                                </li>
                                                <ul class="sub-menu collapse" id="Profile">
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/admin_profile_edit">Profile Edit</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/change_passowrd">Change password</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/user/update_client_passowrd">Update Client Password</a></li>
                                                </ul>
                                                <li class="collapsed" data-target="#Web" data-toggle="collapse" id="liWeb">
                                                    <a><i class="fa fa-user fa-lg"></i>Website<span class="arrow"></span></a>                                
                                                </li>
                                                <ul class="sub-menu collapse <?php if (isset($menu) && $menu == 'web') {
    echo 'in';
} ?>" id="Web">
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/about">About Us</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/partner">Partner</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/testimonial">Testimonial</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/delivery_charge">Delivery Charge</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/delivery_charge/regular_price">Regular Price List</a></li>

                                                </ul>
                                                <li class="collapsed" data-target="#Inv" data-toggle="collapse" id="liWeb">
                                                    <a><i class="fa fa-user fa-lg"></i>Inventory.<span class="arrow"></span></a>                                
                                                </li>
                                                <ul class="sub-menu collapse <?php if (isset($menu) && $menu == 'inventory') {  echo 'in'; } ?>" id="Inv">

                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/inventory/category_all">Category</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/product/all">Product</a></li>
                                                    <li routerlinkactive="active" tabindex="0"><a href="<?php echo base_url(); ?>admin/barcodescan">QR/Bar Code Scaner</a></li>

                                                </ul>

                                            </ul>
                                        </div>
                                    </div>

                                </side-bar>
                            </div>
