<script type="text/javascript" src="<?php echo JS_PATH?>common.js"></script>
<script>
$(document).ready(function(){
	$("#myprofile").validate();
});
</script>

<form action="<?php echo ROOT_FOLDER?>user/updateprofile" id="myprofile" method="post">
<fieldset>
  <legend>My Profile</legend>
  <table width="513" border="0" align="center">
    <tbody>
      <tr>
        <td width="140">First Name</td>
        <td colspan="2"><input type="text" id="usr_fname" name="usr_fname" class="required" title=" " value="<?php echo $userdetails->usr_fname ?>"></td>
        </tr>
      <tr>
        <td width="140">Last Name</td>
        <td colspan="2"><input type="text" id="usr_lname" name="usr_lname" class="required" title=" " value="<?php echo $userdetails->usr_lname ?>"></td>
        </tr>
      <?php /*?><tr>
        <td>Email</td>
        <td colspan="2"><input type="text" id="usr_email" name="usr_email" class="required email" disabled="disabled" title=" " value="<?php echo $userdetails->usr_email ?>" /></td>
      </tr><?php */?>
      <tr>
        <td>Password</td>
        <td colspan="2"><input type="password" id="usr_password" name="usr_password" class="required" title=" " value="" /></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td colspan="2"><input type="password" id="usr_confi_password" name="usr_confi_password" equalTo="#usr_password" class="required" title=" " value="" /></td>
      </tr>
      <tr>
        <td>Mobile</td>
        <td colspan="2"><input type="text" id="usr_mobile" name="usr_mobile" class="required" number="true" minlength="10" maxlength="10" title=" " value="<?php echo $userdetails->usr_mobile ?>"></td>
        </tr>
      <tr>
        <td>Gender</td>
        <td colspan="2">
        	<select id="usr_gender" name="usr_gender" class="required" title=" ">
                <option value="">Select Sex</option>
                <?php
				 foreach($sex as $val){?>
                <option value="<?php echo $val->ug_id; ?>" <?php if($userdetails->usr_gender==$val->ug_id){echo 'selected="selected"';} ?>><?php echo $val->ug_name; ?></option>
                <?php } ?>
        	</select>
       	</td>
        </tr>
      <tr>
        <td>School/College</td>
        <td colspan="2"><input type="text" id="usr_school" name="usr_school" value="<?php echo $userdetails->usr_school ?>"></td>
        </tr>
      <tr>
        <td>Country</td>
        <td colspan="2"><select id="usr_country" name="usr_country" class="required" title=" ">
          <option value="">Select Country</option>
          <?php
             foreach($countries as $val){?>
          <option value="<?php echo $val->country; ?>" <?php if($userdetails->usr_country==$val->country){echo 'selected="selected"';} ?>><?php echo $val->title; ?></option>
          <?php } ?>
        </select></td>
        </tr>
      <tr>
        <td>State</td>
        <td colspan="2"><select id="usr_state" name="usr_state" class="required" title=" ">
        </select></td>
        </tr>
      <tr>
        <td>City</td>
        <td colspan="2"><input type="text" id="usr_city" name="usr_city" class="required" title=" " value="<?php echo $userdetails->usr_city ?>"></td>
        </tr>
      <tr>
        <td>Pin</td>
        <td colspan="2"><input type="text" id="usr_pin" name="usr_pin" value="<?php echo $userdetails->usr_pin ?>"></td>
        </tr>
      <tr>
        <td width="140">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="167"><input type="submit" value="Submit"></td>
        <td width="187">&nbsp;</td>
        <td width="1">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</fieldset>
</form>