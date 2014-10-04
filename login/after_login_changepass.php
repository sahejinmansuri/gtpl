<?php @session_start();
	@include("auth.php");
	include("header.php");
	
$username = $_SESSION['username'];
$cust_no =$_SESSION['customer_no'];

if(isset($_REQUEST['submit_password'])){
	
	
	@include('functions.php');
	
	
	$old_password		= $_REQUEST['old_password'];
	$new_password		= $_REQUEST['new_password'];
	$confirm_password 	= $_REQUEST['confirm_password'];
	$change_password = ChangePassword($username,$old_password,$new_password,$confirm_password);

	if(is_object($change_password)){
		//print_r($change_password);
		$msg = 'Password changed successfully!';
	}else{
		$msg = error_code($change_password);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		
		//$customer_info = GetCustomerInfo($cust_no);
//if($customer_info != "")
{
	  ?>
	  <form method="post" action="">
      <table width="100%" border="0">
        <tr>
          <td class="purple_bg2" colspan="2"><h2>Change Password</h2></td>
        </tr>
		<tr>
          <td class="caf_col_15"><?php include('logindetail.php'); ?></td>
        </tr>
        <tr>
          
		  <td class="caf_col_15" style="border-bottom:1px solid #000; color:#f00;">
			<?php 
			if(isset($msg)){
				echo $msg;
			}
			?>
			</td>
        </tr>      </table>
      <table width="100%" border="0">
        <tr>
          <td height="40" align="left" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="81" height="40px" class="caf_col_15" style="font-weight:normal;">User ID</td>
                <td width="15" align="center" valign="middle">:</td>
                <td width="165" class="caf_col_15"><?php echo $_SESSION['username']; ?></td>
                <td width="225">&nbsp;</td>
                <td width="10" align="center" valign="middle" class="caf_col_15"><em>*</em></td>
                <td width="124" align="left" valign="middle" class="caf_col_15">Old Password</td>
                <td width="266" class="caf_col_15" style="font-weight:normal">
				<input class="input_box_1" type="password" name="old_password" style="height:15px;" /></td>
              </tr>
              <tr>
                <td width="81" height="40px" class="caf_col_15" style="font-weight:normal;">Name</td>
                <td width="15" align="center" valign="middle">:</td>
                <td width="165" class="caf_col_15"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];?></td>
                <td width="225">&nbsp;</td>
                <td width="10" align="center" valign="middle" class="caf_col_15"><em>*</em></td>
                <td width="124" align="left" valign="middle" class="caf_col_15">New Password</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="password" name="new_password" style="height:15px;" /></td>
              </tr>
              <tr>
                <td height="40px" class="caf_col_15">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td class="caf_col_15" style="font-weight:normal">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" valign="middle" class="caf_col_15"><em>*</em></td>
                <td align="left" valign="middle" class="caf_col_15">Confirm Password</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="password" name="confirm_password" style="height:15px;" /></td>
              </tr>
              <tr>
                <td height="23" class="caf_col_15">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td class="caf_col_15" style="font-weight:normal">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" valign="middle" class="caf_col_15">&nbsp;</td>
                <td align="left" valign="middle" class="caf_col_15">&nbsp;</td>
                <td class="caf_col_15" style="font-weight:normal">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table>
     <div class="caf_btn" style="width:735px;">
        <ul>
          <li style="float:right; margin-left:10px;"><input type="reset" name="" class="savebtn" value="Cancel"/></li>
          <li style="float:right;"><input type="submit" name="submit_password" class="savebtn" value="Save"/></li>
        </ul>
      </div>
      <div class="clear"></div>
	  </form>
	  <?php } ?>
    </div>
  </div>
  <div class="clear"></div>
</div>
</div>
<!----section1 end---->
<!----footer start ---->
<?php 
include("footer.php");
?>
<!----design by end---->
</body>
</html>