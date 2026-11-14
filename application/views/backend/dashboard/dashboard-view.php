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
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/common.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/map.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/util.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/marker.js"></script>
        <style type="text/css">.gm-style {
        font: 400 11px Roboto, Arial, sans-serif;
        text-decoration: none;
      }
      .gm-style img { max-width: none; }</style>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/onion.js"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/ViewportInfoService.GetViewportInfo"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/controls.js"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/vt"></script>
<script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/AuthenticationService.Authenticate">
</script><script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/stats.js">
</script><script type="text/javascript" charset="UTF-8" src="<?php echo base_url(); ?>assets/js/QuotaService.RecordEvent"></script>

    </head>
    
    <body cz-shortcut-listen="true">
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
					<a class="navbar-brand" href="#/">Handover Express</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<!----><li style="margin-left:20px;">
							<div id="custom-search-input" style="border:1px solid #CCCCCC">
							<div class="input-group" style="width:260px;background-color:#EEEEEE;">
								<input class="form-control input-lg ng-untouched ng-pristine ng-valid" placeholder="Track number" style="height:22px;background-color:#EEEEEE" type="text">
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="button">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</div>
						</div>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">						
						<li routerlinkactive="active" class="active"><!----><a href="#/dashboard">Dashboard</a></li>
						<li><!----><a href="#"> moshahed | Sign Out</a></li>
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

                <li tabindex="0"><a><i class="fa fa-dashboard fa-lg"></i> Dashboard</a></li>

                
                <!----><li class="collapsed" data-target="#Order" data-toggle="collapse" id="liOrder">
                  <a><i class="fa fa-gift fa-lg"></i>Order</a><span class="arrow"></span>
                </li>
                <ul class="sub-menu collapse" id="Order">
                      <li routerlinkactive="active" tabindex="0"><a>New Order</a></li>
                      <li routerlinkactive="active" tabindex="0"><a>Order States</a></li>
                      <li routerlinkactive="active" tabindex="0"><a>Payment Type</a></li>
                      <li routerlinkactive="active" tabindex="0"><a>Report</a></li>
                </ul>

                
                <!----><li class="collapsed" data-target="#Report" data-toggle="collapse" id="liUser"><a><i class="fa fa-users fa-lg"></i> Report <span class="arrow"></span></a></li>
                <ul class="sub-menu collapse" id="Report">
                    <li routerlinkactive="active" tabindex="0"><a>Delivery List</a></li>
                    <li routerlinkactive="active" tabindex="0"><a>Delivery Man Job</a></li>
                    <li routerlinkactive="active" tabindex="0"><a>Pending Job Areas</a></li>
                </ul>


                
                <!----><li class="collapsed" data-target="#User" data-toggle="collapse" id="liUser"><a><i class="fa fa-users fa-lg"></i> Users <span class="arrow"></span></a></li>
                <ul class="sub-menu collapse" id="User">
                    <li routerlinkactive="active" tabindex="0"><a>User List</a></li>
                    <li routerlinkactive="active" tabindex="0"><a>New User</a></li>
                    <li routerlinkactive="active" tabindex="0"><a>User Type</a></li>
                    <li routerlinkactive="active" tabindex="0"><a>Area</a></li>
                </ul>

                
                <li class="collapsed" data-target="#Profile" data-toggle="collapse">
                    <a><i class="fa fa-user fa-lg"></i> Profile<span class="arrow"></span></a>                                
                </li>
                <ul class="sub-menu collapse" id="Profile">
                    <li routerlinkactive="active" tabindex="0"><a>Change password</a></li>
                </ul>

            </ul>
     </div>
</div>

</side-bar>
</div>


<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


        <router-outlet></router-outlet><ng-component _nghost-c5=""><ol _ngcontent-c5="" class="breadcrumb">
    <li _ngcontent-c5=""><span _ngcontent-c5="" class="glyphicon glyphicon-home"></span> </li>
    <li _ngcontent-c5="" class="active">Dashboard</li>
</ol>




<div _ngcontent-c5="" class="maincontent">


<!----><div _ngcontent-c5="" style="margin:auto; margin-bottom:30px;">

<div _ngcontent-c5="" class="page-header">
        <div _ngcontent-c5="" class="row">

            <div _ngcontent-c5="" class="col-md-4">
                <h3 _ngcontent-c5="">Todays Order Status</h3>
            </div>
    
            <div _ngcontent-c5="" class="col-md-8">
                <div _ngcontent-c5="" class="row">

                <a _ngcontent-c5="" class="btn btn-default" routerlink="/order/new" style="float:right;" href="#/order/new"> <span _ngcontent-c5="" class="glyphicon glyphicon-plus"></span> New order</a>

                <!----><div _ngcontent-c5="" style="margin:0px 5px; float:right;">

                    <div _ngcontent-c5="" class="[ form-group ]" style="margin-bottom:0px;">
                        <div _ngcontent-c5="" class="[ btn-group ]">
                            <label _ngcontent-c5="" class="[ btn btn-primary ]" for="fancy-checkbox-success" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%; border-color: rgb(105, 79, 147);">
                                <span _ngcontent-c5=""> 4&nbsp;</span>
                            </label>
                            <label _ngcontent-c5="" class="[ btn btn-default active ]" for="fancy-checkbox-success">
                                Accepted
                            </label>
                        </div>
                    
                    </div>    
                </div><div _ngcontent-c5="" style="margin:0px 5px; float:right;">

                    <div _ngcontent-c5="" class="[ form-group ]" style="margin-bottom:0px;">
                        <div _ngcontent-c5="" class="[ btn-group ]">
                            <label _ngcontent-c5="" class="[ btn btn-primary ]" for="fancy-checkbox-success" style="background: rgb(254, 0, 0) none repeat scroll 0% 0%; border-color: rgb(254, 0, 0);">
                                <span _ngcontent-c5=""> 3&nbsp;</span>
                            </label>
                            <label _ngcontent-c5="" class="[ btn btn-default active ]" for="fancy-checkbox-success">
                                Cancelled
                            </label>
                        </div>
                    
                    </div>    
                </div><div _ngcontent-c5="" style="margin:0px 5px; float:right;">

                    <div _ngcontent-c5="" class="[ form-group ]" style="margin-bottom:0px;">
                        <div _ngcontent-c5="" class="[ btn-group ]">
                            <label _ngcontent-c5="" class="[ btn btn-primary ]" for="fancy-checkbox-success" style="background: rgb(23, 160, 94) none repeat scroll 0% 0%; border-color: rgb(23, 160, 94);">
                                <span _ngcontent-c5=""> 50&nbsp;</span>
                            </label>
                            <label _ngcontent-c5="" class="[ btn btn-default active ]" for="fancy-checkbox-success">
                                Completed
                            </label>
                        </div>
                    
                    </div>    
                </div><div _ngcontent-c5="" style="margin:0px 5px; float:right;">

                    <div _ngcontent-c5="" class="[ form-group ]" style="margin-bottom:0px;">
                        <div _ngcontent-c5="" class="[ btn-group ]">
                            <label _ngcontent-c5="" class="[ btn btn-primary ]" for="fancy-checkbox-success" style="background: rgb(119, 119, 119) none repeat scroll 0% 0%; border-color: rgb(119, 119, 119);">
                                <span _ngcontent-c5=""> 5&nbsp;</span>
                            </label>
                            <label _ngcontent-c5="" class="[ btn btn-default active ]" for="fancy-checkbox-success">
                                Unassigned
                            </label>
                        </div>
                    
                    </div>    
                </div>


            </div>
        </div>

    </div>

</div>



    

<div _ngcontent-c5="" class="tabbable-panel">
<div _ngcontent-c5="" class="tabbable-line">

    <ul _ngcontent-c5="" class="nav nav-tabs ">
        <li _ngcontent-c5="" class="active">
            <a _ngcontent-c5="" data-toggle="tab" href="#tab_default_1">
            Pending 
            <span _ngcontent-c5="" class="badge">131</span>
        </a>
        </li>
        <li _ngcontent-c5="">
            <a _ngcontent-c5="" data-toggle="tab" href="#tab_default_2">
            New 
            <span _ngcontent-c5="" class="badge"></span>
        </a>
        </li>
        <li _ngcontent-c5="">
            <a _ngcontent-c5="" data-toggle="tab" href="#tab_default_3">
            Completed 
            <span _ngcontent-c5="" class="badge"></span>
            </a>
        </li>
        <li _ngcontent-c5="">
            <a _ngcontent-c5="" data-toggle="tab" href="#tabPaid">
            Paid 
            <span _ngcontent-c5="" class="badge"></span>
            </a>
        </li>
        <li _ngcontent-c5="">
            <a _ngcontent-c5="" data-toggle="tab" href="#tab_default_4">
            Cancelled 
            <span _ngcontent-c5="" class="badge"></span>
            </a>
        </li>
        <!----><li _ngcontent-c5="">
            <a _ngcontent-c5="" data-toggle="tab" href="#tab_default_5">
            Deleted 
            <span _ngcontent-c5="" class="badge"></span>
            </a>
        </li>
    </ul>
    
<div _ngcontent-c5="" class="tab-content">

    

<div _ngcontent-c5="" class="tab-pane active" id="tab_default_1">

