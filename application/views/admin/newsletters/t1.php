<html>
<head><title>Darrr Newsletter</title>
</head>
<body>
<table style="border: 2px dashed #4D90FE;text-align: left;background: none repeat-x scroll center top #2D2D2D;color: #FFFF80;font: 12px Tahoma, Arial; padding:10px!important; width:100%;" cellspacing="0" cellpadding="0" border="0" align="justify">
  <tr>
    <td><p>
      Dear <?php if(isset($newsletters->nls_name)){echo $newsletters->nls_name;}else{echo '[User]';}?>,
      </p>
      <br />
      <p style="text-align:justify; color:white!important;"><?php echo nl2br(stripslashes($newsletters->nl_content));?></p>
      <br />
      <p style="text-align:justify; color:white!important;">Not usefull to you? Forward to others to whom you think it will be usefull.</p>
      <br />
      <p>The Team, </p><p>Darrr.com</p><br />
      <p style="color:grey;vertical-align:bottom;font: 10px Tahoma, Arial;">Don't want to receive the newsletter from us? Please <a<?php if(isset($newsletters->nls_id)){?> href="<?php echo base_url().'newsletter/unsubscribe/'.sha1($newsletters->nls_id);?>"<?php } ?> style="text-decoration:underline; color:grey;">click here</a> to safely unsubscribe.</p></td>
  </tr>
</table>
</body>
</html>