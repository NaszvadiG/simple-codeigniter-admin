<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<!-- AddThis Button END -->

<fieldset>
  <legend><?php echo ucfirst(urldecode($subjectname))?></legend>


  <div class="resources">
    <table width="500" border="0">
    <?php
    if(isset($qpapers)&&count($qpapers)>0){
      	  foreach($qpapers as $key=>$val){?>
      <tr>
        <td><a class="resource-list" href="<?php echo DOWNLOAD_RESOURCES.'questionpapers/'.strtoupper(urldecode($subjectname)).'/'.$val->qp_name?>"><?php echo $val->qp_name;?></a></td>
      </tr>
      <?php } 
	}
	else
	{?>
    <tr>
        <td class="failiure">Sorry. But no papers found for <?php echo ucfirst(urldecode($subjectname));?>.</td>
      </tr>
	<?php }?>
    </table>
  </div>
</fieldset>
