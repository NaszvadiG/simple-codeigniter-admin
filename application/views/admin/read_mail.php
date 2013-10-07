<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>demos.css">

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $("#readMail").validate();
});
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
</style>

<!-- start content-outer -->

<form action="" method="post" id="readMail">
      <div id="content-table-inner">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th width="126" valign="top">User's Name:</th>
                        <td width="442"><?php echo $mail->cm_name?></td>
                        <td width="286"></td>
                      </tr>
                      <tr>
                        <th valign="top">E-Mail:</th>
                        <td><?php echo $mail->cm_email?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">Subject:</th>
                        <td><?php echo $mail->cm_subject?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th valign="top">Message:</th>
                        <td colspan="2"><?php echo $mail->cm_message?></td>
                      </tr>
                    </table>
                    
                    <!-- end id-form  --></td>
                  <td>&nbsp;</td>
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