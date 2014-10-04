<?php 
include("auth.php");
include("header.php");
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
      <!--<h1>Welcome Person Name</h1>

<div class="add_left">
<ul>

<li><a href="#">View your Bills		</a></li>
<li><a href="#">Update your Profile</a></li>
<li><a href="#">Change/Reset (fulfillment of security questions/OTP) your  Password</a></li>
<li><a href="#">Renew and Payment via netbanking/credit or debit card etc	</a></li>
<li><a href="#">View Usage Details </a></li>
<li><a href="#">View Payment History 		</a></li>	
<li><a href="#">Access to e-bills 			</a></li>
<li><a href="#">Service Request Tracking			</a></li>
<li><a href="#">Download Forms (Relocation Form/Replacement Form etc)</a></li>

</ul>
</div>-->
      <!--<div class="add_right"><img src="images/add.jpg" /></div>-->
	  <?php
include("functions.php");
$cust_no = $_SESSION['customer_no'];
$customer_info = GetCustomerInfo($cust_no);
if($customer_info != "")
{
?>
      <div class="clear"></div>
      <table width="100%" border="0">
        <tr>
          <td class="purple_bg2"><h2>My Bills</h2></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="middle" class="caf_col_15" style="border-bottom:1px solid #000;"><?php include('logindetail.php'); ?></td>
        </tr>
      </table>
      <table width="100%" border="0" style="margin-top:20px;">
  <tr>
    <td width="22%" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">Statement #</td>
    <td width="1" >&nbsp;</td>
    <td width="28%" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">Statement Date</td>
    <td width="1">&nbsp;</td>
    <td width="18%" align="right" valign="middle" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">Amount</td>
    <td width="1">&nbsp;</td>
    <td width="29%" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">Statement Period</td>
  </tr>
  
  <tr>
    <td width="22%" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;"></td>
    <td width="1" >&nbsp;</td>
    <td width="28%" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="18%" align="right" valign="middle" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="29%" class="input_box_1" style="width:auto; font-weight:bold; font-size:13px;">&nbsp;</td>
  </tr>
</table>
      <?php 
	  }
	  ?>
      
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
</div>
<!----section1 end---->
<!----footer start ---->
<!----design by end---->
</body>
</html>
<?php 
include("footer.php");
?>