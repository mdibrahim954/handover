<?php
if (isset($header)) {
    echo $header;
}
?>
                        <div style="margin-top:53px;">
                            <router-outlet></router-outlet><ng-component _nghost-c0="">
                                <div _ngcontent-c0="" class="bkpattern" style="height:95vh;">

                                    <div _ngcontent-c0="" class="container">
                                        <!----><div _ngcontent-c0="" style="margin-top:25%;"></div>       

                                        <div _ngcontent-c0="" style="max-width:600px;margin:10px auto; margin-top:30px;padding:50px;background-color:#F3F3F3;border-radius:4px;">


                                            <form _ngcontent-c0="" class="form-inline" action="<?php echo base_url(); ?>home/order_track" method="post" style="text-align:center;">
                                                <div _ngcontent-c0="" class="form-group">
                                                    <div _ngcontent-c0="" class="input-group">
                                                        <span _ngcontent-c0="" class="input-group-addon"><i _ngcontent-c0="" aria-hidden="true" class="fa fa-truck" style="font-size:22px;"></i></span>
                                                        <input _ngcontent-c0="" class="form-control tracknumber ng-untouched ng-pristine ng-invalid" name="tracknumber" id="tracknumber" placeholder="Tracking number" style="height:45px;" type="text" required="">
                                                    </div>
                                                </div>

                                                <input _ngcontent-c0="" class="btn btn-success" style="height:45px;" value="Track Your Order" type="submit">
                                                <!----> 
                                            </form>    


                                        </div>


                                        <!---->


                                        <!---->

                                    </div>
                                </div>
                            </ng-component>
                        </div></ng-component></app-root></div></div>
                        
<?php
if (isset($footer)) {
    echo $footer;
}
?>