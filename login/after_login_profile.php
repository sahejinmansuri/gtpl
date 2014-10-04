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
<div class="clear"></div>
<?php
include("functions.php");
$cust_no = $_SESSION['customer_no'];
$customer_info = GetCustomerInfo($cust_no);

if($customer_info != "")
{

  $contact_name_object = (array)$customer_info->CONTACTINFO->CONTACTNAME;
  $count_contact = count($contact_name_object);
  if($count_contact == 0){
	$contact_name = "-";
  }else{
	$contact_name = $contact_name_object;
  }
  
  $phone_object = (array)$customer_info->CONTACTINFO->HOMEPHONE;
  $count_phone = count($phone_object);
  if($count_phone == 0){
	$home_phone = "-";
  }else{
	$home_phone = $phone_object;
  }
  
  $wphone_object = (array)$customer_info->CONTACTINFO->WORKPHONE;
  $count_wphone = count($wphone_object);
  if($count_wphone == 0){
	$work_phone = "-";
  }else{
	$work_phone = $wphone_object;
  }
  
  $fax_object = (array)$customer_info->CONTACTINFO->FAXNBR;
  $count_fax = count($fax_object);
  if($count_fax == 0){
	$fax_number = "-";
  }else{
	$fax_number = $fax_object;
  }
  
  $email_object = (array)$customer_info->CONTACTINFO->ALTEMAIL;
  $count_email = count($email_object);
  if($count_email == 0){
	$alt_email = "-";
  }else{
	$alt_email = $email_object;
  }
  
  $middle_name_object = (array)$customer_info->MIDDLENAME;
  $count_mname = count($middle_name_object);
  if($count_mname == 0){
	$middle_name = "-";
  }else{
	$middle_name = $middle_name_object;
  }
  
  $ompany_name_object = (array)$customer_info->COMPANYNAME;
  $count_cname = count($ompany_name_object);
  if($count_cname == 0){
	$company_name = "-";
  }else{
	$company_name = $ompany_name_object;
  }
  $customer_number = $customer_info->CUSTOMERNO;
  $INDIVIDUAL = $customer_info->INDIVIDUAL;
  
  if($INDIVIDUAL == 'Y'){
	$individual_text = 'Individual';
  }else{
	$individual_text = 'Organization';
  }
  
  $CUSTOMERTYPE = $customer_info->CUSTOMERTYPE;
  $CATEGORYDESC = $customer_info->CATEGORYDESC;
  $OPENTITYNAME = $customer_info->OPENTITYNAME;
  $CURRENCYCODE = $customer_info->CURRENCYCODE;
  $CUSTOMERTYPEDESC = $customer_info->CUSTOMERTYPEDESC;
  $TITLE = $customer_info->TITLE;
  $FIRSTNAME = $customer_info->FIRSTNAME;
  $LASTNAME = $customer_info->LASTNAME;
  $MOBILEPHONE = $customer_info->CONTACTINFO->MOBILEPHONE;
  $EMAIL = $customer_info->CONTACTINFO->EMAIL;

?>
<table width="100%" border="0">
  <tr>
    <td class="purple_bg2"><h2>Customer Profile</h2></td>
  </tr>
  <tr>
  <td height="40" align="left" valign="middle" class="caf_col_15">Customer <span style="font-weight:normal">:#<?php echo $customer_number;?></span></td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td class="blue_bg">Customer Details</td>
  </tr>
  <tr>
  <td height="40" align="left" valign="bottom">
  <table width="100%" border="0">
  <tr>
    <td width="85" height="40px" class="caf_col_15">Individual/Org</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $individual_text; ?></td>
    <td width="240">&nbsp;</td>
    <td width="136" class="caf_col_15"> Customer Type</td>
    <td width="27" align="center" valign="middle">:</td>
    <td width="236" class="caf_col_15" style="font-weight:normal"><?php echo $CUSTOMERTYPE; ?></td>
  </tr>
  
  <tr>
    <td width="85" height="40px" class="caf_col_15"> Category</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $CATEGORYDESC?></td>
    <td width="240">&nbsp;</td>
    <td width="136" class="caf_col_15"> Operational Entity</td>
    <td width="27" align="center" valign="middle">:</td>
    <td class="caf_col_15" style="font-weight:normal"><?php echo $OPENTITYNAME?></td>
  </tr>
  
  <tr>
    <td width="85" height="40px" class="caf_col_15">Currency</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $CURRENCYCODE?></td>
    <td width="240">&nbsp;</td>
    <td width="136" class="caf_col_15"> Customer description</td>
    <td width="27" align="center" valign="middle">:</td>
    <td class="caf_col_15" style="font-weight:normal"><?php echo $CUSTOMERTYPEDESC; ?></td>
  </tr>
  
  
</table>

  </td>
  </tr>
</table>

<table width="100%" border="0">
  <tr>
    <td class="blue_bg">Personal Details</td>
  </tr>
  <tr>
  <td height="40" align="left" valign="bottom">
  
  <table width="100%" border="0">
  <tr>
    <td width="85" height="40px" class="caf_col_15"> First Name</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $TITLE;echo $FIRSTNAME; ?></td>
    <td width="240">&nbsp;</td>
    <td width="141" class="caf_col_15">Middle Name</td>
    <td width="18" align="center" valign="middle">:</td>
    <td width="262" class="caf_col_15" style="font-weight:normal"><?php echo $middle_name; ?></td>
  </tr>
  
  <tr>
    <td width="85" height="40px" class="caf_col_15">Last Name</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $TITLE;echo $LASTNAME; ?></td>
    <td width="240">&nbsp;</td>
    <td width="141" class="caf_col_15">Company Name</td>
    <td width="18" align="center" valign="middle">:</td>
	<td width="262" class="caf_col_15" style="font-weight:normal"><?php echo $company_name; ?></td>
    <td class="caf_col_15" style="font-weight:normal"></td>
  </tr>
</table>
  
  </td>
  </tr>
</table>


<table width="100%" border="0" style="margin-top:10px;">
  <tr>
    <td class="blue_bg">Contact Details</td>
  </tr>
  <tr>
  <td height="40" align="left" valign="bottom">
  
  
  <table width="100%" border="0">
  <tr>
    <td width="95" height="40px" class="caf_col_15"> Contact Name</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $contact_name; ?></td>
    <td width="240">&nbsp;</td>
    <td width="137" class="caf_col_15"> Home Phone </td>
    <td width="21" align="center" valign="middle">:</td>
    <td width="272" class="caf_col_15" style="font-weight:normal"><?php echo $home_phone; ?></td>
  </tr>
  
  <tr>
    <td width="85" height="40px" class="caf_col_15">Work Phone</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $work_phone; ?></td>
    <td width="240">&nbsp;</td>
    <td width="137" class="caf_col_15">Mobile</td>
    <td width="21" align="center" valign="middle">:</td>
    <td class="caf_col_15" style="font-weight:normal"><?php echo $MOBILEPHONE; ?></td>
  </tr>
  
  <tr>
    <td width="85" height="40px" class="caf_col_15">Fax</td>
    <td width="50" align="center" valign="middle">:</td>
    <td width="140" class="caf_col_15" style="font-weight:normal"><?php echo $fax_number; ?></td>
    <td width="240">&nbsp;</td>
    <td width="137" class="caf_col_15">Email</td>
    <td width="21" align="center" valign="middle">:</td>
    <td class="caf_col_15" style="font-weight:normal"><?php echo $EMAIL; ?></td>
  </tr>
  <tr>
    <td height="30" class="caf_col_15">Alt. Email</td>
    <td align="center" valign="middle">:</td>
    <td class="caf_col_15" style="font-weight:normal"><?php echo $alt_email; ?></td>
    <td>&nbsp;</td>
    <td class="caf_col_15">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td class="caf_col_15" style="font-weight:normal">&nbsp;</td>
  </tr>
</table>
  
  </td>
  </tr>
</table>

<table width="100%" border="0" style="margin-top:10">
  <tr>
    <td width="50%" class="contactform_bg2">Primary Address</td>
    <td width="1%">&nbsp;</td>
    <td width="49%" class="contactform_bg2">Billing Address </td>
  </tr>
  <tr>
    <td class="primary_address"><?php echo $customer_info->ADDRESSINFO[0]->ADDRESS1;?>,
	<?php echo $customer_info->ADDRESSINFO[0]->ADDRESS2;?>,
	<?php echo $customer_info->ADDRESSINFO[0]->STREET;?>,<?php echo $customer_info->ADDRESSINFO[0]->CITY;?>,
	</br>
	<?php echo $customer_info->ADDRESSINFO[0]->DISTRICT;?>,<?php echo $customer_info->ADDRESSINFO[0]->STATE;?>.<?php echo $customer_info->ADDRESSINFO[0]->ZIPCODE;?>,
	<?php echo $customer_info->ADDRESSINFO[0]->COUNTRY;?>
 </td>
    <td>&nbsp;</td>
    <td class="primary_address"><?php echo $customer_info->ADDRESSINFO[0]->ADDRESS1;?>,
	<?php echo $customer_info->ADDRESSINFO[0]->ADDRESS2;?>,
	<?php echo $customer_info->ADDRESSINFO[0]->STREET;?>,<?php echo $customer_info->ADDRESSINFO[0]->CITY;?>,
	</br>
	<?php echo $customer_info->ADDRESSINFO[0]->DISTRICT;?>,<?php echo $customer_info->ADDRESSINFO[0]->STATE;?>.<?php echo $customer_info->ADDRESSINFO[0]->ZIPCODE;?>,
	<?php echo $customer_info->ADDRESSINFO[0]->COUNTRY;?></td>
  </tr>
</table>
<?php
}
?>
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