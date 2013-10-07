<link href="<?php echo ADMINCSS_PATH ?>sample.css" rel="stylesheet" type="text/css"/>
  <div id="content-table-inner">
          <form action="<?php echo ROOT_FOLDER.'newsletter/sendnewsletternow/'.$newsletters->nl_id; ?>">
              <table width="740" border="0" cellpadding="0" cellspacing="0"  id="id-form">
                <tr>
                  <th width="180" valign="top">Subject:</th>
                  <td width="560"><?php echo $newsletters->nlc_name;?></td>
                  </tr>
                <tr>
                  <th valign="top">&nbsp;</th>
                  <td><?php $this->load->view('admin/newsletters/t1'); ?></td>
                  </tr>
                <tr>
                  <th>&nbsp;</th>
                  <td valign="top"><input type="submit" value="Send Newsletter" /></td>
                  </tr>
              </table>
          </form>
  </div>