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
            <h3 class="title">Contact <span>Us</span></h3>
            <span>Contact</span>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <!--<li><a href="#">Components</a></li>-->
                <li class="active">Contact</li>
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
				<div class="col-md-8 col-sm-7">
					<!-- Start Form -->
					<form action="<?php echo base_url(); ?>contact_us/contact_email" method="post" id="mycontactform" >
						<div class="clearfix"></div>
						<div id="success"></div>
						<div class="row wrap-form">
							<div class="form-group col-md-6 col-sm-6">
								<h6>Full Name</h6>
                                                                <input type="text" name="name" id="name" class="form-control input-lg required" required="" placeholder="Enter your full Name...">
								<span data-for="name" class="error"></span>
							</div>
							<div class="form-group col-md-6 col-sm-6">
								<h6>Email Address</h6>
                                                                <input type="email" name="email" id="email" class="form-control input-lg required" required="" placeholder="Enter your email address...">
								<span data-for="email" class="error"></span>
							</div>
							<div class="form-group col-md-12 col-sm-12">
								<h6>Subject</h6>
                                                                <input type="text" name="subject" id="subject" class="form-control input-lg required" placeholder="Enter subject...">
								<span data-for="subject" class="error"></span>
							</div>
							<div class="form-group col-md-12 col-sm-12">
								<h6>Your Message</h6>
                                                                <textarea name="message" id="message" class="form-control input-lg required" required="" placeholder="Write something for us..." rows="5"></textarea>
								<span data-for="message" class="error"></span>
							</div>
							<div class="form-group col-md-12 col-sm-12">
								<input type="submit" value="Send Message" id="submit" class="btn btn-primary btn-lg"/>
								<div class="status-progress"></div>
							</div>
						</div>
					</form>
					<!-- End Form -->
				</div>
				<div class="col-md-4 col-sm-5">
					<div class="contact-detail">
						<div class="contact-sparator"></div>
						<ul class="list-unstyled">
							<li>
								<i class="fa fa-home fa-2x fa-primary"></i>
								<h6>Our location</h6>								
								<p>
                                                                    <strong>Handover Express</strong><br>
								225, New elephant road,<br />
                                                                Dhaka -1205<br>
                                                               
								</p>
							</li>
							<li>
								<i class="fa fa-phone fa-2x fa-primary"></i>
								<h6>Call center</h6>
								<p>
								01872-737-757
								</p>
							</li>
							<li>
								<i class="fa fa-envelope fa-2x fa-primary"></i>
								<h6>Email address</h6>
								<p>
								mehedi.hasan.bappi01@gmail.com
								</p>
							</li>
						</ul>
					</div>
				</div>				
			</div>
		</div>   
    </div>
    <!-- End contain wrapp -->
	
	<div class="clearfix"></div>
	
	<!-- Start google map -->
	<!--<div id="map" class="map-wrapper"></div>-->
        <div id="" class="map-wrapper">            
             <googlemap _ngcontent-c2="">
                        <!--https://www.google.com/maps/place/Bata+Signal+Bus+Stop/@23.736625,90.3861276,16.5z/data=!4m16!1m10!4m9!1m3!2m2!1d90.3851137!2d23.7324036!1m3!2m2!1d90.3871361!2d23.7374632!3e2!3m4!1s0x3755b8b8aa1e1d4f:0x6cd8f5937dd4e45c!8m2!3d23.7390689!4d90.3886682-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5165.134337718387!2d90.38612756783841!3d23.736625025184612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b8aa1e1d4f%3A0x6cd8f5937dd4e45c!2sBata+Signal+Bus+Stop!5e0!3m2!1sen!2sbd!4v1527015449393" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </googlemap>
        </div>
	<!-- End google map -->

<?php
if (isset($footer)) {
    echo $footer;
}
?>
       