<div _ngcontent-c5="" class="content table-responsive table-full-width">

    <table _ngcontent-c5="" class="table table-hover table-striped" style="margin-bottom:200px;">
        <thead _ngcontent-c5="">
            <tr _ngcontent-c5="">
            <th _ngcontent-c5="">#</th>
            <th _ngcontent-c5="">Track No.</th>
            <th _ngcontent-c5="">Status</th>
            <th _ngcontent-c5="">Pickup</th>
            <th _ngcontent-c5="">Seller</th>
            <th _ngcontent-c5="">Customer</th>
            <th _ngcontent-c5="">Delivery</th>
            <th _ngcontent-c5="">Created by</th>
            <th _ngcontent-c5="">Order Time</th>
            <th _ngcontent-c5="" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody _ngcontent-c5="">
            <!----><tr _ngcontent-c5="">
                <td _ngcontent-c5="">1</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/GU003619">GU003619</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(119, 119, 119) none repeat scroll 0% 0%;"> Unassigned</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 20:00:00">Sunday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RN TECH LTD<br _ngcontent-c5="">01789791708 <br _ngcontent-c5=""> Multiplan Center, show room-334, Level-3, New elephant road, Dhaka-1205, Elephant road</td>
                <td _ngcontent-c5="">Marjia<br _ngcontent-c5="">01777817222 <br _ngcontent-c5=""> H:4, Bir Uttam Mir Sawkot sarak, Gulshan-1Dhaka</td>
                <td _ngcontent-c5="">
                    Gulshan-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 20:30:00">Sunday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">RN TECH</td>
                <td _ngcontent-c5="">7:33:38 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3619">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">2</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PA003618">PA003618</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(119, 119, 119) none repeat scroll 0% 0%;"> Unassigned</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 20:00:00">Sunday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Shopper Exceed<br _ngcontent-c5="">01751589101 <br _ngcontent-c5=""> Kawran Bazar BTMC Bhavan 1st floor, Panthapath</td>
                <td _ngcontent-c5="">Fabiya<br _ngcontent-c5="">01794047682 <br _ngcontent-c5=""> Kathal Bagan Bazar Mosjid er pichone goli, House-202, Nila Nir 5th floor, dhaka</td>
                <td _ngcontent-c5="">
                    Panthapath<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 20:30:00">Sunday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">Shopper</td>
                <td _ngcontent-c5="">7:25:33 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3618">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">3</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003617">WH003617</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(119, 119, 119) none repeat scroll 0% 0%;"> Unassigned</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 20:00:00">Sunday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Yasin<br _ngcontent-c5="">01767590319 <br _ngcontent-c5=""> Khulna Sonadanga Khulna</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 20:30:00">Sunday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">RED SHOP</td>
                <td _ngcontent-c5="">7:11:37 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3617">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">4</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/CA003616">CA003616</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(119, 119, 119) none repeat scroll 0% 0%;"> Unassigned</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 19:00:00">Sunday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">propel bd.com<br _ngcontent-c5="">01973450777 <br _ngcontent-c5=""> Nahar Plaza 7th Floor, Office #803, 37, Bir Uttam CR-Datto Road, Hatirpool, Dhaka, Elephant road</td>
                <td _ngcontent-c5="">Mukta<br _ngcontent-c5="">01760420228 <br _ngcontent-c5=""> Manikdi, Nama Para, 3 rastar Mor,H: 247</td>
                <td _ngcontent-c5="">
                    Cantonment<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 19:30:00">Sunday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">propel</td>
                <td _ngcontent-c5="">7:07:41 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3616">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">5</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003615">PU003615</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(119, 119, 119) none repeat scroll 0% 0%;"> Unassigned</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            New Market <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 18:00:00">Sunday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">LZebra.com<br _ngcontent-c5="">01847301131 <br _ngcontent-c5=""> Space: 151 - 153 2nd floor, new market city complex., New Market</td>
                <td _ngcontent-c5="">Mr. Arif<br _ngcontent-c5="">01760411342 <br _ngcontent-c5=""> Loharpul, Puran Dhaka</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-02 17:00:00">Monday 05:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">Aladen.com.</td>
                <td _ngcontent-c5="">5:41:10 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3615">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">6</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/TE003613">TE003613</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 08:00:00">Sunday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">propel bd.com<br _ngcontent-c5="">01973450777 <br _ngcontent-c5=""> Nahar Plaza 7th Floor, Office #803, 37, Bir Uttam CR-Datto Road, Hatirpool, Dhaka, Elephant road</td>
                <td _ngcontent-c5="">Jainal<br _ngcontent-c5="">01712898214 <br _ngcontent-c5=""> 166, West Arjolpara, Beside Shantinagar Central Mosjid Tejgaon Dhaka</td>
                <td _ngcontent-c5="">
                    Tejgaon<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 12:30:00">Sunday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">propel</td>
                <td _ngcontent-c5="">7:13:17 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3613">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">7</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/SH003611">SH003611</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Jurain <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 11:00:00">Sunday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Nakbar Hossain)<br _ngcontent-c5="">01762319016 <br _ngcontent-c5=""> Shop#67, Level-3, Bikrampur Plaza, Jurain, Dhaka</td>
                <td _ngcontent-c5="">Mehtab<br _ngcontent-c5="">01710902566 <br _ngcontent-c5=""> Twin tower concord,27 chamelibagh,shantinagar,Dhaka-1217....123212</td>
                <td _ngcontent-c5="">
                    Shantinagar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 11:30:00">Sunday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">7:01:18 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3611">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">8</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003610">PU003610</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Motijheel <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-04-01 11:00:00">Sunday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Gadget &amp; Gizmos)<br _ngcontent-c5="">01992707678 <br _ngcontent-c5=""> Shop #2/133, Gulistan Shopping Complex (Hall Market) 2nd Floor, Gulistan, Dhaka</td>
                <td _ngcontent-c5="">Abdur rashid khan solaman<br _ngcontent-c5="">01715546884 <br _ngcontent-c5=""> 24/1 Abul khairat road (tara mosjid), Armanitola.Dhaka- 1100......123224</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-04-01 11:30:00">Sunday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">7:04:35 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3610">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">9</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003607">UT003607</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-31 16:00:00">Saturday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">High Power Link BD<br _ngcontent-c5="">01911568620 <br _ngcontent-c5=""> HP Link, 112, Motalib Plaza(1st Floor) Sonargoan Road, Hatirpool, Dhaka-1205, Elephant road</td>
                <td _ngcontent-c5="">ismail<br _ngcontent-c5="">01980468918 <br _ngcontent-c5=""> H: 27 , R : 8 , sector-3 , uttara
Dhaka</td>
                <td _ngcontent-c5="">
                    Uttara - Sector-3<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 16:30:00">Saturday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Apr 1, 2018">High Power</td>
                <td _ngcontent-c5="">7:06:54 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3607">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">10</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003606">WH003606</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-31 14:00:00">Saturday 02:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Arifur Rahman<br _ngcontent-c5="">01712741348 <br _ngcontent-c5=""> Asuliya Baipal</td>
                <td _ngcontent-c5="">
                    Whole Nation SA Paribahan<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 14:30:00">Saturday 02:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 31, 2018">RED SHOP</td>
                <td _ngcontent-c5="">1:42:04 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3606">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">11</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/FA003600">FA003600</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 21:00:00">Thursday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">BD Online Shopping House<br _ngcontent-c5="">01919475752 <br _ngcontent-c5=""> Chowkbazar, Dhaka- 1211, Chowk bazar</td>
                <td _ngcontent-c5="">Dolon<br _ngcontent-c5="">01684005154 <br _ngcontent-c5=""> Tejkuri Bazar, Morning Glory School,
Farmgate, Dhaka</td>
                <td _ngcontent-c5="">
                    Farmgate<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-30 10:00:00">Friday 10:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 30, 2018">BD Online</td>
                <td _ngcontent-c5="">7:47:51 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3600">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">12</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003599">PU003599</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Motijheel <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 18:00:00">Thursday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Gadget &amp; Gizmos)<br _ngcontent-c5="">01992707678 <br _ngcontent-c5=""> Shop #2/133, Gulistan Shopping Complex (Hall Market) 2nd Floor, Gulistan, Dhaka</td>
                <td _ngcontent-c5="">Tanvir<br _ngcontent-c5="">01631959234 <br _ngcontent-c5=""> 23/1 nazimuddin road, Chankharpul, Dhaka.122795</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 18:30:00">Thursday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:11:43 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3599">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">13</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO003597">MO003597</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-1 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 18:00:00">Thursday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited9One Click)<br _ngcontent-c5="">01886666070 <br _ngcontent-c5=""> 163,Senpara Parbata,Mirpur10Dhaka, Bangladesh 1216</td>
                <td _ngcontent-c5="">Rakib<br _ngcontent-c5="">01917549853 <br _ngcontent-c5=""> Ga- 3/2, Mohakhali , Mohakhali Kacha Bazar Area122693</td>
                <td _ngcontent-c5="">
                    Mohakhali<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 18:30:00">Thursday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:13:03 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3597">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">14</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/TE003596">TE003596</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 17:00:00">Thursday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Customer<br _ngcontent-c5="">01635139559 <br _ngcontent-c5=""> Nabisko purba Nakhalpara Bhumiya Pharmes more</td>
                <td _ngcontent-c5="">
                    Tejgaon<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 17:30:00">Thursday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">RED SHOP</td>
                <td _ngcontent-c5="">1:13:40 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3596">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">15</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/VA003594">VA003594</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Jurain <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 16:00:00">Thursday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Nakbar Hossain)<br _ngcontent-c5="">01762319016 <br _ngcontent-c5=""> Shop#67, Level-3, Bikrampur Plaza, Jurain, Dhaka</td>
                <td _ngcontent-c5="">monjurul islam khan<br _ngcontent-c5="">01936024441 <br _ngcontent-c5=""> 1097,khilbarirtek road,shahjadpur,vatara thana ,dhaka-1212   122725</td>
                <td _ngcontent-c5="">
                    Vatara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 16:30:00">Thursday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:15:06 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3594">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">16</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/DE003593">DE003593</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 16:00:00">Thursday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited (Green Tech)<br _ngcontent-c5="">01616254249 <br _ngcontent-c5=""> 01926254249 ECS Computer City, Multiplan Center, Level#8, Shop#859, New Elephant Road, dhaka-1205</td>
                <td _ngcontent-c5="">MD. Mijanur Rahman Jony<br _ngcontent-c5="">01711346931 <br _ngcontent-c5=""> Stuff quarter, Demra. Dhaka110977</td>
                <td _ngcontent-c5="">
                    Demra<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 16:30:00">Thursday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:15:51 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3593">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">17</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003592">PU003592</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 16:00:00">Thursday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Arif Iqbal<br _ngcontent-c5="">01721373233 <br _ngcontent-c5=""> Tasnim Tours &amp; Travels (7th floor), 45 topkhana road, purana paltan.122678</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 16:30:00">Thursday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:16:44 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3592">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">18</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003590">BA003590</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 16:00:00">Thursday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Ruksana alam<br _ngcontent-c5="">01712653006 <br _ngcontent-c5=""> Madrassa road.House no 179, Mijan mansion, Mugda, Munda,  122744</td>
                <td _ngcontent-c5="">
                    Bashabo<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 16:30:00">Thursday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:18:25 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3590">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">19</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PA003584">PA003584</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 13:00:00">Thursday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Shopper Exceed<br _ngcontent-c5="">01751589101 <br _ngcontent-c5=""> Kawran Bazar BTMC Bhavan 1st floor, Panthapath</td>
                <td _ngcontent-c5="">Apon<br _ngcontent-c5="">01776699751 <br _ngcontent-c5=""> Pantha path signal Green Dhaka</td>
                <td _ngcontent-c5="">
                    Panthapath<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-29 13:30:00">Thursday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Shopper</td>
                <td _ngcontent-c5="">8:54:46 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3584">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">20</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KH003573">KH003573</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Baridhara <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-28 19:00:00">Wednesday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,fotocart<br _ngcontent-c5="">01844018407 <br _ngcontent-c5=""> 531/2(2nd Floor ), Road: 11, Baridhara DOHS, Dhaka</td>
                <td _ngcontent-c5="">Tonmoy<br _ngcontent-c5="">01771204780 <br _ngcontent-c5=""> khilkhet, Dorji bari, tatultola, ka-215/1, Dhaka.122225</td>
                <td _ngcontent-c5="">
                    Khilkhet<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 19:30:00">Wednesday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:42:16 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3573">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">21</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MA003570">MA003570</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 11:30:00">Thursday 11:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Danish malik<br _ngcontent-c5="">01845862729 <br _ngcontent-c5=""> New Eskarton road,house 11, moghbazar, dhaka....122418</td>
                <td _ngcontent-c5="">
                    Magh Bazar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 08:30:00">Saturday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:43:40 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3570">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">22</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003567">UT003567</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mohammadpur <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-28 18:00:00">Wednesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,Babar Dokan<br _ngcontent-c5="">01716318026 <br _ngcontent-c5=""> 01945210836,House: 6, Road: 1, Latif Real State, Bosila Road, West Katasur, Mohammadpur, Dhaka</td>
                <td _ngcontent-c5="">Mohammad Salsabil Ibne Shamim<br _ngcontent-c5="">01670074328 <br _ngcontent-c5=""> House- 66 (2nd floor), Road- 13, Sector- 13,, Uttara, Dhaka- 1230,122604</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:45:34 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3567">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">23</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/LA003566">LA003566</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 08:00:00">Thursday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Md.Hedayatul Islam<br _ngcontent-c5="">01966535856 <br _ngcontent-c5=""> Lalbag chowrasta, Khaje Dewan, 2 no. lane. Dhaka, Lalbagh...122012</td>
                <td _ngcontent-c5="">
                    Lalbagh<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 08:45:00">Saturday 08:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:46:09 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3566">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">24</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/JA003565">JA003565</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 08:00:00">Thursday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Md. Bellal Hossain / Shanto<br _ngcontent-c5="">01709639740 <br _ngcontent-c5=""> Dhonia bazar 589,...122029</td>
                <td _ngcontent-c5="">
                    Jatrabari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 08:45:00">Saturday 08:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:46:56 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3565">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">25</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003564">UT003564</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Motijheel <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-28 18:00:00">Wednesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,Gadget &amp; Gizmos<br _ngcontent-c5="">01992707678 <br _ngcontent-c5=""> Shop #2/133, Gulistan Shopping Complex (Hall Market) 2nd Floor, Gulistan, Dhaka</td>
                <td _ngcontent-c5="">Mr. Azhar<br _ngcontent-c5="">01819239425 <br _ngcontent-c5=""> House 6, Road 14C, Sector 4. Uttara. Dhaks,122554</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:47:26 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3564">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">26</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WA003559">WA003559</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 09:00:00">Thursday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Sarker Ramiz<br _ngcontent-c5="">01798410340 <br _ngcontent-c5=""> House 20/C Tipusultan Road Wari Dhaka..121822</td>
                <td _ngcontent-c5="">
                    Wari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 12:00:00">Saturday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:50:12 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3559">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">27</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/JA003558">JA003558</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-29 09:30:00">Thursday 09:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">MH Tutul<br _ngcontent-c5="">01708124685 <br _ngcontent-c5=""> Rumel Electronics, Under Pubali Bank, Dholaipar, Jatrabari, Dhaka...121975</td>
                <td _ngcontent-c5="">
                    Jatrabari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-31 11:00:00">Saturday 11:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">3:50:40 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3558">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">28</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003557">WH003557</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-28 09:30:00">Wednesday 09:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Palash<br _ngcontent-c5="">01794971216 <br _ngcontent-c5=""> Lalmonirhat,BDR hat khola.</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 08:30:00">Wednesday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">RED SHOP</td>
                <td _ngcontent-c5="">12:29:37 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3557">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">29</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/EL003555">EL003555</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-28 12:00:00">Wednesday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Shonglap<br _ngcontent-c5="">01999659099 <br _ngcontent-c5=""> Bata Singnal .elephant road</td>
                <td _ngcontent-c5="">
                    Elephant road<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 11:00:00">Wednesday 11:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">RED SHOP</td>
                <td _ngcontent-c5="">12:35:49 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3555">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">30</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003554">WH003554</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-28 08:45:00">Wednesday 08:45</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Arif Uddin<br _ngcontent-c5="">01819103138 <br _ngcontent-c5=""> mirshorai,Chittagong</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 08:45:00">Wednesday 08:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">RED SHOP</td>
                <td _ngcontent-c5="">12:37:55 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3554">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">31</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/SH003542">SH003542</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 22:00:00">Tuesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Md. Rafiquel Islam<br _ngcontent-c5="">01970513171 <br _ngcontent-c5=""> Dhaka Match, IGLOO ice cream factory, Shampur, Dhaka...122370</td>
                <td _ngcontent-c5="">
                    Shyampur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 22:30:00">Wednesday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:49:34 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3542">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">32</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/JA003538">JA003538</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 12:00:00">Tuesday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">propel bd.com<br _ngcontent-c5="">01973450777 <br _ngcontent-c5=""> Nahar Plaza 7th Floor, Office #803, 37, Bir Uttam CR-Datto Road, Hatirpool, Dhaka, Elephant road</td>
                <td _ngcontent-c5="">MD Nasim<br _ngcontent-c5="">01818404521 <br _ngcontent-c5=""> Jatrabari Fly Over Er niche Giye call dite hobe.
