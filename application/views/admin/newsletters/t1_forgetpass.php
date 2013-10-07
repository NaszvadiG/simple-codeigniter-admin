<html>
<head>
<title>Darrr Forget Password</title>
</head>
<body>
<table style="border: 2px dashed #4D90FE;text-align: left;background: none repeat-x scroll center top #2D2D2D;color: #FFFF80;font: 12px Tahoma, Arial; padding:10px!important; width:100%;" cellspacing="0" cellpadding="0" border="0" align="justify">
  <tr>
    <td><p> Dear <?php echo $fname ?>, </p>
      <br />
      <p style="text-align:justify; color:white!important;">We have processed your request for password retrieval. Your account details are mentioned below:</p>
      <br />
      <table cellspacing="0" cellpadding="0" border="0" style="border: 2px dotted #FFFF80;height: 30px;padding: 5px;" width="510">
        <tbody>
          <tr>
            <td width="102"><p style="text-align:justify; color:white!important;">Login id</p></td>
            <td width="10">:&nbsp;<strong><?php echo $email ?></strong></td>
            <td width="398">&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
  <tr>
    <td colspan="3"><br>
      <p style="text-align:justify; color:white!important;">
      <p><?php echo base_url().'login/validateresetemail/'.urlencode($email).'/'.$randstring?></p><br />
      <strong><a style="color:#4D90FE;" href="<?php echo base_url().'login/validateresetemail/'.urlencode($email).'/'.$randstring?>">Click Here</a></strong> or copy and paste the above url in your address bar and press enter to reset your password.</p>
      <br />
      <br />
      <p style="text-align:justify; color:white!important;">If you did not initiate the forget password process, safely ignore this mail.</p>
      <br />
      <p>The Team, </p>
      <p>Darrr.com</p>
      <br /></td>
  </tr>
</table>
</body>
</html>