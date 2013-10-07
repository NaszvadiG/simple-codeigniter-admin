<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tbody>
    <tr>
      <td width="86%" valign="top" height="100%" class="bord tdvalign textdivpad"><table width="100%" height="100%" cellspacing="5" cellpadding="0" class="leftmenu">
          <tbody>
            <tr style="vertical-align:top; padding-top:5px;">
              <td colspan="2" rowspan="3"><table width="200" border="0" class="leftmenu">
                  <tbody>
                    <tr>
                      <td class="bigtd">Welcome <?php echo($this->session->userdata['userLoginDetails']['usr_fname']); ?>,</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="189" <?php if($pagecontent=='myprofile'){echo 'class="menu-selected"';}?>><a href="<?php echo ROOT_FOLDER.'user/myprofile'; ?>">My Profile</a></td>
                    </tr>
                    <tr>
                      <td <?php if(isset($menuselected)&&$menuselected=='downloads'){echo 'class="menu-selected"';}?>><a href="<?php echo DOWNLOADS; ?>">Download Resources</a></td>
                    </tr>
                    <tr>
                      <td <?php if(isset($menuselected)&&$menuselected=='uploads'){echo 'class="menu-selected"';}?>><a href="<?php echo UPLOADS; ?>">Upload Resources</a></td>
                    </tr>
                    <tr>
                      <td><a onclick="alert('This section is coming soon');">Frequently Viewed</a></td>
                    </tr>
                    <tr>
                      <td <?php if(isset($menuselected)&&$menuselected=='hotds'){echo 'class="menu-selected"';}?>><a href="<?php echo ROOT_FOLDER.'hotdownloads'; ?>">HotDs</a></td>
                    </tr>
                    <tr>
                      <td <?php if(isset($menuselected)&&$menuselected=='my_contributions'){echo 'class="menu-selected"';}?>><a href="<?php echo ROOT_FOLDER.'my_contributions'; ?>">My Cotributions</a></td>
                    </tr>
                    <tr>
                      <td><a onclick="alert('This section is coming soon');">Cool Buddy</a></td>
                    </tr>
                    <tr>
                      <td><a onclick="alert('This section is coming soon');"y>SITE Einsteins</a></td>
                    </tr>
                    <tr>
                      <td <?php if($pagecontent=='contactus'){echo 'class="menu-selected"';}?>><a href="<?php echo ROOT_FOLDER.'user/contactus'; ?>">Contact us</a></td>
                    </tr>
                    <tr>
                      <td><a href="<?php echo ROOT_FOLDER.'login/logout'; ?>">Logout</a></td>
                    </tr>
                  </tbody>
                </table></td>
              <td style="padding-left:22px;">
			  <?php
			  $link = ROOT_FOLDER;
			  	foreach($linknavigation as $val)
				{
					$link .= $val.'/';
					echo '<a class="linker" href="'.$link.'">'.ucfirst(urldecode($val)).'</a> <b>/</b> ';
				}?></td>
            </tr>
            <tr style="vertical-align:top; padding-top:5px;">
              <td width="79%" class="p"><?php if(isset($status)){?><div class="<?php echo $status['result']?>"><?php echo $status['message']?></div><?php } ?></td>
            </tr>
            <tr>
              <td class="p"><?php $this->load->view($pagecontent);?></td>
            </tr>
          </tbody>
        </table></td>
      <td width="28%" rowspan="2" valign="top" class="bord-rpane"><?php echo $ads['tallbigright']?></td>
    </tr>
    <tr>
      <td valign="top" class="bord"><?php echo $ads['bottom']?></td>
    </tr>
  </tbody>
</table>
