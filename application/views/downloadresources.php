<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>

<!-- AddThis Button END -->
<fieldset>
  <legend>Download Resources</legend>
  <ul class="downloadresources">
  <?php foreach($resourcestypes as $val)
  		{
			echo '<li><a class="downloadresources" href="'.ROOT_FOLDER.$val->dl_linkname.'">'.$val->dr_resource.'</a></li>';
		}
		?>
  </ul>
</fieldset>