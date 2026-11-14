<?php
if (isset($header)) {
    echo $header;
}
?>

<style>
    .error{
        color:red;
    }
</style>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">
    <router-outlet></router-outlet><ng-component>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home"></span> </li>
            <!--<li>Users</li>-->
            <li class="active">Regular Price List</li>
        </ol>
        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <!--                    <li class="active">
                                            <a data-toggle="tab" href="#tab_default_1">
                                            <a  href="<?php echo base_url(); ?>admin/user/rider_list">
                                                All Rider List </a>
                                        </li>-->


                </ul>

                <div class="tab-content">
                    <?php $this->load->view('error-message-display'); ?>
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/delivery_charge/update_regular_price" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" id="invoiceitems"> 
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

                                    Additional Per KG (UP to 5kG)
                                    

                                    <span class="small"></span>

                                    <table width="100%">
                                        <tr class="no-border">
                                            <th class=""><span class="small"><br>Area</span></th>
                                            <th class="text-center"><span class="small">BDT</span></th>

                                        </tr>
                                    </table>
                                </th>
                               
                            </tr>                                                                                                                          


                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name0" value="<?php echo $delivery_name[0]; ?>" ></td>                                
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="timing0" value="<?php echo $timing[0]; ?>" ></td>
                                <td data-title="Standard / Return"><input class="form-control" type="text" name="bdt_kg0" value="<?php echo $bdt_kg[0]; ?>" ></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><input class="form-control" type="text" name="additional_00" value="<?php echo $additional[0][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_01" value="<?php echo $additional[0][1]; ?>" ></td>                                                    
                                        </tr>
                                    </table>
                                </td>
                               
                            </tr>                                                                                                       
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"><input class="form-control" type="text" name="area0" value="<?php echo $area[0]; ?>" ></h6>
                                </td>
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name1" value="<?php echo $delivery_name[1]; ?>" ></td>                                
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="timing1" value="<?php echo $timing[1]; ?>" ></td>
                                <td data-title="Standard / Return"><input class="form-control" type="text" name="bdt_kg1" value="<?php echo $bdt_kg[1]; ?>" ></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><input class="form-control" type="text" name="additional_10" value="<?php echo $additional[1][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_11" value="<?php echo $additional[1][1]; ?>" ></td>                                               
                                        </tr>
                                    </table>
                                </td>
                               
                            </tr>                                                                                                       
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name2" value="<?php echo $delivery_name[2]; ?>" ></td>                                
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="timing2" value="<?php echo $timing[2]; ?>" > </td>
                                <td data-title="Standard / Return"><input class="form-control" type="text" name="bdt_kg2" value="<?php echo $bdt_kg[2]; ?>" ></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><input class="form-control" type="text" name="additional_20" value="<?php echo $additional[2][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_21" value="<?php echo $additional[2][1]; ?>" ></td>                                                
                                        </tr>
                                    </table>
                                </td>
                               
                            </tr>                                                                                                       
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name3" value="<?php echo $delivery_name[3]; ?>" ></td>                                
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="timing3" value="<?php echo $timing[3]; ?>" ></td>
                                <td data-title="Standard / Return"><input class="form-control" type="text" name="bdt_kg3" value="<?php echo $bdt_kg[3]; ?>" ></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr >
                                            <td><input class="form-control" type="text" name="additional_30" value="<?php echo $additional[3][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_31" value="<?php echo $additional[3][1]; ?>" ></td>                                                  
                                        </tr>
                                    </table>
                                </td>
                               
                            </tr>                                                                                                       
                            <tr class="tr-gray" style="border-top: 1px solid #d8d8d8">
                                <td class="table-category">
                                    <h6 class="title"><input class="form-control" type="text" name="area1" value="<?php echo $area[1]; ?>" ></h6>
                                </td>
                                <td></td>
                                
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="timing4" value="<?php echo $timing[4]; ?>" ></td>
                                <td data-title="Standard / Return"><input class="form-control" type="text" name="bdt_kg4" value="<?php echo $bdt_kg[4]; ?>" ></td>
                                <td data-title="">
                                    <table class="no-border" width="100%">
                                        <tr>
                                            <td><input class="form-control" type="text" name="additional_40" value="<?php echo $additional[4][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_41" value="<?php echo $additional[4][1]; ?>" ></td>                                                 
                                        </tr>
                                    </table>
                                </td>
                               
                            </tr>                                                                                                       
                                                                              
                        </table>





                        <div class="form-group">
                            <div class="col-xs-offset-5 col-xs-10">
                                <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPDATE <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div>

        </div></ng-component>


</div>

</div>

</ng-component></app-root></div></div>
<?php
if (isset($footer)) {
    echo $footer;
}
?>