4pm hote 5pm er modhei dite hobe</td>
                <td _ngcontent-c5="">
                    Jatrabari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 12:30:00">Tuesday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">propel</td>
                <td _ngcontent-c5="">6:16:48 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3538">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">33</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003534">PU003534</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Motijheel <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 21:00:00">Tuesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,Gadget &amp; Gizmos<br _ngcontent-c5="">01992707678 <br _ngcontent-c5=""> Shop #2/133, Gulistan Shopping Complex (Hall Market) 2nd Floor, Gulistan, Dhaka</td>
                <td _ngcontent-c5="">Md Shahidul Shahidul<br _ngcontent-c5="">01712913052 <br _ngcontent-c5=""> Jagannath University Gate, Sadarghat,122219</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 21:30:00">Tuesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:22:40 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3534">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">34</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003533">PU003533</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Puran Dhaka <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 21:00:00">Tuesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,E-store<br _ngcontent-c5="">01844173288, <br _ngcontent-c5=""> Rothkhola Mor, Tipu sultan road, dhaka- 1100</td>
                <td _ngcontent-c5="">Md Shahidul Shahidul<br _ngcontent-c5="">01712913052 <br _ngcontent-c5=""> Jagannath University Gate, Sadarghat,122220</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 21:30:00">Tuesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:23:11 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3533">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">35</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003530">MI003530</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            kalabagan <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 21:00:00">Tuesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited, care vision<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus, Kalabagan, Dhaka (from Square Hospital beside the Walton Showroom in the west</td>
                <td _ngcontent-c5="">Aktaruzzaman<br _ngcontent-c5="">01819990411 <br _ngcontent-c5=""> 257/1-B, Ahmmed Nagar, Mirpur-1, Dhaka,121938</td>
                <td _ngcontent-c5="">
                    Mirpur-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 21:30:00">Tuesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:24:46 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3530">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">36</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KA003528">KA003528</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            kalabagan <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 21:00:00">Tuesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited, care vision<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus, Kalabagan, Dhaka (from Square Hospital beside the Walton Showroom in the west</td>
                <td _ngcontent-c5="">firoz<br _ngcontent-c5="">01796101010 <br _ngcontent-c5=""> 15/16 New jurain, Haji habibullah market (2nd floor), kadamtoli, postogola. dhaka.121989</td>
                <td _ngcontent-c5="">
                    Kadamtali<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 21:30:00">Tuesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:26:01 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3528">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">37</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/GU003525">GU003525</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 20:00:00">Tuesday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,Master kitchen<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar.</td>
                <td _ngcontent-c5="">Nurul Amin<br _ngcontent-c5="">01911310292 <br _ngcontent-c5=""> ka, 71/2, Shahjadpur, gulshan, Dhaka -1212 (near vola masjid)121947</td>
                <td _ngcontent-c5="">
                    Gulshan-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 20:30:00">Tuesday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 29, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">7:08:11 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3525">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">38</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003518">MI003518</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 20:00:00">Tuesday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited,Master kitchen<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar</td>
                <td _ngcontent-c5="">Md. Alimuzzaman<br _ngcontent-c5="">01671503005 <br _ngcontent-c5=""> 83/A, Ahmednagar,mirpur-1, Dhaka.(122330)</td>
                <td _ngcontent-c5="">
                    Mirpur-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 20:30:00">Tuesday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:31:20 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3518">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">39</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KH003516">KH003516</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 20:00:00">Tuesday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited, Master kitchen<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar.</td>
                <td _ngcontent-c5="">M Abdus Salam<br _ngcontent-c5="">01618178888 <br _ngcontent-c5=""> 105/A,Tilpapara,Khilgaon, 2nd floor, Road 16, Dhaka 1219 (122369)</td>
                <td _ngcontent-c5="">
                    Khilgaon<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-27 20:30:00">Tuesday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:33:33 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3516">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">40</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MA003506">MA003506</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(51, 122, 183) none repeat scroll 0% 0%;"> Started</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 19:00:00">Tuesday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Shiblee<br _ngcontent-c5="">01713209099 <br _ngcontent-c5=""> 43 Shantibag, Malibag, DHAKA...121713</td>
                <td _ngcontent-c5="">
                    Malibagh<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 19:30:00">Wednesday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 31, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">7:02:21 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3506">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">41</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KH003503">KH003503</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 19:00:00">Tuesday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Shahdat<br _ngcontent-c5="">01735673238 <br _ngcontent-c5=""> nodda, haris road, House ka 28/A, Dhaka....121699</td>
                <td _ngcontent-c5="">
                    Khilkhet<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 19:30:00">Wednesday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:29:43 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3503">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">42</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003502">UT003502</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 19:00:00">Tuesday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Sonet<br _ngcontent-c5="">01982946875 <br _ngcontent-c5=""> Mazar road,Vhai Vhai market, H#403, Dokkhon khan. Uttara, DHAKA...120766</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 19:30:00">Wednesday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:30:36 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3502">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">43</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/JA003499">JA003499</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 19:00:00">Tuesday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Sikder<br _ngcontent-c5="">01916240390 <br _ngcontent-c5=""> 110 Narinda Dholikhal. AR cutting center, gandaria dhaka.......120610</td>
                <td _ngcontent-c5="">
                    Jatrabari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 19:30:00">Wednesday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:32:31 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3499">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">44</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003498">MI003498</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 18:00:00">Tuesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Syed Reza<br _ngcontent-c5="">01712347389 <br _ngcontent-c5=""> 347 /c ahmmed nagar ,mirpur 1, Dhaka..121425</td>
                <td _ngcontent-c5="">
                    Mirpur-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:33:29 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3498">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">45</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003496">MI003496</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-10 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 18:00:00">Tuesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Nusrat Dot Com)<br _ngcontent-c5="">01778558064, <br _ngcontent-c5=""> Shop # 28 (5th Floor), Shah Ali Plaza Mirpur - 10, Dhaka -1216</td>
                <td _ngcontent-c5="">Jahangir Alam<br _ngcontent-c5="">01717979515 <br _ngcontent-c5=""> House-1096,Road -6D,Avenue -8Mirpur DOHS, Dhaka...121842</td>
                <td _ngcontent-c5="">
                    Mirpur-12<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:38:05 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3496">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">46</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/GU003494">GU003494</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-2 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 18:00:00">Tuesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Potapot)<br _ngcontent-c5="">01730717576 <br _ngcontent-c5=""> Block-A, Road-3, House-03, Mirpur-2</td>
                <td _ngcontent-c5="">Aqil<br _ngcontent-c5="">01717110088 <br _ngcontent-c5=""> Flat-3, 84/3 Shahjadpur, Gulshan, Dhaka-1212.........121628</td>
                <td _ngcontent-c5="">
                    Gulshan-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:40:19 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3494">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">47</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003493">MI003493</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-25 18:00:00">Sunday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Master Kitchen)<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar.</td>
                <td _ngcontent-c5="">Hossain<br _ngcontent-c5="">01711349965 <br _ngcontent-c5=""> Mirpur Section-12, Block-D, Road-7, House-15.121811</td>
                <td _ngcontent-c5="">
                    Mirpur-12<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-25 18:30:00">Sunday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:15:25 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3493">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">48</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KO003491">KO003491</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 18:00:00">Tuesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(care vision)<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus Road, Kalabagan, Dhaka. (Beside of Squre Hospital and Walton Showroom</td>
                <td _ngcontent-c5="">Rajan Ghosh<br _ngcontent-c5="">01712818053 <br _ngcontent-c5=""> 19/A Tati bazar, kotwali. Dhaka.121787</td>
                <td _ngcontent-c5="">
                    Kotwali<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:16:18 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3491">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">49</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO003489">MO003489</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 18:00:00">Tuesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(care vision)<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus Road, Kalabagan, Dhaka. (Beside of Squre Hospital and Walton Showroom)</td>
                <td _ngcontent-c5="">Zahir Rana<br _ngcontent-c5="">01829100110 <br _ngcontent-c5=""> Biwta 141/143 motijheel, dhaka..121809</td>
                <td _ngcontent-c5="">
                    Motijheel<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 28, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:54:05 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3489">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">50</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003488">MI003488</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Darussalam <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-27 18:00:00">Tuesday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Master kitchen)<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar</td>
                <td _ngcontent-c5="">Hossain<br _ngcontent-c5="">01711349965 <br _ngcontent-c5=""> Mirpur Section-12, Block-D, Road-7, House-15.121811</td>
                <td _ngcontent-c5="">
                    Mirpur-12<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-28 18:30:00">Wednesday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 25, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:15:56 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3488">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">51</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/LA003487">LA003487</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-25 15:00:00">Sunday 03:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Customer<br _ngcontent-c5="">+8801638800264 <br _ngcontent-c5=""> Lalmatia d block house no 5/2 flat D</td>
                <td _ngcontent-c5="">
                    Lalmatia<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-25 15:30:00">Sunday 03:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 27, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:35:32 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3487">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">52</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/ZI003474">ZI003474</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-24 23:00:00">Saturday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">BD Online Shopping House<br _ngcontent-c5="">01919475752 <br _ngcontent-c5=""> Chowkbazar, Dhaka- 1211, Chowk bazar</td>
                <td _ngcontent-c5="">Urmee Rahman<br _ngcontent-c5="">01705685880 <br _ngcontent-c5=""> 85/B, Nijhum Abashik Alaka,
