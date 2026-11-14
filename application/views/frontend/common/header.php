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


        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/inline.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/polyfills.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <!--<script type="text/javascript" src="assets/js/vendor.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
    </head>
    <body cz-shortcut-listen="true">
        <div class="container-fluid">
            <div class="row">
                <div id="divProgressLine" class="progress">
                    <div class="indeterminate"></div>
                        
                </div>
                <app-root ng-version="4.4.6">
                    <router-outlet>
                        
                    </router-outlet>
                    <ng-component>
                        <navbar>
                            <div class="main-navigation navbar-fixed-top">
                                <nav class="navbar navbar-default">
                                    <div style="padding-right:10px;">	
                                        <div class="navbar-header">
                                            <button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand" href="<?php echo base_url(); ?>">Handover Express</a>

                                        </div>
                                        <div class="collapse navbar-collapse" id="myNavbar">
                                            <ul class="nav navbar-nav">
                                                <li style="margin-left:20px;">
                                                    <div id="custom-search-input">
                                                        <form action="<?php echo base_url(); ?>home/order_track" method="post">
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
                                                <li routerlinkactive="active">
                                                    
                                                </li>
                                                <?php if($this->session->userdata('user_type_id') && $this->session->userdata('user_type_id')==2){?>
                                                <li><a href="<?php echo base_url(); ?>deliveryman/dashboard">Dashboard</a></li>
                                                <?php } ?>
                                                <?php  if($this->session->userdata('user_type_id') && ($this->session->userdata('user_type_id')==3 || $this->session->userdata('user_type_id')==5)){?>
                                                <li><a href="<?php echo base_url(); ?>client/dashboard">Dashboard</a></li>
                                                <?php } ?>
                                                <?php if($this->session->userdata('user_type_id') && $this->session->userdata('user_type_id')==1){?>
                                                <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                                <?php } ?>
                                                <li><a href="<?php echo base_url(); ?>about">About</a></li>
                                                <li><a href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>

                                                <?php if($this->session->userdata('user_id')){?>                                               
                                                <li><a href="<?php echo base_url(); ?>logout/user_logout">Sign Out</a></li>
                                                <?php }else{ ?>
                                                <li><a href="<?php echo base_url(); ?>signup">Sign Up</a></li> 
                                                <li><a href="<?php echo base_url(); ?>signin">Sign In</a></li>
                                                <?php } ?>
                                                <li></li> 
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>

                        </navbar>