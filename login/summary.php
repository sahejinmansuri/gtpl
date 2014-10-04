<?php 
@include("auth.php");
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
            //$plan_code = $val->PLANINFO->PLANCODE;
			$plan_code = $val->ENDDATE;
            $plan_check = strpos($plan_code, ' ');
            if($plan_check == 0){
                $plan_code = substr($plan_code, 1);
            
?>
<table id="ctl00_uxPgCPH_tblMain" class="content" cellspacing="0" style="width: 100%;">
			<tbody><tr width="100%">
				<td width="50%" class="text" valign="top" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(222, 222, 222);">
<table width="60%" border="0">
  <th align="left">Home</th>
  <tr>
    <td class="purple_bg2" align="center"><h2>Summary</h2></td>
  </tr>
  <tr>
    <td class="blue_bg">Account Information</td>
  </tr>
  <tr>
  <td height="50" align="left" valign="bottom">
  <table width="240%" border="0">
  <tr>
    <td width="150" height="40px" class="caf_col_15">Customer Number</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $customer_info->CUSTOMERNO;?></td>
    <td width="240">&nbsp;</td>
	</tr><tr>
    <td width="150" class="caf_col_15">Current Balance	</td>
    <td width="27" align="center" valign="middle">:</td>
    <td width="236" class="caf_col_15" style="font-weight:normal">Rs. <?php echo $balance->AMOUNT; ?>  Cr</td>
  </tr>
</table>
<table width="100%" border="0" style="margin-top:20px;">
  <tr>
    <td width="220" class="pay_title_bg">Current Plans</td>
    <td width="452" class="pay_title_bg">Due Date</td>
  </tr>
 
 <tr>
    <td width="220" class="input_box_1" style="width:auto; font-size:13px;"><?php echo $val->PLANINFO->PLANDESC; ?></td>
    <td width="452" class="input_box_1" style="width:auto;  font-size:13px;"><?php echo $val->ENDDATE; ?></td>
</tr>

</table>
  </td>
  </tr>
</table>
<?php
}}
			
        }
    }
?>

		</td>
<td width="40%" style="border-bottom-width: 1px; margin-left:200px; border-bottom-style: solid; border-bottom-color: rgb(222, 222, 222);">
            <img src="images/channel_default.jpg" width="400px">
          </td>
</tr></br></tbody></table>
</div> 

  
  </div>
<div class="clear"></div>

</div>

<!----section1 end---->
</body>
</html>

<!----footer start ---->
<?php 
include("footer.php");
?>
<!----design by end---->
<?php 
	@session_start();
	if(isset($_REQUEST['logout']))
	{
		session_destroy();
		header('location:login.php');
				
	}
	if($_SESSION['username']==NUll)
	{
		header('location:login.php');
	}
	?>