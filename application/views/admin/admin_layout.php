<?php echo $this->load->view('admin/header');?>

<script type="text/javascript" src="<?php echo JS_PATH ?>common.js"></script>
<link rel="stylesheet" href="<?php echo ADMINCSS_PATH ?>demos.css">

<script type="text/javascript" charset="utf-8">
$(function() {
    $( "#usr_dob" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
});

$(document).ready(function() {
    $("#userRegistration").validate();
});
</script>

<style type="text/css">
body	{	line-height: 1!important;	}
</style>

<!-- start content-outer -->
<div id="content-outer"> 
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1><?php echo $title?></h1>
    </div>
      <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
          <th rowspan="3" class="sized"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
          <th class="topleft"></th>
          <td id="tbl-border-top">&nbsp;</td>
          <th class="topright"></th>
          <th rowspan="3" class="sized"><img src="<?php echo ADMINIMAGES_FOLDER ?>shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
        </tr>
        <tr>
          <td id="tbl-border-left"></td>
          <td><!--  start content-table-inner -->
            
           <?php if(isset($loadpage)){echo $this->load->view($loadpage);}else echo '';?>
            
            <!--  end content-table-inner  --></td>
          <td id="tbl-border-right"></td>
        </tr>
        <tr>
          <th class="sized bottomleft"></th>
          <td id="tbl-border-bottom">&nbsp;</td>
          <th class="sized bottomright"></th>
        </tr>
      </table>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer -->

<div class="clear">&nbsp;</div>
<?php echo $this->load->view('admin/footer');?>
</body></html>