<?php
if (isset($header)) {
    echo $header;
}
?>
                       <body> 
	<!-- Strat Top Menu -->
	<div class="top-menu">
		<div class="container">
			<ul class="menu-link">
				<li><a href="<?php echo base_url(); ?>signup">Register free</a></li>
				<li><a href="<?php echo base_url(); ?>signin">Sign in</a></li>
			</ul>
			<ul class="menu-icon">
<!--				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
			</ul>
		</div>
	</div>
	<!-- End Top Menu -->
	
    <!-- Start Navigation -->  
    <nav class="navbar navbar-default navbar-sticky bootsnav">
		<!-- Start Top Search -->
		<div class="top-search">
			<div class="container">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-search"></i></span>
					<input type="text" class="form-control" placeholder="Search">
					<span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				</div>
			</div>
		</div>
		<!-- End Top Search -->
        <div class="container"> 
			<!-- Start Atribute Navigation -->
<!--			<div class="attr-nav">
				<ul>
					<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
				</ul>
			</div>        -->
			<!-- End Atribute Navigation -->
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/site/logo.jpg" class="logo" alt="" width="50" height="65"></a>
            </div>
            <!-- End Header Navigation -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>   
    </nav>
    <!-- End Navigation -->
	
	<div class="clearfix"></div>
	
	<!-- Start Home -->
	<div class="home">
		<div id="bg-home" class="bg-home"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- Start Heading home -->
					<div class="heading-home">
						<h1 class="title">Handover Express</h1>
						<p>
							We are faster, better, and cheaper
						</p>
					</div>
					<!-- End Heading home -->
					<!-- Start Form -->	
					<div class="form-home">
                                            <form id="" action="<?php echo base_url(); ?>home/order_track" method="post">
							<fieldset>
								<legend>Track Your Order</legend>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group require">
											<!--<label for="Name" class="require">Name</label>-->
											<input id="Name" name="tracknumber" type="text" class="form-control validate[required]" placeholder="Tracking number"/>
										</div>
									</div>			
									<div class="col-sm-4">
										<div class="form-group">
											<input id="" type="submit" value="Track Your Order" class="btn btn-primary"/>
										</div>
									</div>			
								</div>  
							</fieldset>
							
<!--							<div class="form-group marginbot-clear">
								<input id="" type="button" value="Track Your Order" class="btn btn-primary"/>
							</div>  -->
						</form>
					</div>	
					<!-- End Form -->	
				</div>
			</div>
		</div>
	</div>
	<!-- End Home -->
	
	<div class="clearfix"></div>
    
	<!-- Start Section -->
	<div class="section dark paddingbot-clear">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<!-- Start Text Icon -->
					<div class="col-icon absolute-left">
						<i class="fa fa-headphones fa-2x"></i>
						<h5 class="normal">Booking courier</h5>
						<p>
							Ei quo odio tation forensibus, legere quidam cu voluptatum vim et, justo tritani mel no. Eius inani theophrastus eam et, ei mea fabulas denique.
						</p>
					</div>
					<!-- End Text Icon -->
				</div>
				<div class="col-sm-4">
					<!-- Start Text Icon -->
					<div class="col-icon absolute-left">
						<i class="fa fa-bicycle fa-2x"></i>
						<h5 class="normal">Delivery Package</h5>
						<p>
							Lorem ipsum dolor sit amet, ex eos commune reprimique. Eu est laudem nostrum salutandi, cum urbanitas efficiendi neglegentur id et mutat recusabo.
						</p>
					</div>
					<!-- End Text Icon -->
				</div>
				<div class="col-sm-4">
					<!-- Start Text Icon -->
					<div class="col-icon absolute-left">
						<i class="fa fa-gift fa-2x"></i>
						<h5 class="normal">Received Package</h5>
						<p>
							Cum ad esse purto contentiones, solet graece ad cum. Sit et choro lucilius partiendo, cu tantas conceptam assueverit qui, et vel munere impedit.
						</p>
					</div>
					<!-- End Text Icon -->
				</div>
			</div>
		</div>
		<div class="triangle margintop10" data-height="85" data-color-bottom="#ffffff" data-color-top="transparent"></div>
	</div>
	<!-- End Section -->
	
	<div class="clearfix"></div>
	
	<!-- Start Section -->
	<div class="section paddingbot-clear">
		<div class="container">
			<!-- Start Heading -->
			<div class="heading marginbot30">
				<h2 class="title">
					<span>Who we are</span>
					Bangladesh courier
				</h2>
			</div>
			<!-- End Heading -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<p class="marginbot30">
						No alia quodsi erroribus mea, sed ut sapientem vituperata, cum sint nibh cu. At vis adhuc delicata, mei at integre sanctus neglegentur. Eu vim graeco mandamus reformidans. Cu esse principes suscipiantur est, ei nec saepe nostrud vocibus. Soleat detracto mei no, no meis brute sed. Nulla nonumes rationibus nec ad, his sumo everti ex, cu quo dolorem nostrum invenire. Ei quo odio tation forensibus, legere quidam cu nec, sea oratio aliquando ei. Posse legere voluptatum vim et, justo tritani mel no. Eius inani theophrastus eam et, ei mea fabulas denique volutpat.
					</p>
