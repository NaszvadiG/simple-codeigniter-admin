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
                        <th class="table-header-repeat line-left minwidth-1"><a>User Name</a></th>
                        <th class="table-header-repeat line-left minwidth-1"><a>Email</a></th>
                        <th class="table-header-repeat line-left"><a>Subject</a></th>
                        <th class="table-header-repeat line-left"><a>Read/Unread</a></th>
                        <th class="table-header-repeat line-left"><a>User Kind</a></th>
                        <th class="table-header-repeat line-left"><a>Date/Time</a></th>
                        <th class="table-header-options line-left"><a>Delete</a></th>
                    </tr>
                 </thead>
                	<?php $i=0;
					foreach($mails as $val){?>
				<tr class="info-tooltip<?php if($i%2!=0){echo ' alternate-row';} ?>">
					<td><?php echo $i+1;?></td>
					<td><?php echo $val->cm_name;?></td>
					<td><?php echo $val->cm_email;?></td>
					<td><?php echo $val->cm_subject;?></td>
					<td><a href="<?php echo ROOT_FOLDER?>administrator/readmail/<?php echo $val->cm_id;?>" title="Read this mail" class="info-tooltip"><?php if($val->cm_read_status==0){echo 'Unread';}else{echo 'Read';}?></a></td>
					<td><?php if($val->usr_id!=''){echo 'Registered';}else{echo 'Unregistered';}?></td>
					<td><?php echo date("F j, Y g:i a", strtotime($val->cm_timestamp));?></td>
					<td><a onclick="return confirm('Are you sure to delete this mail?');" href="<?php echo ROOT_FOLDER?>administrator/deletemail/<?php echo $val->cm_id;?>" title="Remove this user" class="info-tooltip"><img src="<?php echo ADMINIMAGES_FOLDER ?>table/remove_user.png" alt="delete" /></a></td>
				</tr>
                    <?php $i++; } ?>
				</table>
				<!--  end product-table................................... --> 
				</form>
			</div>
			<!--  end content-table  -->
		
			<div class="clear"></div>
		 
		</div>