Zigatola, Dhaka</td>
                <td _ngcontent-c5="">
                    Zigatala<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-25 10:00:00">Sunday 10:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 25, 2018">BD Online</td>
                <td _ngcontent-c5="">6:48:17 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3474">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">53</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/TE003456">TE003456</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-24 18:00:00">Saturday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">S. M. NASIR UDDIN<br _ngcontent-c5="">01746113959 <br _ngcontent-c5=""> BUILDING # 2, FLAT# 19, ALENBARI OFFICER'S QUARTER, TEJGAON, DHAKA-1215-.121375</td>
                <td _ngcontent-c5="">
                    Tejgaon<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-25 18:30:00">Sunday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:11:35 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3456">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">54</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003454">BA003454</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-10 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-25 18:00:00">Sunday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited-Nusrat Dot Com<br _ngcontent-c5="">01778558064, <br _ngcontent-c5=""> Shop # 6/KA (6th Floor), Shah Ali Plaza Mirpur - 10, Dhaka -1216</td>
                <td _ngcontent-c5="">Pankaj Bhoumik<br _ngcontent-c5="">01520103701 <br _ngcontent-c5=""> 123 (6th Floor), Middle Bashabo, Sabujbagh, Dhaka-121583</td>
                <td _ngcontent-c5="">
                    Bashabo<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-10-12 18:30:00">Friday 06:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">1:04:43 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3454">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">55</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO003450">MO003450</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-25 17:00:00">Sunday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited...care vision<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus Road, Kalabagan, Dhaka. (Beside of Squre Hospital and Walton Showroom)</td>
                <td _ngcontent-c5="">Fazlur Rahman<br _ngcontent-c5="">01937992067 <br _ngcontent-c5=""> 66/1, katasur, mohammadpur, dhaka...120860</td>
                <td _ngcontent-c5="">
                    Mohammadpur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-10-12 17:30:00">Friday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">12:49:27 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3450">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">56</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003445">UT003445</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-10 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-25 17:00:00">Sunday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(One Click)<br _ngcontent-c5="">01886666070 <br _ngcontent-c5=""> 163,Senpara Parbata,Mirpur10Dhaka, Bangladesh 1216</td>
                <td _ngcontent-c5="">md masum<br _ngcontent-c5="">01748244451 <br _ngcontent-c5=""> Sector-12,house-12,road-08,uttara, dhaka...121599</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 17:30:00">Saturday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">12:56:47 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3445">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">57</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WA003444">WA003444</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-25 17:00:00">Sunday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Top Bangla)<br _ngcontent-c5="">01977242414 <br _ngcontent-c5=""> 62/E/5, New Easkaton Road, Bangla Motor.</td>
                <td _ngcontent-c5="">Ail Akbar<br _ngcontent-c5="">01814960589 <br _ngcontent-c5=""> Wari 01 no hair street wari tower, dhaka..120182</td>
                <td _ngcontent-c5="">
                    Wari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-26 17:30:00">Monday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">12:53:39 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3444">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">58</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003441">BA003441</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-24 16:00:00">Saturday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Manirul Haque Powel<br _ngcontent-c5="">01841399999 <br _ngcontent-c5=""> Manirul Powel, Hotel Bon Vivant, House # 8/.A, Road # 13, Baridhara North, Kalachandpur Main Road, Dhaka-1212,</td>
                <td _ngcontent-c5="">
                    Baridhara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 16:30:00">Saturday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">RED SHOP</td>
                <td _ngcontent-c5="">1:03:56 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3441">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">59</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/CH003440">CH003440</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-24 13:00:00">Saturday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Master kitchen<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar.</td>
                <td _ngcontent-c5="">
                    Chowk bazar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 13:30:00">Saturday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">8:39:34 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3440">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">60</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/CH003439">CH003439</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Banani <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-24 13:00:00">Saturday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01847197412 <br _ngcontent-c5=""> Bikoy.com Limited
