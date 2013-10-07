<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>demo_table.css" type="text/css" media="screen" title="default" />
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#users-table').dataTable();
	});
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
label	{
	color: #333333;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 12px;
    line-height: 18px;
}
</style>

<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
            <?php if(isset($status['result'])&&$status['result']=='1'){?>
				<!--  start message-green -->
				<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left"><?php echo  $status['message'] ?></td>
					<td class="green-right"><a class="close-green"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-green -->
			<?php } ?>
             
            <?php if(isset($status['result'])&&$status['result']=='0'){?>
				<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left"><?php echo  $status['message'] ?></td>
					<td class="red-right"><a class="close-red"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->
			<?php } ?>
		 
				<!--  start users-table ..................................................................................... -->
				<form id="mainform" action="">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="users-table">
                <thead>
                    <tr>
                        <th class="table-header-check">&nbsp;</th>
                        <th class="table-header-repeat line-left minwidth-1"><a>Notes</a></th>
                        <th class="table-header-repeat line-left minwidth-1"><a>Preview</a></th>
                        <th class="table-header-options line-left minwidth-1"><a>Status</a></th>
                    </tr>
                 </thead>
                	<?php $i=0; foreach($ads as $val){?>
				<tr class="info-tooltip<?php if($i%2!=0){echo ' alternate-row';} ?>">
					<td><?php echo $i+1;?></td>
					<td><?php echo $val->ad_notes;?></td>
					<td><?php echo $val->ad_dummy;?></td>
					<td><a href="<?php echo ROOT_FOLDER?>administrator/changeAdStatus/<?php echo $val->ad_id;?>" title="<?php 
							if($val->ad_status=='0')
							{?>Show ad in front end<?php }
							else if($val->ad_status=='1')
							{?>Hide ad in front end<?php };?>" class="info-tooltip">
							  <?php if($val->ad_status=='1')
							  {?>
                              <img src="<?php echo IMAGES_FOLDER ?>ok.png"   alt="" />
							  <?php }
							  else if($val->ad_status=='0')
							  {?>
                              <img src="<?php echo IMAGES_FOLDER ?>cancel.png"   alt="" />
							<?php };?></a></td>
				  </tr>
                    <?php $i++; } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<div class="clear"></div>
		 
		</div>
<div class="clear">&nbsp;</div>
</body></html>