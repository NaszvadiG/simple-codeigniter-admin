<script>
$(document).ready(function(){
	$("#contactus").validate();
});
</script>

<form action="" id="contactus" method="post">
<fieldset>
  <legend>Contact Us</legend>
  <table width="513" border="0" align="center">
    <tbody>
      <tr>
        <td colspan="3" class="bigtd"><i>Your feedback is very valuable to us. Tell us what you  like and dislike on us and you can also request any new future. Thanks.</i> - Postman</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td>Mail Type</td>
        <td colspan="2">
        	<select id="fb_type" name="fb_type" class="required" title=" ">
                <option value="">Select Mail Type</option>
                <?php
				 foreach($types as $val){?>
                <option value="<?php echo $val->fbt_id; ?>"><?php echo $val->fbt_type; ?></option>
                <?php } ?>
        	</select>
       	</td>
        </tr><tr>
        <td>Subject</td>
        <td colspan="2">
        	<input type="text" name="fb_subject" id="fb_subject" class="required" title=" " />
       	</td>
        </tr>
      <tr>
        <td>Message</td>
        <td colspan="2"><textarea name="fb_message" id="fb_message" cols="35" rows="5" title=" " class="required"></textarea></td>
        </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="187"><input type="submit" value="Submit"></td>
        <td width="187">&nbsp;</td>
        <td width="1">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</fieldset>
</form>