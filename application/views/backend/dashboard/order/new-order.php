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
						<li routerlinkactive="active" class=""><!----><a href="#/dashboard">Dashboard</a></li>
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

                
                <!----><li class="" data-target="#Order" data-toggle="collapse" id="liOrder" aria-expanded="true">
                  <a><i class="fa fa-gift fa-lg"></i>Order</a><span class="arrow"></span>
                </li>
                <ul class="sub-menu collapse in" id="Order" aria-expanded="true" style="">
                      <li routerlinkactive="active" tabindex="0" class="active"><a>New Order</a></li>
                      <li routerlinkactive="active" tabindex="0" class=""><a>Order States</a></li>
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


        <router-outlet></router-outlet><ng-component>

<br>


<div class="card" style="max-width:700px;margin:10px auto;">
<div class="header" style="text-align:center">
	<h4 class="title"><span>New Order</span> </h4>
</div>
<div class="content">

<form class="form-horizontal ng-untouched ng-pristine ng-invalid" novalidate="">



  <div class="form-group">
		<label class="control-label col-sm-3">Delivary Type <span class="text-danger">*</span></label>
		<div class="col-xs-8">			
			<select class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliverytypeid">
				<!----><option value="1" selected="selected">Delivery</option><option value="2">Classified Delivery</option>
			</select>			
		</div>
	</div>


	<hr>


	<div class="form-group">
		<label class="control-label col-sm-3">Seller's Name<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">
			<input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="sellersname" id="sellersname" name="sellersname" placeholder="" value="moshahed alam" type="text">
			<!---->
		</div>
	</div>
		
	<div class="form-group">
		<label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
			<input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="sellersmobile" id="sellersmobile" name="sellersmobile" placeholder="" value="01749757077" type="text">
			</div>
			<!---->
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">	
			<textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="sellersaddress" id="sellersaddress" name="sellersaddress" style="height:80px;">ok, Mohammadpur</textarea>
			<!---->
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-3">Pickup Area<span class="text-danger">*</span></label>
		<div class="col-xs-8">			
			<select class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="pickupareaid">
				<!----><option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6" selected="selected">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>
			</select>			
			<!---->
		</div>
	</div>
		

	<div class="form-group">
		<label class="control-label col-sm-3">Pickup Time<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">
		<div class="input-group">

			<input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="pickupDate" id="datePicker" style="width:110px;" value="4/1/2018" type="text">

			<select class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="pickupTime" style="width:110px;margin-left:5px;">
				<!----><option value="07:00 AM">07:00 AM</option><option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM" selected="selected">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
			</select>

		</div>
		</div>
	</div>	

	<hr>

	<div class="form-group">
		<label class="control-label col-sm-3">Customer Name<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">
			<input class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customername" id="customername" name="customername" placeholder="" type="text">
			<!---->
		</div>
	</div>
		
	<div class="form-group">
		<label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
			<input class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customermobile" id="customermobile" name="customermobile" placeholder="" type="text">
			</div>
			<!---->
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">	
			<textarea class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="customeraddress" id="customeraddress" name="customeraddress" style="height:80px;"></textarea>
			<!---->
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-3">Delivery Area<span class="text-danger">*</span></label>
		<div class="col-xs-8">			
			<select class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="deliveryareaid">
				<!----><option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>
			</select>			
		</div>
	</div>
		

	<div class="form-group">
		<label class="control-label col-sm-3">Delivery Time<span class="text-danger">*</span></label>
		<div class="col-md-8 col-sm-9">
		<div class="input-group">

			<input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliveryDate" id="datePicker2" style="width:110px;" value="4/1/2018" type="text">
			<select class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliveryTime" style="width:110px;margin-left:5px;">
				<!----><option value="07:00 AM">07:00 AM</option><option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM" selected="selected">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
			</select>

		</div>
		</div>
	</div>


	<hr>


	<div class="form-group">
		<label class="control-label col-sm-3">Reference Invoice</label>
		<div class="col-md-8 col-sm-9">
		<input class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="referenceinvoice" id="referenceinvoice" name="referenceinvoice" placeholder="" type="text">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">Package Description</label>
		<div class="col-md-8 col-sm-9">
			<textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="packagedescription" id="packagedescription" name="packagedescription"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-3">Note To Delivery Man</label>
		<div class="col-md-8 col-sm-9">
			<textarea class="form-control ng-untouched ng-pristine ng-valid" formcontrolname="deliverynote" id="deliverynote" name="deliverynote"></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3"></label>
		<div class="col-md-8 col-sm-9">
			<button class="btn btn-warning" type="submit" disabled="disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
	</div>

</form>

</div>
</div>




<div class="card" style="max-width:700px;margin:50px auto;">
<div class="header" style="text-align:center">
	<h4 class="title"><span>Order Items</span> </h4>
</div>
<div class="content">


<table class="table table-bordered"> 
			<thead> 
				<tr> 
					<th>#</th> 
					<th>Item Name</th> 
					<th>Quantity</th> 
					<th>Unit Price</th> 
					<th>Total</th>
					<th><button class="btn btn-xs btn-primary" type="button">Add Item</button></th>
				</tr> 
			</thead> 
			<tbody> 
				<!----><tr> 
					<td>1</td>
					<td><textarea class="form-control ng-untouched ng-pristine ng-valid" name="itemname" ngdefaultcontrol="" style="width:200px;"></textarea></td>
					<td><input class="form-control text-center ng-untouched ng-pristine ng-valid" maxlength="3" name="quantity" ngdefaultcontrol="" style="width:80px;" value="0" type="text"></td>
					<td><input class="form-control text-center ng-untouched ng-pristine ng-valid" name="unitprice" ngdefaultcontrol="" style="width:80px;" value="0" type="text"></td>
					<td><input class="form-control text-center ng-untouched ng-pristine" disabled="disabled" name="total" ngdefaultcontrol="" style="width:80px;" value="0" type="text"></td>
					<td>
						<button class="btn btn-xs btn-danger" type="button">Delete</button>
					</td>
				</tr><tr> 
					<td>2</td>
					<td><textarea class="form-control ng-untouched ng-pristine ng-valid" name="itemname" ngdefaultcontrol="" style="width:200px;">Delivery Charge</textarea></td>
					<td><input class="form-control text-center ng-untouched ng-pristine ng-valid" maxlength="3" name="quantity" ngdefaultcontrol="" style="width:80px;" value="1" type="text"></td>
					<td><input class="form-control text-center ng-untouched ng-pristine ng-valid" name="unitprice" ngdefaultcontrol="" style="width:80px;" value="120" type="text"></td>
					<td><input class="form-control text-center ng-untouched ng-pristine" disabled="disabled" name="total" ngdefaultcontrol="" style="width:80px;" value="120" type="text"></td>
					<td>
						<button class="btn btn-xs btn-danger" type="button">Delete</button>
					</td>
				</tr> 
			</tbody> 
			<tfoot>
				<tr>
					<td colspan="4"></td>
					<td>
						<input class="form-control text-center ng-untouched ng-pristine" disabled="disabled" name="total" ngdefaultcontrol="" style="width:80px;" value="120" type="text">
					</td>
					<td></td>
				</tr>
			</tfoot>
		</table>




</div>
</div>






<!---->
<!---->
</ng-component>


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