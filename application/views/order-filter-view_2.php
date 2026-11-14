<!DOCTYPE html>
<html lang="en"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Handover Express</title>
        <style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style>
<style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style><style type="text/css">.gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}.gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}</style>
        <meta name="viewport" content="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sidebar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sidebar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datePicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/progress.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/filterable.css">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        
        <style>.hexp[_ngcontent-c0]{background:#3b7f6a;color:#fff;border-radius:0}.hexp-sm[_ngcontent-c0]{padding-top:5px;padding-bottom:5px}.hexp[_ngcontent-c0]   small[_ngcontent-c0]{color:#fff}.h1[_ngcontent-c0]   small[_ngcontent-c0]{font-size:20px}.h1[_ngcontent-c0]{margin:0;padding:10px;font-size:22px}.nav-side-menu[_ngcontent-c0]{display:none}body[_ngcontent-c0]{background-color:#f5f5f5}</style><style>.hexp[_ngcontent-c1]{background:#3b7f6a;color:#fff;border-radius:0}.hexp-sm[_ngcontent-c1]{padding-top:5px;padding-bottom:5px}.hexp[_ngcontent-c1]   small[_ngcontent-c1]{color:#fff}.h1[_ngcontent-c1]   small[_ngcontent-c1]{font-size:20px}.h1[_ngcontent-c1]{margin:0;padding:10px;font-size:22px}.nav-side-menu[_ngcontent-c1]{display:none}body[_ngcontent-c1]{background-color:#f5f5f5}</style><style>.hexp[_ngcontent-c2]{background:#3b7f6a;color:#fff;border-radius:0}.hexp-sm[_ngcontent-c2]{padding-top:5px;padding-bottom:5px}.hexp[_ngcontent-c2]   small[_ngcontent-c2]{color:#fff}.h1[_ngcontent-c2]   small[_ngcontent-c2]{font-size:20px}.h1[_ngcontent-c2]{margin:0;padding:10px;font-size:22px}.nav-side-menu[_ngcontent-c2]{display:none}body[_ngcontent-c2]{background-color:#f5f5f5}</style><style>.agm-map-container-inner[_ngcontent-c3] {
      width: inherit;
      height: inherit;
    }
    .agm-map-content[_ngcontent-c3] {
      display:none;
    }</style>
<!--                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/common.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/map.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/util.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/marker.js"></script>-->
        <style type="text/css">.gm-style {
        font: 400 11px Roboto, Arial, sans-serif;
        text-decoration: none;
      }
      .gm-style img { max-width: none; }</style>
<!--<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/onion.js"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/ViewportInfoService.GetViewportInfo"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/controls.js"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/vt"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/AuthenticationService.Authenticate">
</script><script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/stats.js">
</script><script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/QuotaService.RecordEvent"></script>-->