5th Floor, Plot 6, Block C, Kamal Ataturk Avenue, Banani., Banani</td>
                <td _ngcontent-c5="">Master kitchen<br _ngcontent-c5="">01842713234 <br _ngcontent-c5=""> Mk tower, 2nd floor, opposite bismillah tower, Shop#01, Emamgonj, Chawkbazar.</td>
                <td _ngcontent-c5="">
                    Chowk bazar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 13:30:00">Saturday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">8:41:25 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3439">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">61</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO003434">MO003434</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-24 12:00:00">Saturday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">nahid hasan<br _ngcontent-c5="">01785342003 <br _ngcontent-c5=""> 5/22 solimullaha road, mohammadpur</td>
                <td _ngcontent-c5="">
                    Mohammadpur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 13:45:00">Saturday 01:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">9:27:38 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3434">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">62</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003429">MI003429</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-23 19:00:00">Friday 07:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Prince<br _ngcontent-c5="">01671953911 <br _ngcontent-c5=""> Mirpur-11, Block-B Line-3, House-10, 4Tala Fornt side</td>
                <td _ngcontent-c5="">
                    Mirpur-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-23 19:30:00">Friday 07:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 24, 2018">RED SHOP</td>
                <td _ngcontent-c5="">7:21:13 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3429">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">63</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003419">UT003419</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-23 09:00:00">Friday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(Motion View)<br _ngcontent-c5="">01715785881 <br _ngcontent-c5=""> 10/20B ,9th Floor, Eastern Plaza, Hatir Pul, Dhaka</td>
                <td _ngcontent-c5="">sagor<br _ngcontent-c5="">01780272900 <br _ngcontent-c5=""> dakhhinkhan bazar, LK Plaza, uttara, dhaka1230.....121181</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 09:30:00">Saturday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 23, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:20:32 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3419">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">64</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO003416">MO003416</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-23 09:00:00">Friday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited_electroneeds<br _ngcontent-c5="">01711874535 <br _ngcontent-c5=""> R.B Tower,1st Floor 56/9 West Panthapath Dhaka -1207</td>
                <td _ngcontent-c5="">Asif mahmood ovi<br _ngcontent-c5="">01919402268 <br _ngcontent-c5=""> BDnew24, 17, Mohakhali C/A, Red cresent concord tower, floor 17, Dhaka.121235</td>
                <td _ngcontent-c5="">
                    Mohakhali<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-24 08:00:00">Saturday 08:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 23, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:21:42 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3416">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">65</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/DH003408">DH003408</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-1 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-21 22:00:00">Wednesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(One Click)<br _ngcontent-c5="">01886666070 <br _ngcontent-c5=""> 163,Senpara Parbata,Mirpur10Dhaka, Bangladesh 1216</td>
                <td _ngcontent-c5="">Hridoy<br _ngcontent-c5="">01722205111 <br _ngcontent-c5=""> 102/3, Opposite of Rayerbazar High School, Dhanmondi 15..120687</td>
                <td _ngcontent-c5="">
                    Dhanmondi<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-22 22:30:00">Thursday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">8:43:29 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3408">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">66</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003404">MI003404</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-22 08:00:00">Thursday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Customer<br _ngcontent-c5="">01885938362 <br _ngcontent-c5=""> Mirpur-12, Block-c Pollobi Thana Road-09, House-08, Dhaka</td>
                <td _ngcontent-c5="">
                    Mirpur-11<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-22 12:45:00">Thursday 12:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:24:42 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3404">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">67</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/AI003403">AI003403</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-21 12:00:00">Wednesday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">JAHID HASAN<br _ngcontent-c5="">01515206668 <br _ngcontent-c5=""> HOUSE H 5/25 CIVIL AVIATION STAFF QUATTER,KAWLA-AIRPORT</td>
                <td _ngcontent-c5="">
                    Airport<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-21 12:30:00">Wednesday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:25:54 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3403">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">68</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003401">UT003401</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-10 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-22 08:30:00">Thursday 08:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(One Click)<br _ngcontent-c5="">01886666070 <br _ngcontent-c5=""> 163,Senpara Parbata,Mirpur10Dhaka, Bangladesh 1216</td>
                <td _ngcontent-c5="">didarul islam<br _ngcontent-c5="">01978500470 <br _ngcontent-c5=""> uttara 6 alawol avenew,opposit of uttara publik collage, dhaka..120870</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-23 10:00:00">Friday 10:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:28:34 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3401">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">69</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003400">PU003400</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-10 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-22 10:00:00">Thursday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(One Click)<br _ngcontent-c5="">01886666070 <br _ngcontent-c5=""> 163,Senpara Parbata,Mirpur10Dhaka, Bangladesh 1216</td>
                <td _ngcontent-c5="">abdur razzak<br _ngcontent-c5="">01913287111 <br _ngcontent-c5=""> 43, nazira bazar len .bangladuar, dhaka-1100..120808</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-23 11:30:00">Friday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:29:53 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3400">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">70</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003399">UT003399</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-22 09:30:00">Thursday 09:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited(MI Telecom)<br _ngcontent-c5="">01978980895 <br _ngcontent-c5=""> Shop-121,( Ground Floor) Motaleb Plaza , Hatirpool , Dhaka-1205</td>
                <td _ngcontent-c5="">Raju<br _ngcontent-c5="">01676235507 <br _ngcontent-c5=""> Uttara, in front uttarkhan thana, Dhaka.121050</td>
                <td _ngcontent-c5="">
                    Uttar Khan<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-23 08:30:00">Friday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:30:40 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3399">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">71</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO003389">MO003389</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            New Market <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-21 13:00:00">Wednesday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">LZebra.com<br _ngcontent-c5="">01847301131 <br _ngcontent-c5=""> Space - 153 2nd floor, new market city complex., New Market</td>
                <td _ngcontent-c5="">Tarikul Islam Hady<br _ngcontent-c5="">01725500040 <br _ngcontent-c5=""> House: 19/5, Block: C, Tajmohol Road, Mohammadpur, Dhaka.</td>
                <td _ngcontent-c5="">
                    Mohammadpur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-21 13:30:00">Wednesday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Aladen.com.</td>
                <td _ngcontent-c5="">1:59:06 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3389">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">72</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KA003388">KA003388</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(255, 206, 66) none repeat scroll 0% 0%;"> Pending</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            New Market <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-21 12:00:00">Wednesday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">LZebra.com<br _ngcontent-c5="">01847301131 <br _ngcontent-c5=""> Space - 153 2nd floor, new market city complex., New Market</td>
                <td _ngcontent-c5="">Shamim Ahmed<br _ngcontent-c5="">01934020002 <br _ngcontent-c5=""> Jhauchor Life &amp; Care Hospital, Kamrangirchar.</td>
                <td _ngcontent-c5="">
                    kamrangirchar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-21 12:30:00">Wednesday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Aladen.com.</td>
                <td _ngcontent-c5="">5:59:32 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3388">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">73</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PA003384">PA003384</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Baridhara <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-20 22:00:00">Tuesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Joya<br _ngcontent-c5="">01772349505 <br _ngcontent-c5=""> Blossom hotel H5,R1/A,Block-j,Baridhara</td>
                <td _ngcontent-c5="">Dukpion.com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital,PanthPth.</td>
                <td _ngcontent-c5="">
                    Panthapath<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-20 22:30:00">Tuesday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 21, 2018">Dukpion</td>
                <td _ngcontent-c5="">6:48:41 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3384">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">74</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003380">UT003380</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Motijheel <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-20 23:00:00">Tuesday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited Gadget &amp; Gizmos<br _ngcontent-c5="">01992707678 <br _ngcontent-c5=""> Shop #2/133, Gulistan Shopping Complex (Hall Market) 2nd Floor, Gulistan, Dhaka</td>
                <td _ngcontent-c5="">abul kalam<br _ngcontent-c5="">01617583891 <br _ngcontent-c5=""> 13/1 rana vola main road,uttara 10 120328</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-20 23:30:00">Tuesday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 21, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">6:45:52 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3380">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">75</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PU003378">PU003378</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(255, 206, 66) none repeat scroll 0% 0%;"> Pending</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            kalabagan <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-20 23:00:00">Tuesday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited, care vision<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus Road, Kalabagan, Dhaka. (Beside of Squre Hospital and Walton Showroom)</td>
                <td _ngcontent-c5="">Suma<br _ngcontent-c5="">01777990156 <br _ngcontent-c5=""> Z.H sikder medical college. Rayerbazar 119481</td>
                <td _ngcontent-c5="">
                    Puran Dhaka<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-20 23:30:00">Tuesday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">12:43:06 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3378">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">76</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/JA003375">JA003375</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Mirpur-10 <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-20 22:00:00">Tuesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited, One Click<br _ngcontent-c5="">01886666070 <br _ngcontent-c5=""> 163,Senpara Parbata,Mirpur10Dhaka, Bangladesh 1216</td>
                <td _ngcontent-c5="">Ahmed Bachchu<br _ngcontent-c5="">01754156111 <br _ngcontent-c5=""> Samsul haque khan school &amp; college,konapara, Jatrabari (120348)</td>
                <td _ngcontent-c5="">
                    Jatrabari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-20 22:30:00">Tuesday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 21, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">7:16:27 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3375">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">77</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MA003371">MA003371</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(255, 206, 66) none repeat scroll 0% 0%;"> Pending</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            New Market <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-20 22:00:00">Tuesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">LZebra.com<br _ngcontent-c5="">01847301131 <br _ngcontent-c5=""> Space - 153 2nd floor, new market city complex., New Market</td>
                <td _ngcontent-c5="">Md. Ariful Ahmed<br _ngcontent-c5="">01761826422 <br _ngcontent-c5=""> Shop No: 78, Mogbazaar Plaza, Circular Road. Dhaka</td>
                <td _ngcontent-c5="">
                    Magh Bazar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-20 22:30:00">Tuesday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Aladen.com.</td>
                <td _ngcontent-c5="">6:48:40 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3371">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">78</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003363">WH003363</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-20 14:00:00">Tuesday 02:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Shahed<br _ngcontent-c5="">01822864827 <br _ngcontent-c5=""> Chowmohuni, Noakhali</td>
                <td _ngcontent-c5="">
                    Whole Nation SA Paribahan<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-20 14:30:00">Tuesday 02:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 20, 2018">RED SHOP</td>
                <td _ngcontent-c5="">11:27:20 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3363">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">79</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003349">UT003349</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-19 12:00:00">Monday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01981997680 <br _ngcontent-c5=""> 56/8, West Panthapath, Lake Circus Road, Kalabagan, Dhaka. (Beside of Squre Hospital and Walton Showroom)i</td>
                <td _ngcontent-c5="">Md.Rakib<br _ngcontent-c5="">01881966692 <br _ngcontent-c5=""> Uttora, abdullapur , near khondokar petrol pump police check post sate (119867)</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-19 12:00:00">Monday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 21, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">8:26:47 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3349">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">80</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003348">UT003348</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Motijheel <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-19 12:00:00">Monday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Bikroy.com Limited<br _ngcontent-c5="">01992707678 <br _ngcontent-c5=""> Shop #2/133, Gulistan Shopping Complex (Hall Market) 2nd Floor, Gulistan, Dhaka</td>
                <td _ngcontent-c5="">Md,Rakib<br _ngcontent-c5="">01881966692 <br _ngcontent-c5=""> Uttora, abdullapur , near khondokar petrol pump police check post sate ( 119868)</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-19 12:00:00">Monday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 20, 2018">Bikroy.com</td>
                <td _ngcontent-c5="">4:49:12 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3348">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">81</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KA003333">KA003333</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(255, 206, 66) none repeat scroll 0% 0%;"> Pending</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            New Market <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-19 14:00:00">Monday 02:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">LZebra.com<br _ngcontent-c5="">01847301131 <br _ngcontent-c5=""> Space - 153 2nd floor, new market city complex., New Market</td>
                <td _ngcontent-c5="">Ali Imam<br _ngcontent-c5="">01998850078 <br _ngcontent-c5=""> Rony Market, Kamrangir Chor.</td>
                <td _ngcontent-c5="">
                    kamrangirchar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-19 14:30:00">Monday 02:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">Aladen.com.</td>
                <td _ngcontent-c5="">6:00:27 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3333">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">82</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003324">BA003324</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-19 11:00:00">Monday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Sagor<br _ngcontent-c5="">01872230218 <br _ngcontent-c5=""> Mugda para Basher tower dhaka 1214 99 dokner shamne</td>
                <td _ngcontent-c5="">
                    Bashabo<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-19 11:30:00">Monday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 19, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:51:41 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3324">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">83</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003288">BA003288</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-18 11:00:00">Sunday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">Eashan<br _ngcontent-c5="">01720022004 <br _ngcontent-c5=""> H-24
r-4
block -h
banasree</td>
                <td _ngcontent-c5="">
                    Banasree<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-18 11:30:00">Sunday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">8:39:57 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3289">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">84</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003274">BA003274</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-16 20:00:00">Friday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">BD Online Shopping House<br _ngcontent-c5="">01919475752 <br _ngcontent-c5=""> Chowkbazar, Dhaka- 1211, Chowk bazar</td>
                <td _ngcontent-c5="">Shams Ara Nowrozy<br _ngcontent-c5="">01766335555 <br _ngcontent-c5=""> 15,,16 K M Azam Lane, Shat Rowza,,
Abul Hasnat Road, Ananda Confectionay er Samne
Dhaka.</td>
                <td _ngcontent-c5="">
                    Bangsal<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-17 10:00:00">Saturday 10:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 17, 2018">BD Online</td>
                <td _ngcontent-c5="">6:26:12 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3274">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">85</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/ZI003273">ZI003273</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-16 20:00:00">Friday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">BD Online Shopping House<br _ngcontent-c5="">01919475752 <br _ngcontent-c5=""> Chowkbazar, Dhaka- 1211, Chowk bazar</td>
                <td _ngcontent-c5="">Nipa<br _ngcontent-c5="">01737338000 <br _ngcontent-c5=""> Jigatola Notun Rasta More 
Rayer Bzar, Agrani Bank er Samne
Dhaka</td>
                <td _ngcontent-c5="">
                    Zigatala<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-17 10:30:00">Saturday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 17, 2018">BD Online</td>
                <td _ngcontent-c5="">6:27:46 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3273">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">86</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003246">BA003246</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-15 20:00:00">Thursday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">Eashan<br _ngcontent-c5="">01720022004 <br _ngcontent-c5=""> Banasree,block-h</td>
                <td _ngcontent-c5="">
                    Banasree<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-15 20:30:00">Thursday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 16, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">5:51:52 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3246">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">87</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003244">UT003244</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-15 20:00:00">Thursday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">Arifur rahman<br _ngcontent-c5="">01914821991 <br _ngcontent-c5=""> Uttara sector-12,House-63</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-15 20:30:00">Thursday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 22, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">1:57:14 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3244">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">88</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003220">WH003220</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-14 22:00:00">Wednesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Ashraful<br _ngcontent-c5="">01834905004 <br _ngcontent-c5=""> Teker hat</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-14 22:30:00">Wednesday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 16, 2018">RED SHOP</td>
                <td _ngcontent-c5="">5:59:33 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3220">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">89</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/CA003213">CA003213</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-14 22:00:00">Wednesday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">BD Online Shopping House<br _ngcontent-c5="">01919475752 <br _ngcontent-c5=""> Chowkbazar, Dhaka- 1211, Chowk bazar</td>
                <td _ngcontent-c5="">Sabrina<br _ngcontent-c5="">01686841015 <br _ngcontent-c5=""> 693, North Kafrul, Dhaka Cantonment
