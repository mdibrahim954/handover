<?php
//echo '<pre>';
//print_r($deliveryMan);
//echo '</pre>';
?> 
<div class="alert alert-success">
  <strong>Success!</strong>
</div>
<table _ngcontent-c2="" class="table table-sm table-hover table-bordered orderDetails">
    <thead _ngcontent-c2="">
        <tr _ngcontent-c2="">
            <th _ngcontent-c2="">#</th>
            <th _ngcontent-c2="">Pickup Man</th>
            <th _ngcontent-c2="">Remarks</th>
            <th _ngcontent-c2="" style="text-align:center">Assigned On</th>
            <th _ngcontent-c2="" style="text-align:center">Action</th>
        </tr>
    </thead>
    <tbody _ngcontent-c2="">
        <?php 
        $sl_pMan=1;
        foreach($pickupMan as $row){
            $pManInfo=$this->db
                    ->select('*')
                    ->where('userid',$row->user_id)
                    ->get('users')
                    ->row();
            ?>
         <tr _ngcontent-c2="">
            <td _ngcontent-c2=""><?php echo $sl_pMan; ?></td>
            <td _ngcontent-c2=""><?php echo $pManInfo->first_name.' '.$pManInfo->last_name; ?></td>
            <td _ngcontent-c2=""><?php echo $row->remarks; ?></td>
            <td _ngcontent-c2="" style="text-align:center"><?php echo $row->created_at; ?></td>
            <?php if($this->session->userdata('menu_permission')==1){?>
            <td _ngcontent-c2="" style="text-align:center"><a class="btn btn-danger">Delete</a></td>
                            <?php } ?>
        </tr>    
        <?php $sl_pMan++; } ?>
    </tbody>
</table>