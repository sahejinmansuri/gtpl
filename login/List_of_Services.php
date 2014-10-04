<?php 
@include("auth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">

.myButton {
	-moz-box-shadow:inset 0px 1px 0px 0px #a4e271;
	-webkit-box-shadow:inset 0px 1px 0px 0px #a4e271;
	box-shadow:inset 0px 1px 0px 0px #a4e271;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #89c403), color-stop(1, #77a809));
	background:-moz-linear-gradient(top, #89c403 5%, #77a809 100%);
	background:-webkit-linear-gradient(top, #89c403 5%, #77a809 100%);
	background:-o-linear-gradient(top, #89c403 5%, #77a809 100%);
	background:-ms-linear-gradient(top, #89c403 5%, #77a809 100%);
	background:linear-gradient(to bottom, #89c403 5%, #77a809 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#89c403', endColorstr='#77a809',GradientType=0);
	background-color:#89c403;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #74b807;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #528009;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77a809), color-stop(1, #89c403));
	background:-moz-linear-gradient(top, #77a809 5%, #89c403 100%);
	background:-webkit-linear-gradient(top, #77a809 5%, #89c403 100%);
	background:-o-linear-gradient(top, #77a809 5%, #89c403 100%);
	background:-ms-linear-gradient(top, #77a809 5%, #89c403 100%);
	background:linear-gradient(to bottom, #77a809 5%, #89c403 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77a809', endColorstr='#89c403',GradientType=0);
	background-color:#77a809;
}
.myButton:active {
	position:relative;
	top:1px;
}
.input_box_1{
	color:000;
    background: none repeat scroll 0% 0% ##D7D7D7;
    border: 1px solid #D7D7D7;
    text-align: left;
}
.input_box_1:hover {
	color:#FFF;
    background: none repeat scroll 0% 0% #C44A49;
    border: 1px solid #D7D7D7;
    text-align: left;
}
</style>
<script language="javascript" type="text/javascript"> 
function closeWin() {
    Window.close();
}
</script>
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
$usagelimit = AvailableUsageLimit($cust_no);

if($customer_info != ""){
    $contracts = $customer_info->CONTRACTINFO;
    foreach($contracts as $key=>$val){
        $status = $val->CONTRACTSTATUS;
		$plan_detail = $usagelimit->SERVICENAME;
        if($status == 'Active'){
            //print_r($val);
            $plan_code = $val->PLANINFO->PLANCODE;
            $plan_check = strpos($plan_code, ' ');
            if($plan_check == 0){
                $plan_code = substr($plan_code, 1);
          
?>
<table id="ctl00_uxPgCPH_tblMain" class="content" cellspacing="0" style="width: 100%;">
			<tbody><tr width="100%">
				<td width="25%" class="text" valign="top" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(222, 222, 222);">
<table width="100%" border="0">
  <th align="left">List of Services </br></br></th>
  <tr>
    <td class="purple_bg2" align="left"><h2><?php echo $val->PLANINFO->PLANDESC; ?></h2></td>
  </tr>

<table width="100%" border="0" style="margin-top:20px;">
  <tr>
    <td width="220" class="pay_title_bg">Hardware</td>
    <td width="452" class="pay_title_bg">Services</td>
  </tr>
 
 <tr class="input_box_1">
    <td width="220" class="" style="width:auto; font-size:13px;">ROOM - <?php echo $val->NOOFROOMS; ?>(<?php echo $val->CONTRACTNO."-".$plan_detail; ?>)</td>
    <td width="452" class="" style="width:auto;  font-size:13px;"></br>Active Services </br></br><?php echo $val->PLANINFO->PLANDESC; ?></br></br></td>
</tr>

</table>
  </td>
  </tr>
</table>
<?php
}  }
			
        }
    }
?>
</td>
</tr>
		</tbody></table>
</div> 
<div class="buttons">		
	    <div class="formbutton" align="right">
             <input type="button"  class="myButton" value='Close' onclick="window.close();" />
        </div>
    </div>
  
  </div>

</div>
</div>

<!----section1 end---->
</body>
</html>
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