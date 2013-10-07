<link href="<?php echo ADMINCSS_PATH ?>sample.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $("#adsense").validate();
});
</script>
<style type="text/css">
body {
	line-height: 1!important;
}
</style>

<form action="" method="post" id="adsense">
  <div id="content-table-inner">
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
      <tr valign="top">
        <td><!-- start id-form -->
          
          <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
            <tr>
              <th valign="top">Position of ad:</th>
              <td><select class="styledselect_form_1 {required:true,messages:{required:'Please select position'}}" id="ad_position" name="ad_position">
                  <option value="">Select the position</option>
                  <option value="top">Top</option>
                  <option value="right">Right</option>
                  <option value="bottom">Bottom</option>
              </select></td>
              <td></td>
            </tr>
            <tr>
              <th width="126" valign="top">Notes:</th>
              <td width="318"><input type="text" class="inp-form" id="ad_notes" name="ad_notes"></td>
              <td width="410"></td>
            </tr>
            <tr>
              <th valign="top">Code for ad:</th>
              <td><textarea name="ad_code" id="ad_code" cols="" rows="" class="form-textarea {required:true,messages:{required:'Please enter the script'}}"><?php if(isset($ad_form_details)){ echo $ad_form_details->ad_code;} ?></textarea></td>
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
            <ol>
              <?php echo validation_errors(); ?>
            </ol>
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
