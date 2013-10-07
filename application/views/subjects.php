<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<!-- AddThis Button END -->
<fieldset>
  <legend>Subject starts with <?php echo urldecode($startswith)?></legend>

  <div class="downloadorder">
  <?php foreach(range('A', 'Z') as $letter)
  		{
			if($letter==$startswith)
			{
				echo '<a class="alpha-selected">'.$letter.'</a> ';
			}
			else
			{
				echo '<a href="'.DOWNLOADS.'subjects/'.$letter.'">'.$letter.'</a> ';
			}
		}
	?>
  </div>
  <div class="resources">
    <table width="350" border="0">
    <?php
    if(count($allSubjects)>0){
      	  foreach($allSubjects as $key=>$val){?>
      <tr>
        <td><a class="resource-list" href="<?php echo DOWNLOADS?>questionpapers/<?php echo strtolower($val->sub_name);?>"><?php echo $val->sub_name;?></a></td>
      </tr>
      <?php } 
	}
	else
	{?>
    <tr>
        <td class="failiure">Sorry. But we dont have any subjects  starts with <?php echo $startswith;?>.</td>
      </tr>
	<?php }?>
    </table>
  </div>
</fieldset>
