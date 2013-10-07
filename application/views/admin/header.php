<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Welcome, Administrator</title>
<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo ADMINCSS_PATH ?>pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery-1.5.1.js"></script>

<!--  jquery Validate -->
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.metadata.js" type="text/javascript"></script>
<script src="<?php echo JS_PATH ?>constants.js" type="text/javascript"></script>

<!--  styled file upload script --> 
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "<?php echo ADMINIMAGES_FOLDER ?>forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="<?php echo ADMINJS_PATH ?>jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 



<!--  date picker script -->
<script src="<?php echo ADMINJS_PATH ?>ui/ui.core.js"></script>
<script src="<?php echo ADMINJS_PATH ?>ui/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>themes/base/jquery.ui.all.css">


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo ADMINJS_PATH ?>jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href="<?php echo ROOT_FOLDER.'administrator' ?>"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/logo.png" width="156" height="40" alt="" /></a>
	</div>
	<!-- end logo -->

 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<a href="<?php echo ROOT_FOLDER.'administrator/myaccount'; ?>" id="myaccount"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></a>
			<div class="nav-divider">&nbsp;</div>
			<a href="<?php echo ROOT_FOLDER.'administrator/logout'; ?>" id="logout"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
			<div class="clear">&nbsp;</div>

		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='users'){echo 'current';}else{echo 'select';}?>">
        	<li><a><b>Users</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if(isset($mainmenu)&&$mainmenu=='users'){echo 'show';}?>">
			<ul class="sub">
				<li <?php if(isset($submenu)&&$submenu=='addusers'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'administrator/addusers'; ?>">Add Users</a></li>
				<li <?php if(isset($submenu)&&$submenu=='listusers'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'administrator/listusers'; ?>">List Users</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='webpage'){echo 'current';}else{echo 'select';}?>"><li><a><b>Web Pages</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if(isset($mainmenu)&&$mainmenu=='webpage'){echo 'show';}?>">
			<ul class="sub">
				<li <?php if(isset($submenu)&&$submenu=='addpage'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'administrator/addwebpage'; ?>">Add Pages</a></li>
				<li <?php if(isset($submenu)&&$submenu=='listpage'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'administrator/cmslisting'; ?>">List Pages</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='mails'){echo 'current';}else{echo 'select';}?>"><li><a href="<?php echo ROOT_FOLDER.'administrator/mails'; ?>"><b>Mails from Users</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='logs'){echo 'current';}else{echo 'select';}?>">
        <li><a><b>Logs</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if(isset($mainmenu)&&$mainmenu=='logs'){echo 'show';}?>">
			<ul class="sub">
				<li <?php if(isset($submenu)&&$submenu=='failedlogins'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'administrator/failedlogins'; ?>">Failed Login Attempts</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='adsense'){echo 'current';}else{echo 'select';}?>"><li><a href="<?php echo ROOT_FOLDER.'administrator/adsense'; ?>"><b>Adsense</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if(isset($mainmenu)&&$mainmenu=='adsense'){echo 'show';}?>">
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li></ul>
        
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='newsletter'){echo 'current';}else{echo 'select';}?>"><li><a><b>Newsletter</b></a><!--[if IE 7]><!--><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<div class="select_sub <?php if(isset($mainmenu)&&$mainmenu=='newsletter'){echo 'show';}?>">
			<ul class="sub">
				<li <?php if(isset($submenu)&&$submenu=='addnewsletter'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'newsletter/addnewsletter'; ?>">Add Newsletter</a></li>
				<li <?php if(isset($submenu)&&$submenu=='listnewsletter'){echo 'class="sub_show"';}?>><a href="<?php echo ROOT_FOLDER.'newsletter/listnewsletter'; ?>">List Newsletters</a></li>
			</ul>
		</div>
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li></ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<ul class="<?php if(isset($mainmenu)&&$mainmenu=='wio'){echo 'current';}else{echo 'select';}?>"><li><a href="<?php echo ROOT_FOLDER.'administrator/whoisonline'; ?>"><b>Who is Online</b></a><!--[if IE 7]><!--><!--<![endif]--></li></ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>