Dhaka-1206</td>
                <td _ngcontent-c5="">
                    Cantonment<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-15 10:00:00">Thursday 10:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 15, 2018">BD Online</td>
                <td _ngcontent-c5="">6:46:10 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3213">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">90</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/EL003197">EL003197</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-13 23:00:00">Tuesday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Bapon Mahmud<br _ngcontent-c5="">01685245323 <br _ngcontent-c5=""> Flat-8/A-1268,Concord Prantik.elephant road.</td>
                <td _ngcontent-c5="">
                    Elephant road<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-13 23:30:00">Tuesday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 14, 2018">Dukpion</td>
                <td _ngcontent-c5="">7:50:54 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3197">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">91</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003188">WH003188</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-13 16:00:00">Tuesday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Bijoy<br _ngcontent-c5="">01882249066 <br _ngcontent-c5=""> Feni Sadar</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-13 16:30:00">Tuesday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 13, 2018">RED SHOP</td>
                <td _ngcontent-c5="">11:29:30 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3188">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">92</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003164">UT003164</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Chowk bazar <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-12 23:00:00">Monday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">BD Online Shopping House<br _ngcontent-c5="">01919475752 <br _ngcontent-c5=""> Chowkbazar, Dhaka- 1211, Chowk bazar</td>
                <td _ngcontent-c5="">Tanha<br _ngcontent-c5="">01859127848 <br _ngcontent-c5=""> Chalabon Mazar Road, Mazar Bari
Uttar Khan, Dhaka</td>
                <td _ngcontent-c5="">
                    Uttar Khan<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-13 10:00:00">Tuesday 10:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 13, 2018">BD Online</td>
                <td _ngcontent-c5="">6:08:39 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3164">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">93</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KH003162">KH003162</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(144, 12, 63) none repeat scroll 0% 0%;"> Picked Up Complete</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-12 21:00:00">Monday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Isswan<br _ngcontent-c5="">01798354034 <br _ngcontent-c5=""> Flat-B/3, 608, Uttor, Shahajanpur</td>
                <td _ngcontent-c5="">
                    Khilgaon<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-14 21:30:00">Wednesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 16, 2018">RED SHOP</td>
                <td _ngcontent-c5="">5:59:00 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3162">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">94</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/EL003160">EL003160</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(51, 122, 183) none repeat scroll 0% 0%;"> Started</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-12 17:00:00">Monday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RN TECH LTD<br _ngcontent-c5="">01789791708 <br _ngcontent-c5=""> Multiplan Center, show room-334, Level-3, New elephant road, Dhaka-1205, Elephant road</td>
                <td _ngcontent-c5="">Zihad Vaiya<br _ngcontent-c5="">01730373130 <br _ngcontent-c5=""> Bosundora  Fusar Park Road No 2 D block Basa No 29
01711372314</td>
                <td _ngcontent-c5="">
                    Elephant road<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-12 17:30:00">Monday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 13, 2018">RN TECH</td>
                <td _ngcontent-c5="">6:09:51 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3160">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">95</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/HA003120">HA003120</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(51, 122, 183) none repeat scroll 0% 0%;"> Started</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!----><span _ngcontent-c5="" class="tick tick-success glyphicon glyphicon-ok"></span>
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-11 22:00:00">Sunday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Mehdi<br _ngcontent-c5="">01922260055 <br _ngcontent-c5=""> Mheoddk dhKm</td>
                <td _ngcontent-c5="">
                    Hatirjheel<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-11 22:30:00">Sunday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 11, 2018">RED SHOP</td>
                <td _ngcontent-c5="">5:54:49 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!---->
                            <!---->
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3120">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">96</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI003097">MI003097</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-10 17:00:00">Saturday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Asif<br _ngcontent-c5="">01957206957 <br _ngcontent-c5=""> Mirpur mazar road
Lalkuti Bashupara</td>
                <td _ngcontent-c5="">
                    Mirpur-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-10 17:30:00">Saturday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 10, 2018">RED SHOP</td>
                <td _ngcontent-c5="">11:33:43 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3097">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">97</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT003094">UT003094</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(51, 122, 183) none repeat scroll 0% 0%;"> Started</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-10 11:00:00">Saturday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">sujon mia<br _ngcontent-c5="">01796919018 <br _ngcontent-c5=""> H-3...R-13..Sector- 1,,uttara</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-10 11:30:00">Saturday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 10, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">6:02:51 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3094">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">98</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/PA003077">PA003077</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-09 16:00:00">Friday 04:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Ismail<br _ngcontent-c5="">01731919194 <br _ngcontent-c5=""> Bashundrahara SHopping complex er samne</td>
                <td _ngcontent-c5="">
                    Panthapath<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-09 16:30:00">Friday 04:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 9, 2018">RED SHOP</td>
                <td _ngcontent-c5="">10:39:01 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3077">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">99</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/GU003061">GU003061</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-08 21:00:00">Thursday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">sohel<br _ngcontent-c5="">01716880767 <br _ngcontent-c5=""> 50 habib super market, gulshan 1</td>
                <td _ngcontent-c5="">
                    Gulshan-1<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-08 21:30:00">Thursday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 9, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">5:08:55 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3061">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">100</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MA003060">MA003060</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-08 21:00:00">Thursday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">muktadir rahman<br _ngcontent-c5="">01622619291 <br _ngcontent-c5=""> 349/1 dilu road.moghbazar</td>
                <td _ngcontent-c5="">
                    Magh Bazar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-08 21:30:00">Thursday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 9, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">5:12:46 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3060">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">101</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH003043">WH003043</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-08 07:45:00">Thursday 07:45</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Sumon<br _ngcontent-c5="">01743897202 <br _ngcontent-c5=""> Babuganj,Barsal.</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-08 12:00:00">Thursday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 8, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:10:45 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3043">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">102</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/DH003034">DH003034</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Tejgaon <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-07 12:00:00">Wednesday 12:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">AR TECH &amp; IT ZONE<br _ngcontent-c5="">01611288488 <br _ngcontent-c5=""> 115/4, (1st floor), Old Airport Road, Bijoy Soroni, Tejgaon, Tejgaon</td>
                <td _ngcontent-c5="">robbany<br _ngcontent-c5="">01775471789 <br _ngcontent-c5=""> amar ekushay hall,dhaka university.</td>
                <td _ngcontent-c5="">
                    Dhaka University<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-07 12:30:00">Wednesday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 7, 2018">AR TECH &amp;</td>
                <td _ngcontent-c5="">6:31:33 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3034">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">103</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA003014">BA003014</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-06 20:00:00">Tuesday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">shaontika<br _ngcontent-c5="">01631223845 <br _ngcontent-c5=""> basabo tampu stand</td>
                <td _ngcontent-c5="">
                    Bashabo<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-06 20:30:00">Tuesday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 6, 2018">RED SHOP</td>
                <td _ngcontent-c5="">2:21:40 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/3014">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">104</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002990">BA002990</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-05 20:00:00">Monday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Trust IT Solution<br _ngcontent-c5="">01703560215 <br _ngcontent-c5=""> Shop#349, Level# 3, Multiplan Center, , New Elephant Road, Dhaka- 1205, Elephant road</td>
                <td _ngcontent-c5="">md khairul islam<br _ngcontent-c5="">01743908955. <br _ngcontent-c5=""> h 20 r 03 block d rampura banaeree 01643383615</td>
                <td _ngcontent-c5="">
                    Banasree<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-05 20:30:00">Monday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 6, 2018">Trust IT</td>
                <td _ngcontent-c5="">6:34:53 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2990">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">105</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/DH002986">DH002986</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-05 12:45:00">Monday 12:45</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Asikuzzaman Asik<br _ngcontent-c5="">01717528263 <br _ngcontent-c5=""> House no- 1/C/2 Road Dhanmondi 7/A</td>
                <td _ngcontent-c5="">
                    Dhanmondi<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-05 12:30:00">Monday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 5, 2018">RED SHOP</td>
                <td _ngcontent-c5="">8:33:05 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2986">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">106</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH002977">WH002977</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-04 21:00:00">Sunday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Abdul Enziz imam<br _ngcontent-c5="">01752914850 <br _ngcontent-c5=""> IUT boar bazar Gazipur</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-04 21:30:00">Sunday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 5, 2018">Dukpion</td>
                <td _ngcontent-c5="">5:57:35 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2977">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">107</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WH002947">WH002947</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-02 23:00:00">Friday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Sohel<br _ngcontent-c5="">01642116666 <br _ngcontent-c5=""> EPZ savar</td>
                <td _ngcontent-c5="">
                    Whole Nation SundarBan Courier<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-02 23:30:00">Friday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 3, 2018">RED SHOP</td>
                <td _ngcontent-c5="">7:51:07 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2947">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">108</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/DH002937">DH002937</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-02 13:00:00">Friday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">saidur rahman<br _ngcontent-c5="">01741373348 <br _ngcontent-c5=""> dhanmondi sankar,60/7 ali hossen school</td>
                <td _ngcontent-c5="">
                    Dhanmondi - Shankar<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-02 13:30:00">Friday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 3, 2018">RED SHOP</td>
                <td _ngcontent-c5="">5:35:33 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2937">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">109</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO002932">MO002932</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-02 18:00:00">Friday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Md.Ali<br _ngcontent-c5="">01963774677 <br _ngcontent-c5=""> ...House#35,Road#5,Shekertek,Adabar,Mohammadpur....</td>
                <td _ngcontent-c5="">
                    Mohammadpur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-03 12:30:00">Saturday 12:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 2, 2018">RED SHOP</td>
                <td _ngcontent-c5="">1:27:32 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2932">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">110</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI002931">MI002931</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-02 10:30:00">Friday 10:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Mehedi Hasan Bappi<br _ngcontent-c5="">01872737757 <br _ngcontent-c5=""> office, Elephant road</td>
                <td _ngcontent-c5="">arifullah<br _ngcontent-c5="">01924972306 <br _ngcontent-c5=""> shawrapara,mirpur</td>
                <td _ngcontent-c5="">
                    Mirpur-10<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-02 12:45:00">Friday 12:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 2, 2018">Mehedi Hasan</td>
                <td _ngcontent-c5="">8:14:06 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2931">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">111</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002920">BA002920</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-02 09:00:00">Friday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Customer<br _ngcontent-c5="">01631223845 <br _ngcontent-c5=""> Dhaka Basaboo Tampu stand.</td>
                <td _ngcontent-c5="">
                    Bashabo<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-02 12:00:00">Friday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 2, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:37:16 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2920">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">112</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT002903">UT002903</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-01 13:00:00">Thursday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">propel bd.com<br _ngcontent-c5="">01973450777 <br _ngcontent-c5=""> Nahar Plaza 7th Floor, Office #803, 37, Bir Uttam CR-Datto Road, Hatirpool, Dhaka, Elephant road</td>
                <td _ngcontent-c5="">Kazi Mohsin<br _ngcontent-c5="">01907243741 <br _ngcontent-c5=""> Uttara,Sec-10,Tanvir School er pashe</td>
                <td _ngcontent-c5="">
                    Uttara - Sector-10<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-01 13:30:00">Thursday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">propel</td>
                <td _ngcontent-c5="">7:30:14 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2903">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">113</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/CA002900">CA002900</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-01 13:00:00">Thursday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Tanzim<br _ngcontent-c5="">01743599464 <br _ngcontent-c5=""> Kochukhet bazar,Dhaka cantonment</td>
                <td _ngcontent-c5="">
                    Cantonment<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-01 13:30:00">Thursday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">Dukpion</td>
                <td _ngcontent-c5="">7:09:20 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2900">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">114</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/WA002897">WA002897</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-01 07:45:00">Thursday 07:45</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Efaz Ahmed<br _ngcontent-c5="">01714272315 <br _ngcontent-c5=""> Kamal press vLtd.39 Rankin street wari.</td>
                <td _ngcontent-c5="">
                    Wari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-01 09:45:00">Thursday 09:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">Dukpion</td>
                <td _ngcontent-c5="">6:26:00 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2897">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">115</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002895">BA002895</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-03-01 11:00:00">Thursday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Sheikh Palash<br _ngcontent-c5="">01612464096 <br _ngcontent-c5=""> H-37,R-27,BL-A,Banani</td>
                <td _ngcontent-c5="">
                    Banani<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-03-01 11:30:00">Thursday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">Dukpion</td>
                <td _ngcontent-c5="">6:20:49 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2895">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">116</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO002893">MO002893</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-28 21:00:00">Wednesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Riaz Mahmood<br _ngcontent-c5="">01914111261 <br _ngcontent-c5=""> H-17 , shekhertek,Mohamdpur ,</td>
                <td _ngcontent-c5="">
                    Mohammadpur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-28 21:30:00">Wednesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">Dukpion</td>
                <td _ngcontent-c5="">7:49:44 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2893">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">117</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/UT002890">UT002890</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-28 21:00:00">Wednesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">Arif rasel<br _ngcontent-c5="">01922791100 <br _ngcontent-c5=""> Raziaxmi ,uttra bus stand,</td>
                <td _ngcontent-c5="">
                    Uttara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-28 21:30:00">Wednesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">Dukpion</td>
                <td _ngcontent-c5="">7:47:54 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2890">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">118</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/JA002889">JA002889</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-28 21:00:00">Wednesday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Nahidul Islam<br _ngcontent-c5="">01986687626 <br _ngcontent-c5=""> Jatrabari Dhaka, and jatrabari mor bus stand gia phone dila hoba</td>
                <td _ngcontent-c5="">
                    Jatrabari<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-28 21:30:00">Wednesday 09:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Mar 1, 2018">RED SHOP</td>
                <td _ngcontent-c5="">8:37:17 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2889">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">119</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO002858">MO002858</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-28 11:00:00">Wednesday 11:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Diganto,<br _ngcontent-c5="">01688628091 <br _ngcontent-c5=""> B-90 /F-15, IDEAL Z0NE, AGB C0L0NY, M0TIJHEEL, DHAKA - 1000</td>
                <td _ngcontent-c5="">
                    Motijheel<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-28 11:30:00">Wednesday 11:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 28, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:34:52 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2859">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">120</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI002849">MI002849</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Panthapath <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-27 14:00:00">Tuesday 02:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">Dukpion com<br _ngcontent-c5="">01715506015 <br _ngcontent-c5=""> Near Samorita Hospital, Panthapath, Panthapath</td>
                <td _ngcontent-c5="">engr. Pabel<br _ngcontent-c5="">01712463965 <br _ngcontent-c5=""> 73/3, Senapara parbata, Mirpur-10</td>
                <td _ngcontent-c5="">
                    Mirpur-10<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-27 14:30:00">Tuesday 02:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 27, 2018">Dukpion</td>
                <td _ngcontent-c5="">8:20:16 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2849">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">121</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI002842">MI002842</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-26 20:45:00">Monday 08:45</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Sojib Islam<br _ngcontent-c5="">01752641039 <br _ngcontent-c5=""> Siyalbari,Rupnagar,Mirpur-2
