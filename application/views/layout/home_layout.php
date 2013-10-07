<!doctype html>
<html>
<head>
<title><?php echo SITE_NAME.' - '.ucfirst($title)?></title>
<meta charset="utf-8">
<meta name="keywords" content="university question papers,anna university,question papers,anna university question papers download,anna university old question papers download,study materials, <?php echo strtolower($title)?>" >
<meta name="description" content="Download Anna university old question papers, study materials and lots of usefull stuffs just for students. <?php echo strtolower($title)?>" >
<link rel="shortcut icon" href="<?php echo ICON?>">
<script type="text/javascript" src="<?php echo JQUERY_CORE?>"></script>
<script type="text/javascript" src="<?php echo JQUERY_VALIDATE?>"></script>
<script type="text/javascript" src="<?php echo JS_PATH?>constants.js"></script>


<!-- AddThis Button BEGIN -->
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4ed7caf13bd461fc"></script>
<script type="text/javascript">
var addthis_config = {"data_track_addressbar":true};
<!-- AddThis Button END -->


//For Analytics
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27385564-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<style type="text/css">
.sharethis {
	padding-left:10px;
    padding-top: 100px;
    position: fixed;}
.addthis_default_style .at300b, .addthis_default_style .at300m {
    padding: 3px 2px 0;
}
</style>

<link href="<?php echo CSS_PATH?>style.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_PATH?>messages.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0">

<span class="sharethis">
    <div class="addthis_toolbox addthis_default_style addthis_32x32_style bg1" style="border: 2px dashed #4D90FE; width: 37px; height:250px;">
        <a class="addthis_button_facebook"></a>
        <a class="addthis_button_twitter"></a>
        <a class="addthis_button_gmail"></a>
        <a class="addthis_button_hotmail"></a>
        <a class="addthis_button_stumbleupon"></a>
        <a class="addthis_button_delicious"></a>
        <a class="addthis_button_email"></a>
        <?php /* <a class="addthis_counter addthis_bubble_style"></a>*/ ?>
    </div>
</span>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="33" class="bg1 bord"><table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td class="p" width="64%"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                    <tr>
                      <td width="2%"><img src="<?php echo IMAGES_FOLDER ?>home.gif" width="12" height="11"></td>
                      <td width="56%" style="text-align: left;"><a href="<?php echo ROOT_FOLDER ?>">home</a></td>
                      <td width="42%" style="text-align: right;">This page rendered in {elapsed_time} seconds</td>
                    </tr>
                  </table></td>
                <td width="36%" align="center"><?php /*<form action="http://www.google.co.in" id="cse-search-box" target="_blank">
  <div>
    <input type="hidden" name="cx" value="partner-pub-6010749118303354:8426041797" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" size="50" />
    <input type="submit" name="sa" value="Search" />
  </div>
</form>

<script type="text/javascript" src="http://www.google.co.in/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>*/ ?></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><a href="<?php echo ROOT_FOLDER ?>"><img src="<?php echo IMAGES_FOLDER ?>logo/logo.png" width="390" height="87"></a></td>
                <td width="728"><?php echo $ads['top'];?></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0" class="table-bottom-margin">
  <tr>
    <td class="bg1"><?php $this->load->view($middlecontent);?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="bg1 bord termsrow"><table width="100%" cellspacing="5" cellpadding="0" border="0">
        <tr>
          <td valign="top" colspan="2" class="termsrow"><a class="yellow-text-underline" href="#"><strong>Terms of Use</strong></a> <strong class="yellow-text-regular">|</strong><a class="yellow-text-underline" href="#"><strong> Privacy Statement </strong></a></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>