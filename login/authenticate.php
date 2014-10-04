<?php
//@include("auth.php");
include('functions.php');

$username =$_POST['txtuname'];
$password = $_POST['txtpwd'];



$authenticateuser = AuthenticateUser($username ,$password );

if(is_object($authenticateuser))
{
	session_start();
	$_SESSION['username']=$_POST['txtuname'];
	$_SESSION['password']=$_POST['txtpwd'];
	$cust_no = 'BB1770';
	$customer_info = GetCustomerInfo($cust_no);
	
	$balance = GetCustomerBalance($cust_no);
	if($customer_info != "")
	{
		$_SESSION['first_name'] = $customer_info->FIRSTNAME;
		$_SESSION['last_name'] = $customer_info->LASTNAME;	
		$_SESSION['customer_no'] = $cust_no;
		
		$_SESSION['c_mobile'] = $customer_info->CONTACTINFO->MOBILEPHONE;
		$_SESSION['c_email'] = $customer_info->CONTACTINFO->EMAIL;
		
		$_SESSION['c_address1'] = $customer_info->ADDRESSINFO[0]->ADDRESS1;
		$_SESSION['c_address2'] = $customer_info->ADDRESSINFO[0]->ADDRESS2;
		$_SESSION['c_street'] = $customer_info->ADDRESSINFO[0]->STREET;
		$_SESSION['c_city'] = $customer_info->ADDRESSINFO[0]->CITY;
		$_SESSION['c_district'] = $customer_info->ADDRESSINFO[0]->DISTRICT;
		$_SESSION['c_state'] = $customer_info->ADDRESSINFO[0]->STATE;
		$_SESSION['c_zipcode'] = $customer_info->ADDRESSINFO[0]->ZIPCODE;
		$_SESSION['c_country'] = $customer_info->ADDRESSINFO[0]->COUNTRY;
		
		$_SESSION['c_amount'] = $balance->AMOUNT;
$_SESSION['C_OPENTITYNAME'] = $customer_info->OPENTITYNAME;
		
	}
	//echo "AuthenticateUser Successfully Done.";
	header('location:summary.php');
	
}
else
{	
	$msg=error_code($authenticateuser);
	header('location:login.php?msg='.$msg);	
}
?>