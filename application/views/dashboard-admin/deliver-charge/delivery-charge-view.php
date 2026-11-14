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
            <li class="active">Deliver Charge</li>
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
                    <form class="form-horizontal" action="<?php echo base_url(); ?>admin/delivery_charge/update_delivery_charge" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered" id="invoiceitems"> 
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

                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small">L+W+H (S+M+L)</span></td>
                                            <td><span class="small" style="min-width: 60px">BDT 0.5-1 KG </span></td>

                                        </tr>
                                    </table>
                                </th>
                                <th class="table-heading">                                                               
                                    ADDITIONAL PER KG
                                    <span class="small">(UP TO 5 KG)</span>

                                    <table width="100%">
                                        <tr class="text-center">
                                            <td><span class="small">AREA</span></td>
                                            <td class="text-center"><span class="small">BDT</span></td>

                                        </tr>
                                    </table>
                                </th>
                            </tr>                                                                                                                          


                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"></td>
                                <td data-title="Day / Return"></td>
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="24_hours_000" value="<?php echo $bdt_kg['24_hours'][0][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="24_hours_001" value="<?php echo $bdt_kg['24_hours'][0][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="24_hours_002" value="<?php echo $bdt_kg['24_hours'][0][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="24_hours_003" value="<?php echo $bdt_kg['24_hours'][0][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
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
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name0" value="<?php echo $delivery_name[0]; ?>" > </td>
                                <td data-title="Day / Return"><input class="form-control" type="text" name="timing0" value="<?php echo $timing[0]; ?>" ></td>
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="24_hours_100" value="<?php echo $bdt_kg['24_hours'][1][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="24_hours_101" value="<?php echo $bdt_kg['24_hours'][1][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="24_hours_102" value="<?php echo $bdt_kg['24_hours'][1][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="24_hours_103" value="<?php echo $bdt_kg['24_hours'][1][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><input class="form-control" type="text" name="additional_00" value="<?php echo $additional[0][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_01" value="<?php echo $additional[0][1]; ?>" ></td>                                                 
                                        </tr>
                                    </table>
                                </td>
                            </tr>                                                                                                        
                            <tr class="tr-gray" style="border-bottom: 1px solid #d8d8d8">
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way" ></td>
                                <td data-title="Day / Return"></td>
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="24_hours_200" value="<?php echo $bdt_kg['24_hours'][2][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="24_hours_201" value="<?php echo $bdt_kg['24_hours'][2][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="24_hours_202" value="<?php echo $bdt_kg['24_hours'][2][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="24_hours_203" value="<?php echo $bdt_kg['24_hours'][2][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
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
                                <td data-title="Day / One way"></td>
                                <td data-title="Day / Return"></td>
                                <td data-title="Standard / One way"><input class="form-control" type="text" name="48_hours_000" value="<?php echo $bdt_kg['48_hours'][0][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="48_hours_001" value="<?php echo $bdt_kg['48_hours'][0][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="48_hours_002" value="<?php echo $bdt_kg['48_hours'][0][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="48_hours_003" value="<?php echo $bdt_kg['48_hours'][0][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="tr-gray">
                                <td class="table-category">
                                    <h6 class="title"> <input class="form-control" type="text" name="area0" value="<?php echo $area[0]; ?>" ></h6>
                                </td>
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name1" value="<?php echo $delivery_name[1]; ?>" ></td>
                                <td data-title="Day / Return"><input class="form-control" type="text" name="timing1" value="<?php echo $timing[1]; ?>" ></td>
                                 <td data-title="Standard / One way"><input class="form-control" type="text" name="48_hours_100" value="<?php echo $bdt_kg['48_hours'][1][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="48_hours_101" value="<?php echo $bdt_kg['48_hours'][1][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="48_hours_102" value="<?php echo $bdt_kg['48_hours'][1][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="48_hours_103" value="<?php echo $bdt_kg['48_hours'][1][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                 <td data-title="Urgent / Return">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><input class="form-control" type="text" name="additional_10" value="<?php echo $additional[1][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_11" value="<?php echo $additional[1][1]; ?>" ></td>                                                      
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="tr-gray" style="border-bottom: 1px solid #d8d8d8">
                                <td class="table-category" style="border-bottom: 1px solid white">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"></td>
                                <td data-title="Day / Return"></td>
                                 <td data-title="Standard / One way"><input class="form-control" type="text" name="48_hours_200" value="<?php echo $bdt_kg['48_hours'][2][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="48_hours_201" value="<?php echo $bdt_kg['48_hours'][2][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="48_hours_202" value="<?php echo $bdt_kg['48_hours'][2][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="48_hours_203" value="<?php echo $bdt_kg['48_hours'][2][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                               
                                 <td data-title="Urgent / Return">
                                    <table width="100%">
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
                                <td data-title="Day / One way"></td>
                                <td data-title="Day / Return"></td>
                               <td data-title="Standard / One way"><input class="form-control" type="text" name="8_hours_000" value="<?php echo $bdt_kg['8_hours'][0][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="8_hours_001" value="<?php echo $bdt_kg['8_hours'][0][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="8_hours_002" value="<?php echo $bdt_kg['8_hours'][0][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="8_hours_003" value="<?php echo $bdt_kg['8_hours'][0][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
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
                                <td data-title="Day / One way"><input class="form-control" type="text" name="delivery_name2" value="<?php echo $delivery_name[2]; ?>" ></td>
                                <td data-title="Day / Return"><input class="form-control" type="text" name="timing2" value="<?php echo $timing[2]; ?>" ></td>
                               <td data-title="Standard / One way"><input class="form-control" type="text" name="8_hours_100" value="<?php echo $bdt_kg['8_hours'][1][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="8_hours_101" value="<?php echo $bdt_kg['8_hours'][1][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="8_hours_102" value="<?php echo $bdt_kg['8_hours'][1][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="8_hours_103" value="<?php echo $bdt_kg['8_hours'][1][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><input class="form-control" type="text" name="additional_20" value="<?php echo $additional[2][0]; ?>" ></td>
                                            <td><input class="form-control" type="text" name="additional_21" value="<?php echo $additional[2][1]; ?>" ></td>                                                      
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-category">
                                    <h6 class="title"></h6>
                                </td>
                                <td data-title="Day / One way"></td>
                                <td data-title="Day / Return"></td>
                                 <td data-title="Standard / One way"><input class="form-control" type="text" name="8_hours_200" value="<?php echo $bdt_kg['8_hours'][2][0][0]; ?>" ></td>
                                <td data-title="Standard / Return"><span class="small"><input class="form-control" type="text" name="8_hours_201" value="<?php echo $bdt_kg['8_hours'][2][0][1]; ?>" ></span></td>
                                <td data-title="Urgent / One way">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td><span class="small"><input class="form-control" type="text" name="8_hours_202" value="<?php echo $bdt_kg['8_hours'][2][0][2]; ?>" ></span></td>
                                            <td><input class="form-control" type="text" name="8_hours_203" value="<?php echo $bdt_kg['8_hours'][2][0][3]; ?>" ></td>                                                     
                                        </tr>
                                    </table>
                                </td>
                                <td data-title="Urgent / Return">
                                    <table width="100%">
                                        <tr class="no-border">
                                            <td></td>
                                            <td></td>                                                     
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