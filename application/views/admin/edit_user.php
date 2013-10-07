<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>demos.css">

<script type="text/javascript" charset="utf-8">
$(function() {
    $( "#usr_dob" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
});

$(document).ready(function() {
    $("#userRegistration").validate();
	generate_states();
});

function generate_states()
{
	var country = $('#usr_country').val();
	$('#usr_state').html('Progressing...');
	var state = '<?php echo $user_form_details->usr_state ?>';
	
	$.ajax({
		url: '<?php echo ROOT_FOLDER?>administrator/getAllStatesByCountry/'+country,
		success: function(states)
		{
			$('#usr_state').html(states);
			if(state!='')
			{
				$("#usr_state").val('<?php echo $user_form_details->usr_state ?>').attr('selected',true);
			}
		}
	});
}
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
</style>

<!-- start content-outer -->

<div id="content-outer"> 
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Edit User</h1>
    </div>
    <form action="" method="post" id="userRegistration">
      <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
          <th rowspan="3" class="sized"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
          <th class="topleft"></th>
          <td id="tbl-border-top">&nbsp;</td>
          <th class="topright"></th>
          <th rowspan="3" class="sized"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
        </tr>
        <tr>
          <td id="tbl-border-left"></td>
          <td><!--  start content-table-inner -->
            <?php echo print_r($user_form_details)?>
            <div id="content-table-inner">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th width="126" valign="top">First name:</th>
                        <td><input type="text" name="usr_fname" id="usr_fname" class="inp-form {required:true,messages:{required:'Please enter first name'}}" value="<?php echo $user_form_details->usr_fname ?>" /></td>
                        <td width="286"></td>
                      </tr>
                      <tr>
                        <th valign="top">Last name:</th>
                        <td><input type="text" name="usr_lname" id="usr_lname" class="inp-form {required:true,messages:{required:'Please enter  last name'}}" value="<?php echo $user_form_details->usr_lname ?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th>Sex</th>
                        <td>
                        <select id="usr_gender" name="usr_gender" class="styledselect_form_1 {required:true,messages:{required:'Please select sex'}}" title=" ">
                        	<option value="">Select Sex</option>
                            <?php
                             foreach($sex as $val){?>
                            <option value="<?php echo $val->ug_id; ?>" <?php if($user_form_details->usr_gender==$val->ug_id){echo 'selected="selected"';} ?>><?php echo $val->ug_name; ?></option>
                            <?php } ?>
                        </select>
                        </td>
                        <td width="286">&nbsp;</td>
                        <td width="291"><label for="usr_gender" generated="true" class="error" style="display:none;">Please choose your gender</label></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <th valign="top">E-Mail:</th>
                        <td><input type="text" name="usr_email" id="usr_email" class="inp-form {required:true,email:true,messages:{required:'Please enter your E-Mail address'}}" value="<?php echo $user_form_details->usr_email ?>" /></td>
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
                        <td><input type="text" name="usr_mobile" id="usr_mobile" class="inp-form {required:true,messages:{required:'Please enter your Mobile number'}}"  value="<?php echo $user_form_details->usr_mobile ?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">Website:</th>
                        <td><input type="text" name="usr_website" id="usr_website" class="inp-form {url:true}" value="<?php echo $user_form_details->usr_website ?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">Country:</th>
                        <td>
                        <select name="usr_country" id="usr_country" onchange="generate_states();" class="styledselect_form_1 {required:true,messages:{required:'Please select your country'}}">
                        <option value="">Select your country</option>
                        <?php foreach($countries as $val){?>
                        <option value="<?php echo $val->country?>" <?php if($user_form_details->usr_country==$val->country){echo 'selected="selected"';} ?>><?php echo $val->title?></option>
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
                        <td><input type="text" name="usr_city" id="usr_city" class="inp-form {required:true,messages:{required:'Please enter your city'}}" value="<?php echo $user_form_details->usr_city ?>" /></td>
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
            
            <!--  end content-table-inner  --></td>
          <td id="tbl-border-right"></td>
        </tr>
        <tr>
          <th class="sized bottomleft"></th>
          <td id="tbl-border-bottom">&nbsp;</td>
          <th class="sized bottomright"></th>
        </tr>
      </table>
    </form>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

<div class="clear">&nbsp;</div>
</body></html>