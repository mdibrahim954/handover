<?php
if (isset($header)) {
    echo $header;
}
?>
 <div class="clearfix"></div>
    
    <!-- Start page title -->
    <div class="section page-title">
		<div class="parallax" data-background="<?php echo base_url(); ?>resources/theme/images/bg/page-header.jpg" data-jarallax='{"speed": 0.7}'></div>
        <div class="container content-parallax">
            <h3 class="title">About <span>Us</span></h3>
            <span>About Us</span>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <!--<li><a href="#">Components</a></li>-->
                <li class="active">About Us</li>
            </ol>
        </div>
		<div class="triangle" data-height="85"  data-color-bottom="#ffffff" data-color-top="transparent"></div>
    </div>
    <!-- End page title -->
    
    <div class="clearfix"></div>

    <!-- Start contain wrapp -->
	<div class="section padding-bot50">	
		<div class="container">
			<div class="row">
                            <div class="col-md-12 col-sm-11">
					<!-- Start Form -->
					<p  style="margin:10px;font-size:14px;text-align:justify">

                        <?php echo $about->description; ?>
                                            
                    </p>
					<!-- End Form -->
				</div>
						
			</div>
		</div>   
    </div>
    <!-- End contain wrapp -->
	
	<div class="clearfix"></div>
	
	

<?php
if (isset($footer)) {
    echo $footer;
}
?>
       