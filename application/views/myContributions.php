<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<!-- AddThis Button END -->

<fieldset>
  <legend>My Contributions</legend>


  <div class="resources">
    <table width="500" border="0">
      <tr>
        <th>#</th>
        <th>Material Name</th>
        <th>File Name</th>
        <th>Approved</th>
      </th>
    <?php $i=0;
    if(isset($myContributions)&&count($myContributions)>0){
      	  foreach($myContributions as $val){?>
      <tr>
        <td><?php echo ++$i;?></td>
        <td><?php echo $val->uc_subject_name;?></td>
        <td><?php echo $val->uc_filename;?></td>
        <td><?php echo ($val->qp_status==0)?"No":"Yes"; ?></td>
      </tr>
      <?php }
	}
	else
	{?>
    <tr>
        <td class="failiure">You haven't contributed to this site. Click here to submit your resources.</td>
      </tr>
	<?php }?>
    </table>
  </div>
</fieldset>
