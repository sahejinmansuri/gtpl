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
	   @session_start();
include("functions.php");
$cust_no = $_SESSION['customer_no'];
$customer_info = GetCustomerInfo($cust_no);

$cust_no = $_SESSION['customer_no'];
$username = $_SESSION['username'];
@$FROMDATE=$_POST['fromdate'];
@$TODATE=$_POST["todate"];

$FROMDATE = '29/07/2014 00:00:00';
$TODATE = '31/07/2014 00:00:00';

$availbalance = AvailableUsageLimit($cust_no);
$CONTRACTNO=$availbalance->CONTRACTID;
$SERVICEID=$availbalance->SERVICEID;
echo "<pre>";
print_r($availbalance);

$getpayments = GetUsageDetails($cust_no,$CONTRACTNO,$SERVICEID,$FROMDATE,$TODATE);

echo "</pre>";
if(is_object($getpayments)){


     
?>
      <div class="clear"></div>
      <table width="100%" border="0">
        <tr>
          <td class="purple_bg2"><h2>
Usage Details</h2></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="middle" class="caf_col_15" style="border-bottom:1px solid #000;"><?php include('logindetail.php'); ?></td>
        </tr>
        
        <tr >
          <td height="20"></td>
        </tr>
        
      </table>
      
      <table width="100%" border="0">
  <tr>
    <td width="74" align="center" class="book_title_bg">Select</td>
    <td width="3">&nbsp;</td>
    <td width="156" align="left" valign="middle" class="book_title_bg">contract_id</td>
    <td width="1">&nbsp;</td>
    <td width="276" align="right" valign="middle" class="book_title_bg">Credit Limit	</td>
    <td width="1" align="left" valign="middle">&nbsp;</td>
    <td width="134" align="right" valign="middle" class="book_title_bg">Used</td>
    <td width="1" align="left" valign="middle">&nbsp;</td>
    <td width="89" align="right" valign="middle" class="book_title_bg"> Balance</td>
    <td width="1" align="left" valign="middle">&nbsp;</td>
    <td width="129" align="left" valign="middle" class="book_title_bg">Additional Usage</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="order_bg" ><input type="radio" value="<?php echo $CONTRACTNO; ?>"/></td>
    <td >&nbsp;</td>
    <td align="left" valign="middle" class="order_bg"><?php echo $CONTRACTNO; ?></td>
    <td>&nbsp;</td>
    <td align="right" valign="middle" class="order_bg">99999999</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right" valign="middle" class="order_bg">99999999</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right" valign="middle" class="order_bg">0</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="order_bg">0</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="order_bg" >&nbsp;</td>
    <td >&nbsp;</td>
    <td align="left" valign="middle" class="order_bg">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right" valign="middle" class="order_bg">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right" valign="middle" class="order_bg">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right" valign="middle" class="order_bg">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle" class="order_bg">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php
	if(isset($msg))
	{
	echo $msg;
	} 
		?>
</td>
  </tr>
  
  <tr>
    <td><table width="100%" border="0">
  <tr>
    <td width="80" class="caf_col_15"><em>*</em>&nbsp;Start Date </td>
    <td width="1">&nbsp;</td>
    <td width="220" height="40"><input class="input_box_1" type="date" style="height:15px;"/> <input type="image" align="absMiddle" src="http://testselfcare.gtpl.net:85//Themes/DEFAULT/SELFCARE/Images/calendar.gif" class="textalignedimg" id="dpick1"></td>
    <td width="1">&nbsp;</td>
    <td width="80" class="caf_col_15"><em>*</em>&nbsp;Start Date </td>
    <td width="1">&nbsp;</td>
    <td width="220" height="40"><input class="input_box_1" type="date" style="height:15px;"/> <input type="image" align="absMiddle" src="http://testselfcare.gtpl.net:85//Themes/DEFAULT/SELFCARE/Images/calendar.gif" class="textalignedimg" id="dpick1"></td>
    <td width="288"><div class="caf_btn" style="width:308px;">
	<ul>
        
        <li style="margin:0 5px 0 5px;"><a href="#" style="padding:5px 9px">Current</a></li>
        <li style="margin:0 5px 0 5px;"><a href="#" style="padding:5px 9px">Previous</a></li>
        <li style="margin:0 5px 0 5px;"><a href="#" style="padding:5px 9px">List</a></li>
        <li style="margin:0 5px 0 5px;"><a href="#" style="padding:5px 9px">Export</a></li>
        
    </ul>
</div></td>
    
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</td>
  </tr>
  
  <tr>
    <td></td>
  </tr>
  
  
</table>

<table width="100%" border="1">
  <tr>
    <td width="108" align="left" class="book_title_bg">Group</td>
    <td width="153" class="book_title_bg">Login Time </td>
    <td width="125" align="left" valign="middle" class="book_title_bg">Session Time</td>
    <td width="97" class="book_title_bg">Download</td>
    <td width="112" align="left" valign="middle" class="book_title_bg">Upload	</td>
    <td width="118" align="left" valign="middle" class="book_title_bg">UserIP</td>
    <td width="161" align="left" valign="middle" class="book_title_bg">Source</td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
  
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
  
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
  
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
  
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
  
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
  
  <tr>
    <td align="left" valign="middle" class="order_bg" >2MBPSKUL1M</td>
    <td class="order_bg">24/07/2014 11:37:15</td>
    <td align="left" valign="middle" class="order_bg">00:04:15</td>
    <td class="order_bg">38.254</td>
    <td align="left" valign="middle" class="order_bg">0.805</td>
    <td align="left" valign="middle" class="order_bg">103.240.78.163</td>
    <td align="left" valign="middle" class="order_bg">00-1c-c0-9a-4d-d4</td>
  </tr>
</table>
<?php 
}
 else
{
		echo $msg = error_code($getpayments);	
}
?>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
</div>
<!----section1 end---->

</body>
</html>
<!----footer start ---->
<?php 
include("footer.php");
?>
<!----design by end---->