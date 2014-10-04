<?php 
@include("auth.php");
include('header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to GTPL</title>
<link rel="shortcut icon" href="images/favicon_icon.png" />
<link rel='stylesheet' type='text/css' href='css/menu.css' />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script type='text/javascript' src='menu_jquery.js'></script>
<link rel="stylesheet" type="text/css" href="css/gtpl_style.css" />
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<style type="text/css">
.Servicespopup
{
	color:7e7877;
}
.Servicespopup:hover
{
		color:#FFF;
}
</style>
<script language="javascript" type="text/javascript"> 
<!--
function myPopup() {
window.open( "List_of_Services.php", "myWindow","status = 1, width=1050 ,height=650 , resizable = 0" )
}
//-->

</script>
<body>
<div class="clear"></div>
<!----banner---->
<!--<div class="banner_main">
<div class="brn"><img src="images/add_banner.jpg" width="1300" height="300" /></div>
</div>-->
<!----end banner---->
<!----section1 start---->
<div class="section_1">
  <div class="wrapper" style="padding-top:100px;">
    <div class="caf">
      <div class="clear"></div>
	  <?php
include("functions.php");
$cust_no = $_SESSION['customer_no'];
$customer_info = GetCustomerInfo($cust_no);
$balance = GetCustomerBalance($cust_no);

if($customer_info != ""){
    $contracts = $customer_info->CONTRACTINFO;
    foreach($contracts as $key=>$val){
        $status = $val->CONTRACTSTATUS;
        if($status == 'Active'){
            //print_r($val);
            $plan_code = $val->PLANINFO->PLANCODE;
            $plan_check = strpos($plan_code, ' ');
            if($plan_check == 0){
                $plan_code = substr($plan_code, 1);
            }
			
        }
    }
?>
      <table width="100%" border="0">
        <tr>
          <td class="purple_bg2"><h2>Services</h2></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="middle" class="caf_col_15" style="border-bottom:1px solid #000;"><?php include('logindetail.php'); ?></td>
        </tr>
      </table>
      
      <table width="100%" border="0">
        <tr>
          <td class="blue_bg" style="font-size:13px;"><a href="#" onClick="myPopup()"><span class="Servicespopup"><?php echo $val->PLANINFO->SERVICEINFO->SERVICEDESC; ?></span></a></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="middle">
          <table width="100%" border="0">
  <tr>
    <td width="70%" class="input_box_1" style="font-weight:normal; font-size:13px;"><?php echo $val->PLANINFO->SERVICEINFO->SERVICEDESC; ?></td>
    <td width="1" class="input_box_1">&nbsp;</td>
    <td width="302" class="input_box_1">&nbsp;</td>
  </tr>
</table>
   </td>
        </tr>
      </table>
<?php } ?>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
</body>
</html>
<?php 
include("footer.php");
?>