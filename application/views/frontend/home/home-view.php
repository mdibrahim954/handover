<?php
if (isset($header)) {
    echo $header;
}
?>


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
                    Handover Express
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
    <?php if (!empty($testimonial)) { ?>
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
                                <?php
                                foreach ($testimonial as $testi) {
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
                                                <?php if ($testi->image == '') { ?>
                                                    <img src="<?php echo base_url(); ?>resources/theme/images/people/img01.jpg" alt="">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>resources/testimonial/<?php echo $testi->image; ?>" alt="">
                                                <?php } ?>
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
                    <span>Delivery Charge</span>
                    <!--Our delivery method-->
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
                                <th class="table-heading">
                                    DELIVERY NAME


                                    <span class="small">(0.500)</span>
                                </th>
                                <th class="table-heading">
                                    TIMING
                                    <span class="small"></span>
                                </th>
                                <th class="table-heading">
                                    BDT(0.500-1KG)
                                    <span class="small"></span>
                                </th>
                                <th class="table-heading">
                                    WITHOUT BOX
                                    <span class="small">L+W+H(S+M+L)</span>

                                </th>
                                <th class="table-heading">

                                    WITH BOX/CARTON
                                    <span class="small"></span>

                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small">L+W+H(S+M+L)</span></td>
                                            <td><span class="small" style="min-width: 70px">BDT 0.5-1 KG </span></td>

                                        </tr>
                                    </table>
                                </th>
                                <th class="table-heading">                                                               
                                    ADDITIONAL PER KG
                                    <span class="small">(UP TO 5 KG)</span>

                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small">AREA</span></td>
                                            <td><span class="small text-center">BDT</span></td>

                                        </tr>
                                    </table>
                                </th>
                            </tr>                                                                                                                          


                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title=""></td>
                                <td data-title=""></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['24_hours'][0][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['24_hours'][0][0][1]; ?></span></td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['24_hours'][0][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['24_hours'][0][0][3]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>                                                                                                       
                            <tr>
                                <td class="table-category">
                                    <h6 class="title"><span class="small"><?php echo $area[0]; ?></span></h6>
                                </td>
                                <td data-title="Day / One way"><span class="small"><?php echo $delivery_name[0]; ?></span></td>
                                <td data-title="Day / Return"><span class="small"><?php echo $timing[0]; ?></span></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['24_hours'][1][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['24_hours'][1][0][1]; ?></span></td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['24_hours'][1][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['24_hours'][1][0][3]; ?></td>                                                                  
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $additional[0][0]; ?></span></td>
                                            <td><?php echo $additional[0][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>                                                                                                        
                            <tr class="tr-gray" style="border-bottom: 1px solid #d8d8d8">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="" ></td>
                                <td data-title=""></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['24_hours'][2][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['24_hours'][2][0][1]; ?></span></td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['24_hours'][2][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['24_hours'][2][0][3]; ?></td>                                                                           
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title=""></td>
                                <td data-title=""></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['48_hours'][0][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['48_hours'][0][0][1]; ?></span></td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['48_hours'][0][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['48_hours'][0][0][3]; ?></td>                                                                           
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"> <span class="small"><?php echo $area[0]; ?></span></h6>
                                </td>
                                <td data-title="Day / One way"><span class="small"><?php echo $delivery_name[1]; ?></span></td>
                                <td data-title="Day / Return"><span class="small"><?php echo $timing[1]; ?></span></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['48_hours'][1][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['48_hours'][1][0][1]; ?></span></td>
                                <td>
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['48_hours'][1][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['48_hours'][1][0][3]; ?></td>                                                                        
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $additional[1][0]; ?></span></td>
                                            <td><?php echo $additional[1][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="tr-gray" style="border-bottom: 1px solid #d8d8d8">
                                <td class="table-category" style="border-bottom: 1px solid white">
                                    <h6 class="title"></h6>
                                </td>
                                <td></td>
                                <td></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['48_hours'][2][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['48_hours'][2][0][1]; ?></span></td>
                                <td>
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['48_hours'][2][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['48_hours'][2][0][3]; ?></td>                                                                         
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td></td>
                                <td ></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['8_hours'][0][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['8_hours'][0][0][1]; ?></span></td>
                                <td>
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['8_hours'][0][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['8_hours'][0][0][3]; ?></td>                                                                            
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-category">
                                    <h6 class="title"><span class="small"><?php echo $area[0]; ?></span></h6>
                                </td>
                                <td data-title=""><span class="small"><?php echo $delivery_name[2]; ?></span></td>
                                <td data-title="Day / Return"><span class="small"><?php echo $timing[2]; ?></span></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['8_hours'][1][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['8_hours'][1][0][1]; ?></span></td>
                                <td>
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['8_hours'][1][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['8_hours'][1][0][3]; ?></td>                                                                            
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="">
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $additional[2][0]; ?></span></td>
                                            <td><?php echo $additional[2][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td></td>
                                <td></td>
                                <td data-title="Standard / One way"><?php echo $bdt_kg['8_hours'][2][0][0]; ?></td>
                                <td data-title="Standard / Return"><span class="small"><?php echo $bdt_kg['8_hours'][2][0][1]; ?></span></td>
                                <td>
                                    <table>
                                        <tr class="no-border">
                                            <td><span class="small"><?php echo $bdt_kg['8_hours'][2][0][2]; ?></span></td>
                                            <td><?php echo $bdt_kg['8_hours'][2][0][3]; ?></td>                                                                            
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>                                                       
                        </table>
                    </div>	
                    <!-- End Pricing Table -->

                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                                <!--<small>*Packages below 1 kg is calculated to be 1kg</small>-->
                            </p>
                        </div>
                        <div class="col-sm-6 text-right-sm">
                            <!--<a href="#" class="btn btn-primary">Booking courier now</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        <div class="triangle margintop30" data-height="85"  data-color-bottom="#f0f2f5" data-color-top="transparent"></div>
    </div>
    <!-- End Section -->

    <div class="clearfix"></div>
    <!-- Start Section -->
    <div class="section paddingbot-clear">
        <div class="container">

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Start Pricing Table -->
                    <div class="wrap-table-price">
                        <table class="table-price">
                            <tr>
                                <th class="no-border"></th>
                                <th colspan="6" class="text-center table-heading radius-top-left radius-top-right top">
                                    Regular price list for as usual product
                                </th>
                            </tr>
                            <tr class="title-table">
                                <th class="table-heading radius-top-left table-category">
                                    AREA
                                </th>
                                <th class="table-heading">
                                    DELIVERY NAME


                                    <span class="small"> (0.500)</span>
                                </th>
                                <th class="table-heading">
                                    TIMING
                                    <span class="small"></span>
                                </th>
                                <th class="table-heading">
                                    BDT(0.500-1KG)
                                    <span class="small"></span>
                                </th>

                                <th class="table-heading">

                                    Additional Per KG(UP to 5kG)

                                    <span class="small"></span>

                                    <table width="100%">
                                        <tr class="no-border">
                                            <th class="table-heading">Area</th>
                                            <th class="table-heading">BDT</th>

                                        </tr>
                                    </table>
                                </th>

                            </tr>                                                                                                                          


                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"><?php echo $delivery_name2[0]; ?></td>                                
                                <td data-title="Standard / One way"><?php echo $timing2[0]; ?> </td>
                                <td data-title="Standard / Return"><?php echo $bdt_kg2[0]; ?></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><?php echo $additional2[0][0]; ?></td>
                                            <td><?php echo $additional2[0][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>

                            </tr>                                                                                                       
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"><?php echo $area2[0]; ?></h6>
                                </td>
                                <td data-title="Day / One way"><?php echo $delivery_name2[1]; ?></td>                                
                                <td data-title="Standard / One way"><?php echo $timing2[1]; ?> </td>
                                <td data-title="Standard / Return"><?php echo $bdt_kg2[1]; ?></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><?php echo $additional2[1][0]; ?></td>
                                            <td><?php echo $additional2[1][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>

                            </tr>                                                                                                       
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"><?php echo $delivery_name2[2]; ?></td>                                
                                <td data-title="Standard / One way"><?php echo $timing2[2]; ?> </td>
                                <td data-title="Standard / Return"><?php echo $bdt_kg2[2]; ?></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><?php echo $additional2[2][0]; ?></td>
                                            <td><?php echo $additional2[2][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>

                            </tr>                                                                                                       
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"><?php echo $delivery_name2[3]; ?></td>                                
                                <td data-title="Standard / One way"><?php echo $timing2[3]; ?> </td>
                                <td data-title="Standard / Return"><?php echo $bdt_kg2[3]; ?></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><?php echo $additional2[3][0]; ?></td>
                                            <td><?php echo $additional2[3][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>

                            </tr>                                                                                                       
                            <tr class="tr-gray" style="border-top: 1px solid #d8d8d8">
                                <td class="table-category">
                                    <h6 class="title"><?php echo $area2[1]; ?></h6>
                                </td>                                
                                <td></td>                                
                                <td data-title="Standard / One way"><?php echo $timing2[4]; ?> </td>
                                <td data-title="Standard / Return"><?php echo $bdt_kg2[4]; ?></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><?php echo $additional2[4][0]; ?></td>
                                            <td><?php echo $additional2[4][1]; ?></td>                                                     
                                        </tr>
                                    </table>
                                </td>

                            </tr>                                                                                                       

                        </table>
                    </div>	
                    <!-- End Pricing Table -->

                    <div class="row">
                        <div class="col-sm-11">
                            <p>
                                <small>*0.5-1KG regular charge & additional charges will be charged for 1-5KG. In case of over 5KG, the client has to inform us before 1 working day.</small>
                            </p>
                        </div>
                        <div class="col-sm-6 text-right-sm">
                            <!--<a href="#" class="btn btn-primary">Booking courier now</a>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <p><strong>Note: </strong></p>
                            <ol>
                                <li>Cash-on-delivery service are available, and charged a rate of 1% up to BDT 10,000 per order and charged a rate of 2% up to BDT 20,000 per order</li>
                                <li>Return charge will be applicable as half of delivery charge</li>
                                <li><strong>Price list and Package:</strong> Handover Express will provide a list of items for sale through Handover Express those items may be subset of the complete package, as per the description of management any update or change to the package must be notified ahead of time.</li>
                                <li>Product Insurance is available at an additional rate of 1% of product value and must be exercised at time of contract execution.</li>
                            </ol>
                        </div>
                        <div class="col-sm-6 text-right-sm">
                            <!--<a href="#" class="btn btn-primary">Booking courier now</a>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <p><strong>Payment Method: </strong></p>
                            <ol>
                                <li>Cash: We pay cash to our clients if the amount is under BDT 10,000.</li>
                                <li>Online Mobile Banking: We prefer to pay by Bkash, Rocket and other online mobile banking</li>
                                <li>Online Bank Transaction: We prefer online bank transaction and will pay twice a week. For this, you are recommended to have a bank accounts in those banks that Handover Express has accounts.	</li>

                            </ol>
                        </div>
                        <div class="col-sm-6 text-right-sm">
                            <!--<a href="#" class="btn btn-primary">Booking courier now</a>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <p><strong>Make Your Decision Today </strong>
                                Our experienced staffs is quite knowledgeable and always goes the extra miles on behalf of our customers. We bring a complete logistics solution that benefits you to ensure your customer satisfaction through better service. Thus, if you are interested to have our services, we will be happy to assist you. Please contact with the below person for further details.
                                <br><strong>Name: Sheikh Ibne Sabit </strong>
                                <br><strong>Business Development Executive </strong>
                                <br><strong>Phone: 01872-737757</strong>
                                <br><strong>Email: info@handoverexpressbd.com</strong>
                            </p>

                        </div>
                        <div class="col-sm-6 text-right-sm">
                            <!--<a href="#" class="btn btn-primary">Booking courier now</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        <div class="triangle margintop30" data-height="85"  data-color-bottom="#f0f2f5" data-color-top="transparent"></div>
    </div>
    <!-- End Section -->

    <div class="clearfix"></div>
    <?php if (!empty($team)) { ?>
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
                        <?php
                        if (!empty($team)) {
                            foreach ($team as $tRow) {
                                ?>
                                <div class="item">
                                    <!-- Start Team 01 -->
                                    <div class="team-item">
                                        <div class="thumb">
                                            <?php if ($tRow->imagename == '') { ?>
                                                <img src="<?php echo base_url(); ?>resources/theme/images/people/team/img01.jpg" alt="">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>resources/user-image/<?php echo $tRow->imagename; ?>" alt="">

                                            <?php } ?>
                                            <div class="option">
                                                <!--									<ul>
                                                                                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                                                                        </ul>-->
                                            </div>
                                        </div>
                                        <h5 class="name"><a href="#"><?php echo $tRow->first_name . ' ' . $tRow->last_name; ?></a></h5>
                                        <!--<a href="#">@jack_tarub</a>-->
                                    </div>
                                    <!-- End Team 01 -->
                                </div>
                            <?php }
                        }
                        ?>
                    </div>
                </div>
                <!-- End Content Slider -->
            </div>	
            <div class="triangle margintop20" data-height="85"  data-color-bottom="#ffffff" data-color-top="transparent"></div>
        </div>
        <!-- End Section -->
<?php } ?>

    <div class="clearfix"></div>

<?php if (!empty($partner)) { ?>
        <!-- Start Section -->
        <div class="section paddingtop-clear">
            <div class="parallax" data-background="<?php echo base_url(); ?>resources/theme/images/bg/bg01.jpg" data-jarallax='{"speed": 0.5}'></div>
            <div class="overlay"></div>
            <div class="triangle marginbot60" data-height="85"  data-color-bottom="transparent" data-color-top="#ffffff"></div>
            <div class="container content-parallax">
                <!-- Start Client -->
                <div class="wrap-client">
                    <div class="client-slide">
    <?php foreach ($partner as $part) { ?>
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