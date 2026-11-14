<!DOCTYPE html>
<html>
<body>

<h2>Password Recovery</h2>

<table style="width:100%">

  <tr>
      <td>Hi, <b><?php echo $first_name.' '.$last_name; ?></b></td>
  </tr>
  <tr>
      <td>
          <br>
          <a href="<?php echo base_url(); ?>forgot_password/reset_passwod/121-456-<?php echo $user_id; ?>" style="text-decoration: none;">Click here for password recovery.</a>
          <br>
      </td>
  </tr>
  <tr>
      <td>
          <b>
          <br>
          Thanks<br>
          Handover Express<br>
          Mob: 01872-737-757<br>
          <br>
          </b>
          <img src="<?php echo base_url(); ?>resources/images/logo.jpg" width="150"/>
          
      </td>
  </tr>
</table>

</body>
</html>
