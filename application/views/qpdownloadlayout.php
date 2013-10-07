<table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tbody>
    <tr>
      <td width="1%" valign="top" height="100%" class="bord tdvalign textdivpad"><?php echo $ads['tallbigright']?></td>
      <td width="48%" class="bord tdvalign textdivpad" style="vertical-align:top;">
      <table width="100%">
          <tr style="vertical-align:top; padding-top:5px;">
            <td style="padding-left:22px;"><?php
			  $link = ROOT_FOLDER;
			  	foreach($linknavigation as $val)
				{
					$link .= $val.'/';
					echo '<a class="linker" href="'.$link.'">'.ucfirst(urldecode($val)).'</a> <b>/</b> ';
				}?></td>
          </tr>
          <tr style="vertical-align:top; padding-top:5px;">
            <td width="79%" class="p"><?php if(isset($status)){?>
              <div class="<?php echo $status['result']?>"><?php echo $status['message']?></div>
              <?php } ?></td>
          </tr>
          <tr>
            <td class="p"><?php $this->load->view($pagecontent);?></td>
          </tr>
        </table>
        </td>
      <td width="5%" valign="top" class="bord-rpane" style="padding-top: 10px;"><?php echo $ads['tallbigright']?></td>
    </tr>
  </tbody>
</table>