Monipur School r samna geya call deta hoba</td>
                <td _ngcontent-c5="">
                    Mirpur-2<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-27 12:00:00">Tuesday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 26, 2018">RED SHOP</td>
                <td _ngcontent-c5="">2:14:24 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2842">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">122</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002831">BA002831</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-26 13:00:00">Monday 01:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road</td>
                <td _ngcontent-c5="">Ruman<br _ngcontent-c5="">01709933165 <br _ngcontent-c5=""> Dhaka baridhara Amarika school, Road -3, House- 26B</td>
                <td _ngcontent-c5="">
                    Baridhara<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-26 13:30:00">Monday 01:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 26, 2018">High Power</td>
                <td _ngcontent-c5="">10:02:39 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2831">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">123</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002829">BA002829</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-26 09:00:00">Monday 09:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Rashid Reza<br _ngcontent-c5="">01711004113 <br _ngcontent-c5=""> House-45, Road-13, Banani, Block-D, flat-B/1</td>
                <td _ngcontent-c5="">
                    Banani<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-26 10:45:00">Monday 10:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 26, 2018">RED SHOP</td>
                <td _ngcontent-c5="">6:44:17 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2829">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">124</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MO002821">MO002821</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-25 08:30:00">Sunday 08:30</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">customer<br _ngcontent-c5="">01625556008 <br _ngcontent-c5=""> Mohammadpur Sher Sha suri  road 100</td>
                <td _ngcontent-c5="">
                    Mohammadpur<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-25 12:00:00">Sunday 12:00</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 25, 2018">RED SHOP</td>
                <td _ngcontent-c5="">2:37:43 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2821">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">125</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/LA002818">LA002818</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-25 18:00:00">Sunday 06:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Md. Nabin<br _ngcontent-c5="">01685819218 <br _ngcontent-c5=""> Islambag,Bou Bazar ar samne geya call deta hoba,lalbag</td>
                <td _ngcontent-c5="">
                    Lalbagh<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-25 09:45:00">Sunday 09:45</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 25, 2018">RED SHOP</td>
                <td _ngcontent-c5="">5:35:09 PM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2818">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">126</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002816">BA002816</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-25 14:00:00">Sunday 02:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Sajol<br _ngcontent-c5="">01710990913 <br _ngcontent-c5=""> Banani Road-7, House-7,</td>
                <td _ngcontent-c5="">
                    Banani<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-25 14:30:00">Sunday 02:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 25, 2018">RED SHOP</td>
                <td _ngcontent-c5="">8:15:28 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2816">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">127</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/MI002807">MI002807</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-24 22:00:00">Saturday 10:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Bari Billa<br _ngcontent-c5="">01789425659 <br _ngcontent-c5=""> Mirpur-2, Kacha bazar er oi khane somaj kollan mosjid</td>
                <td _ngcontent-c5="">
                    Mirpur-2<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-24 22:30:00">Saturday 10:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 25, 2018">RED SHOP</td>
                <td _ngcontent-c5="">5:28:28 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2807">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">128</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/AI002801">AI002801</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-24 20:00:00">Saturday 08:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">shadik<br _ngcontent-c5="">01752813187 <br _ngcontent-c5=""> Thunder tech, kaola madrasha,Dokkhin khan(airport neme kaola railgate hoye jete hobe)</td>
                <td _ngcontent-c5="">
                    Airport<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-24 20:30:00">Saturday 08:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 25, 2018">RED SHOP</td>
                <td _ngcontent-c5="">7:24:02 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2801">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">129</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/DH002799">DH002799</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-24 15:00:00">Saturday 03:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Eamir Ahmed<br _ngcontent-c5="">01881176586 <br _ngcontent-c5=""> Flat-1C, House-66, Road-9/A Meena Bazar er goli opposite of ibna sina</td>
                <td _ngcontent-c5="">
                    Dhanmondi<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-24 15:30:00">Saturday 03:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 24, 2018">RED SHOP</td>
                <td _ngcontent-c5="">10:01:44 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2799">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">130</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/BA002792">BA002792</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-24 15:00:00">Saturday 03:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Customer<br _ngcontent-c5="">01675638936 <br _ngcontent-c5=""> Suvastu Echo plaza Lift er 3 moddho badda</td>
                <td _ngcontent-c5="">
                    Badda<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-24 15:30:00">Saturday 03:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 24, 2018">RED SHOP</td>
                <td _ngcontent-c5="">9:08:04 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2792">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr><tr _ngcontent-c5="">
                <td _ngcontent-c5="">131</td>
                <td _ngcontent-c5=""><a _ngcontent-c5="" style="cursor:pointer;" href="#/order/KH002782">KH002782</a></td>
                <td _ngcontent-c5=""><span _ngcontent-c5="" class="label orderstate" style="background: rgb(105, 79, 147) none repeat scroll 0% 0%;"> Accepted</span></td>
                <td _ngcontent-c5="">
                    <div _ngcontent-c5="" class="row">
                        <div _ngcontent-c5="" class="col-md-1 col-sm-1 col-xs-3">
                            <!---->
                        </div>
                        <div _ngcontent-c5="" class="col-md-10 col-sm-10 col-xs-8">
                            Elephant road <br _ngcontent-c5="">
                            <span _ngcontent-c5="" title="2018-02-23 17:00:00">Friday 05:00</span>
                        </div>
                    </div>                    
                </td>
                <td _ngcontent-c5="" style="max-width:300px">RED SHOP BD<br _ngcontent-c5="">01556455465 <br _ngcontent-c5=""> Elephant road, Dhaka 1205, Elephant road</td>
                <td _ngcontent-c5="">Ovi<br _ngcontent-c5="">01960904427 <br _ngcontent-c5=""> Khilgaon, shiphi bagh 4 tola goli</td>
                <td _ngcontent-c5="">
                    Khilgaon<br _ngcontent-c5="">
                    <span _ngcontent-c5="" title="2018-02-23 17:30:00">Friday 05:30</span>
                </td>
                <td _ngcontent-c5="" title="Created on: Feb 24, 2018">RED SHOP</td>
                <td _ngcontent-c5="">9:18:01 AM</td>
                <td _ngcontent-c5="" style="text-align:center;width:60px;">

                    
                    <div _ngcontent-c5="" class="dropdown" style="width:15px;float:right;">
                        <i _ngcontent-c5="" aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                        <ul _ngcontent-c5="" class="dropdown-menu dropdown-menu-right">
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divPickupTask" data-toggle="modal">Pickup Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#divOrderUpdate" data-toggle="modal">Delivery Task</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" data-target="#myModal" data-toggle="modal">Assign Person</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="" href="#/order/edit/2782">Edit Order</a></li>
                            <!----><li _ngcontent-c5="" class="divider"></li>
                            <!----><li _ngcontent-c5=""><a _ngcontent-c5="">Delete</a></li>
                        </ul>
                    </div>

                    <!----><i _ngcontent-c5="" aria-hidden="true" class="fa fa-print" data-target="#divPrintPreview" data-toggle="modal" style="font-size:20px;cursor:pointer;"></i>
                </td>
            </tr>
        </tbody>
    </table>

</div>

</div>


<div _ngcontent-c5="" class="tab-pane" id="tab_default_2">

    <div _ngcontent-c5="" class="content table-responsive table-full-width">
        
            <table _ngcontent-c5="" class="table table-hover table-striped" style="margin-bottom:200px;">
                <thead _ngcontent-c5="">
                    <tr _ngcontent-c5="">
                    <th _ngcontent-c5="">#</th>
                    <th _ngcontent-c5="">Track No.</th>
                    <th _ngcontent-c5="">Status</th>
                    <th _ngcontent-c5="">Pickup</th>
                    <th _ngcontent-c5="">Seller</th>
                    <th _ngcontent-c5="">Customer</th>
                    <th _ngcontent-c5="">Delivery</th>
                    <th _ngcontent-c5="">Order Time</th>
                    <th _ngcontent-c5="">Created by</th>
                    <th _ngcontent-c5="" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody _ngcontent-c5="">
                    <!---->
                </tbody>
            </table>
        
        </div>

</div>


