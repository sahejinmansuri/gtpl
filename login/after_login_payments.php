<?php 

include("header.php");

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to GTPL</title>
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
include('functions.php');

function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
	
    foreach ($array as $ii => $va) {
		$test = $va->$key;
		$test1 = substr($test, 0,3);
		$test2 = substr($test, 3,3);
		$test3 = substr($test, 6);

		$final_test = $test2.$test1.$test3;
        $sorter[$ii]=strtotime($final_test);
    }
    arsort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[]=$array[$ii];
    }
    return $ret;
}
$username = $_SESSION['username'];
$cust_no = $_SESSION['customer_no'];
//echo "<pre>";
	$customer_info = GetCustomerInfo($cust_no);
	$getpayments = GetPayments($cust_no);
	//print_r($getpayments);
	if(is_object($getpayments))
	{
		?>
      <table width="100%" border="0">
        <tr>
          <td class="purple_bg2"><h2>My Payments</h2></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="middle" class="caf_col_15" style="border-bottom:1px solid #000;"><?php include('logindetail.php'); ?></span></td>
        </tr>
      </table>
      <table width="100%" border="0" style="margin-top:20px;">
  <tr>
    <td width="220" class="pay_title_bg">Payment Date</td>
    <td width="1" >&nbsp;</td>
    <td width="452" class="pay_title_bg">Particulars</td>
    <td width="1">&nbsp;</td>
    <td width="222" align="right" valign="middle" class="pay_title_bg" >Amount</td>
  </tr>
  
  <?php
$test = $getpayments->PAYMENTINFO;
		//print_r($test);
		
		$test1 = array();
		$test1 = aasort($test,"PAYMENTDATE");
foreach($test1 as $row)
{

 ?>
 <tr>
    <td width="220" class="input_box_1" style="width:auto; font-size:13px;"><?php echo $row->PAYMENTDATE; ?></td>
    <td width="1" >&nbsp;</td>
    <td width="452" class="input_box_1" style="width:auto;  font-size:13px;"><?php echo $row->PARTICULARS; ?></td>
    <td width="1">&nbsp;</td>
    <td width="222" align="right" valign="middle" class="input_box_1" style="width:auto;  font-size:13px;"><?php echo $row->AMOUNT; ?></td>
  </tr>
  <?php
}
?>
</table>
<?php
      }else{
		$msg = error_code($getpayments);
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