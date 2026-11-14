<?php
if (isset($header)) {
    echo $header;
}
?>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">


    <router-outlet></router-outlet><ng-component>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home"></span> </li>
            <li>Users</li>
            <li class="active">User List</li>
        </ol>
        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <!--<a data-toggle="tab" href="#tab_default_1">-->
                        <a  href="<?php echo base_url(); ?>admin/user/rider_list">
                            All Rider List </a>
                    </li>
                    
                    <li style="float:right;">
                        <a href="<?php echo base_url(); ?>admin/user"><i aria-hidden="true" class="fa fa-user-plus" style="font-size:20px;cursor:pointer;" tabindex="0"></i></a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="content table-responsive table-full-width">
                            <table id="example" class="display table" style="width:100%">
                                <thead>
                                    <tr style="background-color: #5ba3ae">
                                        <!--<th>SL#</th>-->
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Photo</th>
                                        <th>CV</th>
                                        <th>User Type</th>
                                        <th>User Area</th>
                                        <th>Created on</th>
                                        <th style="width:30px;">Action</th>
                                    </tr>
                                </thead>
                                <thead class="filters">
                                    <tr style="background-color: #5ba3ae">
                                         <!--<th>SL#</th>-->
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Photo</th>
                                        <th>CV</th>
                                        <th>User Type</th>
                                        <th>User Area</th>
                                        <th>Created on</th>
                                        <th style="width:30px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    foreach ($userlist as $row) {
                                        if($row->email !='mehedi.hasan.bappi01@gmail.com'){
                                        $user_typeid = $row->user_type_id;
                                        $userType = $this->db
                                                ->where('user_type_id', $user_typeid)
                                                ->get('user_type')
                                                ->row();
                                        ?>
                                        <tr>
                                            <!--<td><?php // echo $i; ?></td>-->
                                            <td><?php echo $row->first_name; ?></td>
                                            <td><?php echo $row->last_name; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->mobile; ?></td>
                                            <td><?php
                                            if($row->imagename !=''){ ?>
                                                <img src="<?php echo base_url(); ?>resources/user-image/<?php echo $row->imagename ?>" width="80" />
                                            <?php }else{ ?>
                                                <img src="<?php echo base_url(); ?>resources/images/nouser.png" width="80" />
                                                
                                           <?php }
                                            ?></td>
                                            <td>
                                                <?php if ($row->your_cv != '') { ?>
                                                <a class="btn btn-success" href="<?php echo base_url(); ?>resources/cv/<?php echo $row->your_cv; ?>" target="_blank" >Download</a>
                                                        <?php } else { ?>                                                
                                                        <?php } ?>
                                            </td>
                                            <td><?php echo $userType->user_type_name; ?></td>
                                            <td><?php echo $row->address; ?></td>

                                            <td><?php echo $userType->created_at; ?></td>
                                            <td style="width:30px;">
                                                <div class="dropdown" style="width:15px;">
                                                    <i aria-hidden="true" class="fa fa-bars" data-toggle="dropdown" style="font-size:20px;cursor:pointer;"></i>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="<?php echo base_url(); ?>admin/user/rider_edit/<?php echo $row->userid; ?>">Edit User</a></li>
                                                        <?php if($this->session->userdata('menu_permission')==1){?>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php echo base_url(); ?>admin/user/delete_rider/<?php echo $row->userid; ?>" onclick="return confirm('Are you sure you want to delete?');">Delete</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="<?php echo base_url(); ?>admin/user/delete_rider/<?php echo $row->userid; ?>" onclick="return confirm('Are you sure you want to delete?');">Deactivate</a></li>
                                                    <?php } ?>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; } } ?>
                                </tbody>
                                </tbody>
                                <tfoot>
                                    <tr style="">
                                        <!--<th>SL#</th>-->
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Photo</th>
                                        <th>CV</th>
                                        <th>User Type</th>
                                        <th>User Area</th>
                                        <th>Created on</th>
                                        <th style="width:30px;">Action</th>
                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>

                 

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