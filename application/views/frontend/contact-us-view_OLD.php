<?php
if (isset($header)) {
    echo $header;
}
?>

<div style="margin-top:53px;">
    <router-outlet></router-outlet><app-contactus _nghost-c2=""><div _ngcontent-c2="">


            <div _ngcontent-c2="" class="hexp">
                <h3 _ngcontent-c2="" class="h1">Contact us </h3>
            </div>

            <div _ngcontent-c2="" class="row">
                <div _ngcontent-c2="" class="col-lg-2 col-md-3 col-sm-3" style="background-color:#F5F5F5;border-right: 1px solid #D9D6D6;">
                    <div _ngcontent-c2="" style="height:85vh;padding:10px; padding-top:10%;">

                        <form  action="<?php echo base_url(); ?>contact_us/contact_email" method="post" class="">
                            <div  class="form-group">
                                <label _ngcontent-c2="" for="">
                                    <?php $this->load->view('error-message-display'); ?>    
                                </label>                                
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" for="name">
                                    Name</label>
                                <input class="form-control" id="name" name="name" placeholder="Enter name" required="required" type="text">
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" for="email">
                                    Email Address</label>
                                <div _ngcontent-c2="" class="input-group">
                                    <span _ngcontent-c2="" class="input-group-addon"><span _ngcontent-c2="" class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input name="email" class="form-control" id="email" placeholder="Enter email" required="required" type="email"></div>
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" for="subject">
                                    Subject</label>
                                <select class="form-control" id="subject" name="subject" required="required">
                                    <option  selected="selected" value="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>


                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" for="name">
                                    Message</label>
                                <textarea class="form-control" cols="12" id="message" name="message" placeholder="Message" required="required" rows="4"></textarea>
                            </div>


                            <button _ngcontent-c2="" class="btn btn-primary" id="btnContactUs" type="submit">
                                Send Message</button>

                        </form>

                        <br _ngcontent-c2=""><br _ngcontent-c2=""><br _ngcontent-c2="">



                        <form _ngcontent-c2="" novalidate="" class="ng-untouched ng-pristine ng-valid">
                            <legend _ngcontent-c2=""><span _ngcontent-c2="" class="glyphicon glyphicon-globe"></span>&nbsp;Our office</legend>
                            <address _ngcontent-c2="">
                                <strong _ngcontent-c2="">Handover Express</strong><br _ngcontent-c2="">
                                225, New elephant road, <br _ngcontent-c2="">
                                Dhaka -1205<br _ngcontent-c2="">
                                <abbr _ngcontent-c2="" title="Phone">P:</abbr>
                                01872-737-757
                            </address>

                        </form>




                    </div>
                </div>
                <div _ngcontent-c2="" class="col-lg-10 col-md-9 col-sm-9" style="padding-left:0px;">
                    <googlemap _ngcontent-c2="">
                        <!--https://www.google.com/maps/place/Bata+Signal+Bus+Stop/@23.736625,90.3861276,16.5z/data=!4m16!1m10!4m9!1m3!2m2!1d90.3851137!2d23.7324036!1m3!2m2!1d90.3871361!2d23.7374632!3e2!3m4!1s0x3755b8b8aa1e1d4f:0x6cd8f5937dd4e45c!8m2!3d23.7390689!4d90.3886682-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5165.134337718387!2d90.38612756783841!3d23.736625025184612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b8aa1e1d4f%3A0x6cd8f5937dd4e45c!2sBata+Signal+Bus+Stop!5e0!3m2!1sen!2sbd!4v1527015449393" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </googlemap>
                </div>

            </div>





        </div>

    </app-contactus>
</div></ng-component></app-root></div></div>

<?php
if (isset($footer)) {
    echo $footer;
}
?>
       