<link href="<?php echo CSS_PATH?>swfupload/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JS_PATH?>swfupload/swfupload.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH?>swfupload/swfupload.queue.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH?>swfupload/fileprogress.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH?>swfupload/handlers.js"></script>

<script type="text/javascript">
		var upload;

		$(document).ready(function() {
			upload = new SWFUpload({
				// Backend Settings
				upload_url: "<?php echo UPLOADS?>uploadfiles",

				// File Upload Settings
				file_post_name : 'uploadfiles',
				file_size_limit : "102400",	// 100MB
				file_types : "*.pdf;*.xls;*.doc;*.ppt;*.pps;*.ps;*.txt;*.rtf;*.odt;*.odp;*.ods;*.odf;*.odg;*.sxw;*.sxi;*.sxc;*.sxd;*.tif;*.tiff;*.docx;*.pptx;*.ppsx;*.xlsx;*.zip;*.rar;",
				file_types_description : "All Files",
				file_upload_limit : "0",
				file_queue_limit : "10",

				// Event Handler Settings (all my handlers are in the Handler.js file)
				file_dialog_start_handler : fileDialogStart,
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				button_image_url : "<?php echo IMAGES_FOLDER?>swfupload/XPButtonUploadText_61x22.png",
				button_placeholder_id : "spanButtonPlaceholder1",
				button_width: 61,
				button_height: 22,
				
				// Flash Settings
				flash_url : "<?php echo IMAGES_FOLDER?>swfupload/swfupload.swf",
				

				custom_settings : {
					progressTarget : "fsUploadProgress1",
					cancelButtonId : "btnCancel1"
				},
				
				// Debug Settings
				debug: true
			});
	     });
	</script>

<fieldset>
  <legend>Upload Resources</legend>
  <div id="content">
		<table>
			<tr valign="top">
				<td>
                <div>Instructions for upload,</div>
                    <ol>
                        <li>Please click on the upload button, a dialog window will appear.</li>
                        <li>To select multiple files press and hold the Ctrl (Windows) or Command (Mac) button and select the files.</li>
                        <li>Once you completed selection, please click "Open" button in the dialog.</li>
                    </ol>
                    <div class="fieldset flash" id="fsUploadProgress1">

                    </div>
                    <div style="padding-left: 5px;">
                        <span id="spanButtonPlaceholder1"></span>
                        <input id="btnCancel1" type="button" value="Cancel Uploads" onClick="cancelQueue(upload1);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
                        <br />
                    </div>
				</td>
			</tr>
		</table>
	</form>
</div>
</fieldset>