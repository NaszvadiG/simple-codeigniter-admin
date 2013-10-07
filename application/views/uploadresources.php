<script type="text/javascript">
function addmore()
{
	var row = '<tr><td><input name="subject[]" type="text" /></td><td><input name="file[]" type="file" /></td><td>&nbsp;</td></tr>';
	$(".fileupload").append(row);
}
</script>

<fieldset>
  <legend>Upload Resources</legend>
  <div id="content">
    <table>
      <tr valign="top">
        <td><form action="<?php echo ROOT_FOLDER?>upload/uploadfiles" id="uploadfiles" method="post" enctype="multipart/form-data">
            <table width="200" border="0">
              <tr>
                <td><h3>Subject</h3></td>
                <td><h3>Material</h3></td>
                <td onclick="addmore();" style="cursor:pointer;"><img src="<?php echo IMAGES_FOLDER?>plus.png" title="Add More"></td>
              </tr>
              <tbody class="fileupload">
                <tr>
                  <td><input name="subject[]" type="text" /></td>
                  <td><input name="file[]" type="file" /></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td><input type="submit" value="Submit" /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
            </table>
          </form></td>
      </tr>
    </table>
    </form>
  </div>
</fieldset>
