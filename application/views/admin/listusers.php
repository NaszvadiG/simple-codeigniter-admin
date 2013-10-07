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
                        <th class="table-header-repeat line-left minwidth-1"><a>First Name</a>	</th>
                        <th class="table-header-repeat line-left minwidth-1"><a>Last Name</a></th>
                        <th class="table-header-repeat line-left"><a>Email</a></th>
                        <th class="table-header-repeat line-left"><a>Mobile</a></th>
                        <th class="table-header-repeat line-left"><a>Website</a></th>
                        <th class="table-header-options line-left"><a>Options</a></th>
                    </tr>
                 </thead>
                	<?php $i=0; foreach($users as $val){?>
				<tr<?php if($i%2!=0){echo ' class="alternate-row"';} ?>>
					<td><?php echo $i+1;?></td>
					<td><?php echo $val->usr_fname;?></td>
					<td><?php echo $val->usr_lname;?></td>
					<td><?php echo $val->usr_email;?></td>
					<td><?php echo $val->usr_mobile;?></td>
					<td><?php echo $val->usr_website;?></td>
					<td class="options-width">
                    
   					<a href="<?php echo ROOT_FOLDER?>administrator/edituser/<?php echo $val->usr_id;?>" title="Edit this user details" class="info-tooltip"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/edit_user.png" /></a>
					<a <?php if($val->usr_status==1){?>onclick="return confirm('Are you sure to deactivate this user?');"<?php }?> href="<?php echo ROOT_FOLDER?>administrator/changeuserstatus/<?php echo $val->usr_id;?>" title="<?php if($val->usr_status==1){echo 'Active';}elseif($val->usr_status==0){echo 'Inactive';}?> user" class="info-tooltip"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/<?php if($val->usr_status==1){echo 'active_user.png';}elseif($val->usr_status==0){echo 'inactive_user.png';}?>" /></a>
					<a onclick="return confirm('Are you sure to delete this user?');" href="<?php echo ROOT_FOLDER?>administrator/deleteuser/<?php echo $val->usr_id;?>" title="Remove this user" class="info-tooltip"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/remove_user.png" /></a>

					</td>
				</tr>
                    <?php $i++; } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<div class="clear"></div>
		 
		</div>