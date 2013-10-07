<link href="<?php echo ADMINCSS_PATH ?>sample.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $("#addeditnewsletter").validate();
});
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
</style>

<form action="" method="post" id="addeditnewsletter">
      <div id="content-table-inner">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th width="126" valign="top">Category:</th>
                        <td width="442"><select id="nl_category" name="nl_category" class="styledselect_form_1 {required:true,messages:{required:'Please select category'}}" title=" ">
                          <option value="">Please select category</option>
                          <?php
                             foreach($newslettercategories as $val){?>
                          <option value="<?php echo $val->nlc_id; ?>" <?php if(isset($nl_form_details)){if($val->nlc_id==$nl_form_details->nl_id){echo 'selected="selected"';}}?>><?php echo $val->nlc_name; ?></option>
                          <?php } ?>
                        </select></td>
                        <td width="286"></td>
                      </tr>
                      <tr>
                        <th valign="top"> Title:</th>
                        <td><input type="text" name="nl_title" id="nl_title" class="inp-form {required:true,messages:{required:'Please enter browser title'}}" value="<?php if(isset($nl_form_details)){ echo $nl_form_details->nl_title;} ?>" /></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top"> Content:</th>
                        <td><textarea name="nl_content" id="nl_content" cols="" rows="" class="form-textarea"><?php if(isset($nl_form_details)){ echo $nl_form_details->nl_content;} ?></textarea>
                        </td>
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