<!----------------------------start datatable------------------------------------------------------->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">var dataTableLengthValue = "10";</script>

        <style>
            tfoot input {
                width: 100%;
                padding: 3px;
                box-sizing: border-box;
            }
            tfoot {
                display: table-header-group;

            }
        </style>

        <script type="text/javascript">
            $(document).ready(function () {
//                $('#example').DataTable({
//                    //            "lengthMenu": [[10, 25, 50,100,250, -1], [10, 25, 50,100,250, "All"]],
//                    "lengthMenu": [[10, 50, 100, 250, -1], [10, 50, 100, 250, "All"]],
//                    "processing": true,
//                    "serverSide": true,
//                    "ajax": "home/ajax_data"
//                });

                $('#example').DataTable({
                    //"paging":   false,
                    //"ordering": false,
//			  "order": [[ 1, "asc" ]],
                    "order": [[1, "desc"]],
                    //"iDisplayLength": 99,
                    "iDisplayLength": dataTableLengthValue,
                    "lengthMenu": [[20, 50, 100, 250, -1], [20, 50, 100, 250, "All"]],
                    //"oSearch": {"bSmart": false, "bRegex": true },

                    "processing": true,
                    "serverSide": true,

                    "columnDefs": [
                        {className: "adc-column-class", "targets": [1]},
                        {className: "adc-column-class", "targets": [1]}
                    ],

                    "sDom": '<"top"lr>t<"bottom"p><"clear">',

                    "language" : {"processing": '<span class="text text-danger"><b>Loading...Please wait.</b></span>'},
//                    "language": {"processing": '<span class="text text-danger"><b>Loading...Please wait</b> <img src="<?php // echo base_url(); ?>resources/images/ajax-loader.gif" alt="Working..." /></span>'},

                    "ajax": 'dashboard/ajax_data'
                            //"ajax": basePath+'ajaxloadscripts/datatable_serverside_processing.php'						

                            //"info":     false						
                });



                // Setup - add a text input to each footer cell
                $('#example tfoot th').each(function () {
                    var title = $('#example thead th').eq($(this).index()).text();
//			  $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                    $(this).html('<input type="text" placeholder="" />');
                });

                // DataTable
                var table = $('#example').DataTable();

                // Apply the search
                table.columns().every(function () {
                    var column = this;
                    //$( 'input', this.footer() ).on( 'keyup change', function () {
                    $('input', this.footer()).on('keyup', function () {

                        //Clear if select input box is already checked
                        if ($('#selectall').is(':checked')) {
                            $('#selectall').prop('checked', false);
                        }

                        column
                                .search(this.value)
                                .draw();
                    });

                });


                //    --------------debug code-------------------------------    
                //        (function() {
                //    var url = 'https://debug.datatables.net/bookmarklet/DT_Debug.js';
                //    if (typeof DT_Debug != 'undefined') {
                //        if (DT_Debug.instance !== null) {
                //            DT_Debug.close();
                //        } else {
                //            new DT_Debug();
                //        }
                //    } else {
                //        var n = document.createElement('script');
                //        n.setAttribute('language', 'JavaScript');
                //        n.setAttribute('src', url + '?rand=' + new Date().getTime());
                //        document.body.appendChild(n);
                //    }
                //})();

            });


        </script>


    </head>
    <body>
        <div class="container-fluid"><div class="row"><div id="divProgressLine" class="progress"><div class="indeterminate"></div></div><app-root ng-version="4.4.6"><router-outlet></router-outlet><ng-component>
<client-navbar>
	<div class="main-navigation navbar-fixed-top">
		<nav class="navbar navbar-default">
			<div style="padding-right:10px;">	
				<div class="navbar-header">
					<button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>client/dashboard">Handover Express</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">					
					<ul class="nav navbar-nav navbar-right">						
						<li routerlinkactive="active" class="active"><!----><a href="<?php echo base_url(); ?>client/dashboard">Dashboard </a> </li>						
						
						 <li><!----></li> 
						<li><!----></li>
						 <li><!----><a style="text-decoration:none" href="<?php echo base_url(); ?>logout/user_logout"> <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?> | Sign Out</a></li> 
					</ul>
				</div>
			</div>
		</nav>
	</div>
    
    </client-navbar>
<div class="row" style="margin-top:30px;">




</div>
</ng-component></app-root></div></div>
        <br>
        <br>
        <br>
        <br>
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr style="background-color: #5ba3ae">
                    <th>Order ID</th>
                    <th>Track Number</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Customer Address</th>
                    <th>Delivery Area</th>
                    <th>Order Status</th>
                    <th>Delivery Time</th>
                    <th>Seller</th>
                </tr>
            </thead>
            <tfoot>
                <tr style="background-color: #5ba3ae">
                    <th>Order ID</th>
                    <th>Track Number</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Customer Address</th>
                    <th>Delivery Area</th>
                    <th>Order Status</th>
                    <th>Delivery Time</th>
                    <th>Seller</th>
                </tr>
            </tfoot>
        </table>
        
        
                        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/inline.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/polyfills.js"></script>
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>-->
        <!--<script type="text/javascript" src="assets/js/vendor.js"></script>-->

    </body>
</html>