<script type="text/javascript" src="<?php echo JS_PATH ?>common.js"></script>
<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>demos.css">

<script type="text/javascript" charset="utf-8">
$(function() {
    $( "#usr_dob" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
});

$(document).ready(function() {
    $("#userRegistration").validate();
});
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
</style>

<form action="" method="post" id="userRegistration">
  <!--  start content-table-inner -->  
    <div id="content-table-inner">
      <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr valign="top">
          <td><!-- start id-form -->
            
            <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
              <tr>
                <th width="126" valign="top">First name:</th>
                <td><input type="text" name="usr_fname" id="usr_fname" class="inp-form {required:true,messages:{required:'Please enter first name'}}" /></td>
                <td width="286"></td>
              </tr>
              <tr>
                <th valign="top">Last name:</th>
                <td><input type="text" name="usr_lname" id="usr_lname" class="inp-form {required:true,messages:{required:'Please enter  last name'}}" /></td>
                <td></td>
              </tr>
              <?php /*?><tr>
                <th valign="top">Date of Birth:</th>
                <td colspan="5" class="noheight"><input type="text" name="usr_dob" id="usr_dob" class="inp-form {required:true,messages:{required:'Please enter date of birth'}}" readonly /></td>
                <td></td>
              </tr><?php */?>
              <tr>
                <th>Gender</th>
                <td><select id="usr_gender" name="usr_gender" class="styledselect_form_1 {required:true,messages:{required:'Please select sex'}}" title=" ">
                            <?php
                             foreach($sex as $val){?>
                            <option value="<?php echo $val->ug_id; ?>"><?php echo $val->ug_name; ?></option>
                            <?php } ?>
                        </select></td>
                <td>&nbsp;</td>
              </tr>
              <?php /*?><tr>
                <th>Profile Picture:</th>
                <td colspan="5"><input type="file" class="file_1" /></td>
                <td><div class="bubble-left"></div>
                  <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
                  <div class="bubble-right"></div></td>
              </tr><?php */?>
              <tr>
                <th valign="top">E-Mail:</th>
                <td><input type="text" name="usr_email" id="usr_email" class="inp-form {required:true,email:true,messages:{required:'Please enter your E-Mail address'}}" /></td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Password:</th>
                <td><input type="password" name="usr_password" id="usr_password" class="inp-form {required:true,messages:{required:'Please enter the password'}}" /></td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Confirm Password:</th>
                <td><input type="password" name="usr_pass_confi" id="usr_pass_confi" class="inp-form {required:true,equalTo:'#usr_password',messages:{required:'Please confirm the password'}}" /></td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Mobile:</th>
                <td><input type="text" name="usr_mobile" id="usr_mobile" class="inp-form {required:true,messages:{required:'Please enter your Mobile number'}}" /></td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Website:</th>
                <td><input type="text" name="usr_website" id="usr_website" class="inp-form {url:true}" /></td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">Country:</th>
                <td>
                <select name="usr_country" id="usr_country" onchange="generate_states();" class="styledselect_form_1 {required:true,messages:{required:'Please select your country'}}">
                <option value="">Select your country</option>
                <?php foreach($countries as $val){?>
                <option value="<?php echo $val->country?>"><?php echo $val->title?></option>
                <?php } ?>
                </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">State:</th>
                <td>                 
                <select name="usr_state" id="usr_state" class="styledselect_form_1 {required:true,messages:{required:'Please select your country'}}">
                <option value="">Select your state</option>
                </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <th valign="top">City:</th>
                <td><input type="text" name="usr_city" id="usr_city" class="inp-form {required:true,messages:{required:'Please enter your city'}}" /></td>
                <td></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td valign="top"><input type="submit" value="" class="form-submit" />
                  <input type="reset" value="" class="form-reset"  /></td>
                <td></td>
              </tr>
            </table>
            
            <!-- end id-form  --></td>
          <td><div class="container" <?php if(isset($validation_errors)){?>style="display: block;"<?php }else{?>style="display: none;"<?php }?>>
<h4 style="color:#000;font-style:normal;">Please correct the following errors.</h4>
<ol><?php echo validation_errors(); ?></ol>
</div></td>
        </tr>
        <tr>
          <td><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/blank.gif" width="695" height="1" alt="blank" /></td>
          <td></td>
        </tr>
      </table>
      <div class="clear"></div>
    </div>
    <!--  end content-table-inner  -->
   </form>