<!--					<p class="marginbot55">
						<a href="#" class="margin-right10">
							<img src="<?php echo base_url(); ?>resources/theme/images/google-play.png" alt="">
						</a>
						<a href="#">
							<img src="<?php echo base_url(); ?>resources/theme/images/app-store.png" alt="">
						</a>
					</p>-->
					<img src="<?php echo base_url(); ?>resources/theme/images/bike-image.png" alt="" class="img-responsive img-center">
				</div>
			</div>
		</div>
		<div class="triangle margin-mintop85" data-height="85" data-color-bottom="#f0f2f5" data-color-top="transparent"></div>
	</div>
	<!-- End Section -->
	
	<div class="clearfix"></div>
	
	<!-- Start Section -->
	<div class="section gray paddingbot-clear">
		<div class="container">
			<!-- Start Heading -->
			<div class="heading marginbot50">
				<h2 class="title">
					<span>What we do</span>
					Our services delivery
				</h2>
			</div>
			<!-- End Heading -->
			<!-- Start Content Slider -->
			<div class="wrap-slide">
				<div id="slide1" class="content-slide">
					<div class="item">
						<div class="text-icon-border">
							<span class="icon"><i class="fa fa-clipboard"></i></span>
							<h5 class="title">Document</h5>
							<p>
								Soleat detracto mei no, no meis brute sed. Nulla nonumes rationibus nec ad his sumoibu.
							</p>
						</div>
					</div>
					<div class="item">
						<div class="text-icon-border">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<h5 class="title">Mail</h5>
							<p>
								Lorem ipsum dolor sit amet, ex quidam virtute eum, vel ut eruditi suscipiantur.
							</p>
						</div>
					</div>
					<div class="item">
						<div class="text-icon-border">
							<span class="icon"><i class="fa fa-cubes"></i></span>
							<h5 class="title">Commodity</h5>
							<p>
								At accumsan concludaturque nam, posse apeirian platonem ex usu, mea iriure legendos tractatos.
							</p>
						</div>
					</div>
					<div class="item">
						<div class="text-icon-border">
							<span class="icon"><i class="fa fa-laptop"></i></span>
							<h5 class="title">Electronic</h5>
							<p>
								Et eam mollis interpretaris. Reque accusata salutatus eu cum, eos ex wisi placerat. Eu consul.
							</p>
						</div>
					</div>
					<div class="item">
						<div class="text-icon-border">
							<span class="icon"><i class="fa fa-gears"></i></span>
							<h5 class="title">Services</h5>
							<p>
								Ius eligendi vituperatoribus et, eu est molestie ocurreret. Duo ut summo sapientem expetendis.
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Content Slider -->
		</div>	
	</div>
	<!-- End Section -->
	
	<div class="clearfix"></div>
	 <?php if(!empty($testimonial)){?>
	<!-- Start Section -->
	<div class="section paddingtop-clear paddingbot-clear">
		<div class="parallax" data-background="<?php echo base_url(); ?>resources/theme/images/bg/bg02.jpg" data-jarallax='{"speed": 0.5}'></div>
		<div class="overlay"></div>
		<div class="triangle marginbot50" data-height="85"  data-color-bottom="transparent" data-color-top="#f0f2f5"></div>
		<div class="container content-parallax">
			<!-- Start Heading -->
			<div class="heading marginbot25">
				<h2 class="title">
					<span>Testimonial</span>
					Client said about Handover Express
				</h2>
			</div>
			<!-- End Heading -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- Start Slide -->
					<div class="wrap-single-slide">
						<div class="single-slide">
                                                    <?php foreach($testimonial as $testi){
//                                                                echo '<pre>';
//        print_r($testi);
//        echo '</pre>';
                                                        ?>
							<div class="item">
								<!-- Start Item Testimoni -->
								<div class="item-testimoni">
									<blockquote>
										<?php echo $testi->description; ?>
									</blockquote>
									<div class="author">
										<div class="name">
											<?php echo $testi->name; ?>
										</div>
                                                                            <?php if($testi->image==''){?>
										<img src="<?php echo base_url(); ?>resources/theme/images/people/img01.jpg" alt="">
                                                                            <?php }else{?>
										<img src="<?php echo base_url(); ?>resources/testimonial/<?php echo $testi->image; ?>" alt="">
                                                                            <?php }?>
									</div>
								</div>
								<!-- End Item Testimoni -->
							</div>
                                                    <?php } ?>

						</div>
					</div>
					<!-- End Slide -->
				</div>
			</div>
		</div>
		<div class="triangle margin-mintop20" data-height="85"  data-color-bottom="#ffffff" data-color-top="transparent"></div>
	</div>
	<!-- End Section -->
         <?php } ?>
	<div class="clearfix"></div>
	
	<!-- Start Section -->
	<div class="section paddingbot-clear">
		<div class="container">
			<!-- Start Heading -->
			<div class="heading marginbot50">
				<h2 class="title">
					<span>Pricing table</span>
					Our delivery method
				</h2>
			</div>
			<!-- End Heading -->
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<!-- Start Pricing Table -->
					<div class="wrap-table-price">
						<table class="table-price">
							<tr>
								<th class="no-border"></th>
								<th colspan="6" class="text-center table-heading radius-top-left radius-top-right top">
									Delivery Charge
								</th>
							</tr>
							<tr class="title-table">
								<th class="table-heading radius-top-left table-category">
									AREA
								</th>
								<th>
									DELIVERY NAME


									<span class="small">(0.500)</span>
								</th>
								<th>
									TIMING
									<span class="small"></span>
								</th>
								<th>
									BDT(0.500-1KG)
									<span class="small"></span>
								</th>
								<th>
									WITHOUT BOX
									<span class="small">L+W+H(S+M+L)</span>
								</th>
                                                                <th>
                                                        <tr>
                                                            <th>
                                                                eee
                                                            </th>
                                                            <th>
                                                                eee2
                                                            </th>
                                                        </tr>
                                                                    
									WITH BOX/CARTON
									<span class="small">L+W+H(S+M+L)</span>
								</th>
								<th>
									Urgent
									<span class="small">Return</span>
								</th>
							</tr>                                                                                                                          
							<tr>
								<td class="table-category">
									<h6 class="title">Document</h6>
								</td>
								<td data-title="Day / One way">$12<span>/kg</span></td>
								<td data-title="Day / Return">$25<span>/kg</span></td>
								<td data-title="Standard / One way">$20<span>/kg</span></td>
								<td data-title="Standard / Return">$35<span>/kg</span> </td>
								<td data-title="Urgent / One way">$32<span>/kg</span></td>
								<td data-title="Urgent / Return">$50<span>/kg</span></td>
							</tr>                                                                                                        
							<tr class="tr-gray">
								<td class="table-category">
									<h6 class="title">Commodity</h6>
								</td>
								<td data-title="Day / One way">$2<span>/kg</span></td>
								<td data-title="Day / Return">$4<span>/kg</span></td>
								<td data-title="Standard / One way">$10<span>/kg</span></td>
								<td data-title="Standard / Return">$18<span>/kg</span></td>
								<td data-title="Urgent / One way">$20<span>/kg</span> </td>
								<td data-title="Urgent / Return">$36<span>/kg</span></td>
							</tr>                                                                                                       
							<tr>
								<td class="table-category">
									<h6 class="title">Mail</h6>
								</td>
								<td data-title="Day / One way">$8<span>/kg</span></td>
								<td data-title="Day / Return">$15<span>/kg</span></td>
								<td data-title="Standard / One way">$12<span>/kg</span></td>
								<td data-title="Standard / Return">$20<span>/kg</span></td>
								<td data-title="Urgent / One way">$18<span>/kg</span></td>
								<td data-title="Urgent / Return">$30<span>/kg</span></td>
							</tr>                                                                                                        
							<tr class="tr-gray">
								<td class="table-category">
									<h6 class="title">Electronic</h6>
								</td>
								<td data-title="Day / One way">$30<span>/kg</span></td>
								<td data-title="Day / Return">$56<span>/kg</span></td>
								<td data-title="Standard / One way">$50<span>/kg</span></td>
								<td data-title="Standard / Return">$90<span>/kg</span></td>
								<td data-title="Urgent / One way">$100<span>/kg</span></td>
								<td data-title="Urgent / Return">$180<span>/kg</span></td>
							</tr>
							<tr>
								<td class="table-category">
									<h6 class="title">Money</h6>
								</td>
								<td data-title="Day / One way">$18<span>/kg</span></td>
								<td data-title="Day / Return">$30<span>/kg</span></td>
								<td data-title="Standard / One way">$24<span>/kg</span></td>
								<td data-title="Standard / Return">$40<span>/kg</span></td>
								<td data-title="Urgent / One way">$32kg</td>
								<td data-title="Urgent / Return">$50<span>/kg</span></td>
							</tr>
							<tr class="tr-gray">
								<td class="table-category">
									<h6 class="title">Foods</h6>
								</td>
								<td data-title="Day / One way">$10<span>/kg</span></td>
								<td data-title="Day / Return">$18<span>/kg</span></td>
								<td data-title="Standard / One way">$20<span>/kg</span></td>
								<td data-title="Standard / Return">$32<span>/kg</span></td>
								<td data-title="Urgent / One way">$30<span>/kg</span></td>
								<td data-title="Urgent / Return">$50<span>/kg</span></td>
							</tr>
							<tr>
								<td class="table-category">
									<h6 class="title">Secret document</h6>
								</td>
								<td data-title="Day / One way">$110<span>/kg</span></td>
								<td data-title="Day / Return">$190<span>/kg</span></td>
								<td data-title="Standard / One way">$190<span>/kg</span></td>
								<td data-title="Standard / Return">$300<span>/kg</span></td>
								<td data-title="Urgent / One way">$250<span>/kg</span></td>
								<td data-title="Urgent / Return">$400<span>/kg</span></td>
							</tr>
						</table>
					</div>	
					<!-- End Pricing Table -->
					
					<div class="row">
						<div class="col-sm-6">
							<p>
								<small>*Packages below 1 kg is calculated to be 1kg</small>
							</p>
						</div>
						<div class="col-sm-6 text-right-sm">
							<a href="#" class="btn btn-primary">Booking courier now</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="triangle margintop30" data-height="85"  data-color-bottom="#f0f2f5" data-color-top="transparent"></div>
	</div>
	<!-- End Section -->
	
	<div class="clearfix"></div>
	 <?php if(!empty($team)){?>
	<!-- Start Section -->
	<div class="section gray paddingbot-clear">
		<div class="container">
			<!-- Start Heading -->
			<div class="heading marginbot35">
				<h2 class="title">
					<span>Met our team</span>
					<!--Reliable bike courier-->
				</h2>
			</div>
			<!-- End Heading -->
			<!-- Start Content Slider -->
			<div class="wrap-slide">
				<div id="slide2" class="content-slide team-slide">
                                    <?php if(!empty($team)){
                                        foreach($team as $tRow){
                                        ?>
					<div class="item">
						<!-- Start Team 01 -->
						<div class="team-item">
							<div class="thumb">
                                                            <?php if($tRow->imagename ==''){?>
								<img src="<?php echo base_url(); ?>resources/theme/images/people/team/img01.jpg" alt="">
                                                            <?php }else{?>
								<img src="<?php echo base_url(); ?>resources/user-image/<?php echo $tRow->imagename; ?>" alt="">
                                                                
                                                            <?php }?>
								<div class="option">
<!--									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>-->
								</div>
							</div>
							<h5 class="name"><a href="#"><?php echo $tRow->first_name.' '.$tRow->last_name; ?></a></h5>
							<!--<a href="#">@jack_tarub</a>-->
						</div>
						<!-- End Team 01 -->
					</div>
                                    <?php }} ?>
				</div>
			</div>
			<!-- End Content Slider -->
		</div>	
		<div class="triangle margintop20" data-height="85"  data-color-bottom="#ffffff" data-color-top="transparent"></div>
	</div>
	<!-- End Section -->
         <?php }?>
	
	<div class="clearfix"></div>
	
        <?php if(!empty($partner)){?>
	<!-- Start Section -->
	<div class="section paddingtop-clear">
		<div class="parallax" data-background="<?php echo base_url(); ?>resources/theme/images/bg/bg01.jpg" data-jarallax='{"speed": 0.5}'></div>
		<div class="overlay"></div>
		<div class="triangle marginbot60" data-height="85"  data-color-bottom="transparent" data-color-top="#ffffff"></div>
		<div class="container content-parallax">
			<!-- Start Client -->
			<div class="wrap-client">
				<div class="client-slide">
                                    <?php foreach($partner as $part){?>
					<div class="item">
						<!-- Start Client 01 -->
						<div class="client-item">
							<a href="#">
                                                            <img src="<?php echo base_url(); ?>resources/partner/<?php echo $part->partner_image; ?>" alt="" width="175" height="100">
							</a>
						</div>
						<!-- End Client 01 -->
					</div>
                                    <?php } ?>
					
				</div>
			</div>
			<!-- End Client -->
		</div>
	</div>
	<!-- End Section -->
        <?php } ?>
	
	<div class="clearfix"></div>
                        
<?php
if (isset($footer)) {
    echo $footer;
}
?>