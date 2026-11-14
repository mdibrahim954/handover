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
            <li class="active">Approval List</li>
        </ol>




        <div class="tabbable-panel" style="margin-top:20px;">
            <div class="tabbable-line">

                <ul class="nav nav-tabs ">
                    <li class="active">
                        <!--<a data-toggle="tab" href="#tab_default_1">-->
                        <a  href="<?php echo base_url(); ?>admin/user/approval">
                            Approval List </a>
                    </li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="tab_default_1">

                        <div class="content table-responsive table-full-width">
                            
                            <?php $this->load->view('error-message-display'); ?>

                            <!--<table id="example" class="display table" style="width:100%">-->
                            <table id="" class="display table" style="width:100%">
                                <thead>
                                    <tr style="background-color: #5ba3ae">
                                        <th style="width:30px;">Action</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>User Type</th>
                                        <th>User Area</th>
                                        <th>Created on</th>
                                    </tr>
                                </thead>
<!--                                <thead class="filters">
                                    <tr style="background-color: #5ba3ae">
                                        <th style="width:30px;">Action</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>User Type</th>
                                        <th>User Area</th>
                                        <th>Created on</th>
                                    </tr>
                                </thead>-->
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
                                            <td style="width:30px;">
                                                <a href="<?php echo base_url(); ?>admin/user/approved_user/<?php echo $row->userid; ?>" class="btn btn-success">Approve</a>
                                            </td>
                                            <td><?php echo $row->first_name; ?></td>
                                            <td><?php echo $row->last_name; ?></td>
                                            <td><?php echo $row->email; ?></td>
                                            <td><?php echo $row->mobile; ?></td>
                                            <td><?php echo $userType->user_type_name; ?></td>
                                            <td><?php echo $row->address; ?></td>

                                            <td><?php echo $userType->created_at; ?></td>
                                        </tr>
                                        <?php $i++; } } ?>
                                </tbody>
                                </tbody>
<!--                                <tfoot>
                                     <tr style="background-color: #5ba3ae">
                                        <th style="width:30px;">Action</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>User Type</th>
                                        <th>User Area</th>
                                        <th>Created on</th>
                                    </tr>
                                </tfoot>-->
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