<div _ngcontent-c5="" class="tab-pane" id="tab_default_3">
    
    <div _ngcontent-c5="" class="content table-responsive table-full-width">
        
            <table _ngcontent-c5="" class="table table-hover table-striped" style="margin-bottom:200px;">
                <thead _ngcontent-c5="">
                    <tr _ngcontent-c5="">
                    <th _ngcontent-c5="">#</th>
                    <th _ngcontent-c5="">Track No.</th>
                    <th _ngcontent-c5="">Status</th>
                    <th _ngcontent-c5="">Pickup</th>
                    <th _ngcontent-c5="">Seller</th>
                    <th _ngcontent-c5="">Customer</th>
                    <th _ngcontent-c5="">Delivery</th>
                    <th _ngcontent-c5="">Order Date</th>
                    <th _ngcontent-c5="">Created by</th>
                    <th _ngcontent-c5="" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody _ngcontent-c5="">
                    <!---->
                </tbody>
            </table>
        
        </div>

</div>
    

<div _ngcontent-c5="" class="tab-pane" id="tab_default_4">
    
    <div _ngcontent-c5="" class="content table-responsive table-full-width">

        
    <table _ngcontent-c5="" class="table table-hover table-striped" style="margin-bottom:200px;">
        <thead _ngcontent-c5="">
            <tr _ngcontent-c5="">
            <th _ngcontent-c5="">#</th>
            <th _ngcontent-c5="">Track No.</th>
            <th _ngcontent-c5="">Status</th>
            <th _ngcontent-c5="">Pickup</th>
            <th _ngcontent-c5="">Seller</th>
            <th _ngcontent-c5="">Customer</th>
            <th _ngcontent-c5="">Delivery</th>
            <th _ngcontent-c5="">Created by</th>
            <th _ngcontent-c5="" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody _ngcontent-c5="">
            <!---->
        </tbody>
    </table>

</div>

</div>
    

<div _ngcontent-c5="" class="tab-pane" id="tab_default_5">
    
    <div _ngcontent-c5="" class="content table-responsive table-full-width">

        
    <table _ngcontent-c5="" class="table table-hover table-striped" style="margin-bottom:200px;">
        <thead _ngcontent-c5="">
            <tr _ngcontent-c5="">
            <th _ngcontent-c5="">#</th>
            <th _ngcontent-c5="">Track No.</th>
            <th _ngcontent-c5="">Status</th>
            <th _ngcontent-c5="">Pickup</th>
            <th _ngcontent-c5="">Seller</th>
            <th _ngcontent-c5="">Customer</th>
            <th _ngcontent-c5="">Delivery</th>
            <th _ngcontent-c5="">Order Date</th>
            <th _ngcontent-c5="">Created by</th>
            <th _ngcontent-c5="" style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody _ngcontent-c5="">
            <!---->
        </tbody>
    </table>

</div>

</div>
    

</div>
</div>







<div _ngcontent-c5="" class="modal fade" id="myModal" role="dialog">
<div _ngcontent-c5="" class="modal-dialog">
<div _ngcontent-c5="" class="modal-content">

<div _ngcontent-c5="" class="modal-header">   
    <h4 _ngcontent-c5="" class="title">Task Assign</h4>      
</div>

<div _ngcontent-c5="" class="modal-body">

<h3 _ngcontent-c5="">Pickup Man</h3>
<hr _ngcontent-c5="">


<!---->

<br _ngcontent-c5=""><br _ngcontent-c5="">
<form _ngcontent-c5="" class="form-inline ng-untouched ng-pristine ng-invalid" novalidate="">
  <div _ngcontent-c5="" class="form-group">
    <select _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="userid">
        <!---->
    </select>
  </div>
  <div _ngcontent-c5="" class="form-group">
    <input _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="remarks" placeholder="Remarks" style="width:300px;" type="email">
  </div>
  <button _ngcontent-c5="" class="btn btn-success" type="submit">Assign</button>
</form>


<br _ngcontent-c5=""><br _ngcontent-c5=""><br _ngcontent-c5="">
<h3 _ngcontent-c5="">Delivery Man</h3>
<hr _ngcontent-c5="">


<!---->

<br _ngcontent-c5=""><br _ngcontent-c5="">

<form _ngcontent-c5="" class="form-inline ng-untouched ng-pristine ng-invalid" novalidate="">
  <div _ngcontent-c5="" class="form-group">
    <select _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="userid">
        <!---->
    </select>
  </div>
  <div _ngcontent-c5="" class="form-group">
    <input _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="remarks" placeholder="Remarks" style="width:300px;" type="email">
  </div>
  <button _ngcontent-c5="" class="btn btn-success" type="submit">Assign</button>
</form>


</div>


<div _ngcontent-c5="" class="modal-footer">
        <button _ngcontent-c5="" class="btn btn-default" data-dismiss="modal" type="button">Close</button>
      </div>

</div>
</div>
</div>





<div _ngcontent-c5="" class="modal fade" id="divPickupTask" role="dialog">
<div _ngcontent-c5="" class="modal-dialog">
<div _ngcontent-c5="" class="modal-content">

<div _ngcontent-c5="" class="modal-header">   
    <h4 _ngcontent-c5="" class="title">Pickup Task</h4>      
</div>

<div _ngcontent-c5="" class="modal-body">


<form _ngcontent-c5="" novalidate="" class="ng-untouched ng-pristine ng-invalid">

<div _ngcontent-c5="" class="form-group">
    <label _ngcontent-c5="" for="exampleInputPassword1">Remarks</label>
    <textarea _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="remarks" style="height:90px;"></textarea>
</div>

  <button _ngcontent-c5="" class="btn btn-success" type="submit" disabled="disabled">Submit</button>
</form>



</div>


<div _ngcontent-c5="" class="modal-footer">
        <button _ngcontent-c5="" class="btn btn-default" data-dismiss="modal" id="btnPickupClose" type="button">Close</button>
      </div>

</div>
</div>
</div>





<div _ngcontent-c5="" class="modal fade" id="divOrderUpdate" role="dialog">
<div _ngcontent-c5="" class="modal-dialog">
<div _ngcontent-c5="" class="modal-content">

<div _ngcontent-c5="" class="modal-header">   
    <h4 _ngcontent-c5="" class="title">Delivery Task</h4>      
</div>

<div _ngcontent-c5="" class="modal-body">



<form _ngcontent-c5="" novalidate="" class="ng-untouched ng-pristine ng-invalid">
  <div _ngcontent-c5="" class="form-group">
    <label _ngcontent-c5="" for="exampleInputEmail1">Order State</label>
    <select _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="orderstateid">
        <!---->
    </select>
</div>
  <div _ngcontent-c5="" class="form-group">
    <label _ngcontent-c5="" for="exampleInputPassword1">Remarks</label>

    <textarea _ngcontent-c5="" class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="remarks" style="height:90px;"></textarea>

</div>
  <button _ngcontent-c5="" class="btn btn-success" type="submit" disabled="disabled">Submit</button>
</form>



</div>


<div _ngcontent-c5="" class="modal-footer">
        <button _ngcontent-c5="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>
      </div>

</div>
</div>
</div>





<div _ngcontent-c5="" class="modal fade" id="divPrintPreview" role="dialog">
<div _ngcontent-c5="" class="modal-dialog">
<div _ngcontent-c5="" class="modal-content">

<div _ngcontent-c5="" class="modal-header">   
    <h4 _ngcontent-c5="" class="title">Print Preview</h4>      
</div>

<div _ngcontent-c5="" class="modal-body" id="divPrintContent" style="margin:0px auto;">

<div _ngcontent-c5="" class="print page">

<div _ngcontent-c5="" style="width:100%;display:block;height:130px;position:relative;">   
<div _ngcontent-c5="" style="width:200px;">
    <img _ngcontent-c5="" src="dashboard_files/logo.jpg" style="width:170px;height:120px;margin:0px auto;">         
</div> 
<div _ngcontent-c5="" style="position:absolute;top:10px;right:10px;text-align:right">
    <p _ngcontent-c5=""> Track Number: <b _ngcontent-c5=""></b></p>
    <p _ngcontent-c5="">Date: </p>
</div>
</div>

<div _ngcontent-c5="" style="margin:5px;font-size:14px;">
Pickup Address: , ,

</div>

<div _ngcontent-c5="" style="margin:10px 5px 5px;font-size:14px;">
Delivery Address: , ,

</div>





<div _ngcontent-c5="">

<table _ngcontent-c5="" class="table table-sm table-hover table-bordered orderDetails">
    <thead _ngcontent-c5="">
        <tr _ngcontent-c5="">
        <th _ngcontent-c5="">Item Name</th>
        <th _ngcontent-c5="">Qty.</th>
        <th _ngcontent-c5="" style="text-align:center">U. Price</th>
        <th _ngcontent-c5="" style="text-align:center">Amount</th>
        </tr>
    </thead>
    <tbody _ngcontent-c5="">
        <!---->                
    </tbody>
    <tfoot _ngcontent-c5=""> 
        <tr _ngcontent-c5="">
            <td _ngcontent-c5="" colspan="3" style="text-align:right;">Total</td>
            <td _ngcontent-c5="" style="width:60px; text-align:right;font-weight:bold">00.0</td>
        </tr>
    </tfoot>
</table>

</div>


<div _ngcontent-c5="" id="divPriceInWords" style="margin-left:10px;margin-top:5px;text-align:center;">  </div>




<table _ngcontent-c5="" style="width:100%;margin-top:10px;">
<tbody _ngcontent-c5=""><tr _ngcontent-c5="">
    <td _ngcontent-c5="" style="width:55%;">

        <div _ngcontent-c5="" style="width:100%;">
 
            <div _ngcontent-c5="" style="margin:0px;margin-top:5px;font-weight:bold;font-size:13px;">Handover Express</div>
            <div _ngcontent-c5="" style="margin:0px;">‎Hotline: 01872-737 757</div>
            <div _ngcontent-c5="" style="margin:0px;">info@handoverexpressbd.com<br _ngcontent-c5="">www.handoverexpressbd.com</div>

        </div>

    </td>
    <td _ngcontent-c5="" style="width:44%;">
           
           <div _ngcontent-c5="" style="margin-top:50px; width:100%;padding-top:5px;border-top:1px dashed #A6A6A6">Customer Sign</div>           
    </td>
</tr>
</tbody></table>

<div _ngcontent-c5="" style="width:100%;text-align:center;margin:0px;">
    <svg _ngcontent-c5="" id="qrcode"></svg>
</div>

<div _ngcontent-c5="" style="font-size:10px;width:100%;margin-top:5px;text-align:center ">THANK YOU FOR SHOPPING WITH US</div>

</div>
</div>


<div _ngcontent-c5="" class="modal-footer">
    <button _ngcontent-c5="" class="btn btn-primary" onclick="printContent('divPrintContent');" type="button">Print</button>
    <button _ngcontent-c5="" class="btn btn-default" data-dismiss="modal" id="btnClose" type="button">Close</button>
</div>

</div>
</div>
</div>




</div>



  

<!---->

<!---->
    </div></div></ng-component>


</div>

</div>

</ng-component></app-root></div></div>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/inline.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/polyfills.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <!--<script type="text/javascript" src="assets/js/vendor.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
    </body>
</html>