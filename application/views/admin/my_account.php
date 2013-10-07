<link href="<?php echo ADMINCSS_PATH ?>sample.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $("#myaccount").validate();
});
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
</style>

<!-- start content-outer -->

<form action="" method="post" id="myaccount">
      <div id="content-table-inner">
			
            <?php if(isset($status['result'])&&$status['result']=='1'){?>
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo  $status['message'] ?></td>
					<td class="green-right"><a class="close-green"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->
			<?php } ?>
             
            <?php if(isset($status['result'])&&$status['result']=='0'){?>
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left"><?php echo  $status['message'] ?></td>
					<td class="red-right"><a class="close-red"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->
			<?php } ?>
            
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th width="126" valign="top">Admin Name:</th>
                        <td width="442"><input type="text" name="adm_name" id="adm_name" class="inp-form {required:true,messages:{required:'Please enter your name'}}" value="<?php if(isset($myaccount)){ echo $myaccount->adm_name;} ?>" /></td>
                        <td width="286"></td>
                      </tr>
                      <tr>
                        <th valign="top">Admin Email:</th>
                        <td><input type="text" name="adm_email" id="adm_email" class="inp-form {required:true,messages:{required:'Please enter your email'}}" value="<?php if(isset($myaccount)){ echo $myaccount->adm_email;} ?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">Admin Password:</th>
                        <td><input type="text" name="adm_pwd" id="adm_pwd" class="inp-form {required:true,messages:{required:'Please enter password'}}" value="" /></td>
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
    </form>
<!--  end content-outer -->

<div class="clear">&nbsp;</div>
</body></html>