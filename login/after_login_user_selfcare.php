<?php 
@include("auth.php");
include("header.php");
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
		include("functions.php");
		$username = $_SESSION['username'];
		$cust_no =$_SESSION['customer_no'];
		$customer_info = GetCustomerInfo($cust_no);
if($customer_info != "")
{
	  ?>
      <table width="100%" border="0">
	 <?php
		if(isset($msg))
	{
	echo $msg;
	}
	 ?>
        <tr>
          <td class="purple_bg2"><h2>User Self-Care</h2></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="middle" class="caf_col_15" style="border-bottom:1px solid #000;">Customer <span style="font-weight:normal">:#<?php echo $customer_info->CUSTOMERNO;?></span></td>
        </tr>
      </table>
	  <form method="post" action="">
      <table width="60%" border="0" style="float:left;">
        <tr>
          <td height="40" align="left" valign="bottom"><table width="100%" border="0">
              <tr>
                <td width="140" height="50" align="left" valign="middle" class="caf_col_15"><em>*</em>&nbsp;User ID</td>
                <td width="273" class="caf_col_15"><input class="input_box_1" type="text" style="height:15px;" name="txtuid" value="<?php echo $username; ?>" /></td>
                <td width="121">&nbsp;</td>
              </tr>
              <tr>
                <td width="140" height="50" align="left" valign="middle" class="caf_col_15"><em>*</em>&nbsp;Name</td>
                <td width="273" class="caf_col_15"><input class="input_box_1" type="text" style="height:15px;" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">Password</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="password" name="txtpwd" style="height:15px;" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">Confirm Password </td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="password" name="txtcnfpwd" style="height:15px;" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">Status</td>
                <td align="left" valign="middle" class="caf_col_15" style="font-weight:normal"><select name="ctl00$uxPgCPH$status" size="1" class="select" id="ctl00_uxPgCPH_status" title="">
                    <option value="A" selected="selected" title="Active">Active</option>
                    <option value="I" title="Inactive">Inactive</option>
                    <option value="T" title="Terminate">Terminate</option>
                  </select></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15"><em>*</em>&nbsp;Email Address</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="text" name="txtemail" style="height:15px;" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">Mobile Number</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="text" name="txtmobile" style="height:15px;" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15"><em>*</em>&nbsp;Valid From</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="text" name="fromdate" style="height:15px;" />&nbsp;&nbsp;&nbsp;<input type="image" align="absMiddle" id="dpick1" class="textalignedimg" src="http://testselfcare.gtpl.net:85//Themes/DEFAULT/SELFCARE/Images/calendar.gif"></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">Valid To</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="text" name="todate" style="height:15px;" />&nbsp;&nbsp;&nbsp;<input type="image" align="absMiddle" id="dpick1" class="textalignedimg" src="http://testselfcare.gtpl.net:85//Themes/DEFAULT/SELFCARE/Images/calendar.gif"></td>
                <td>&nbsp;</td>
              </tr>
			  
              <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">Originating Source </td>
                <td height="50"class="caf_col_15" style="font-weight:normal"><table cellspacing="0" border="0" class="chkboxlist skipline" id="ctl00_uxPgCPH_OriginatingSource">
                    <tbody>
                      <tr>
                        <td style="" class="  oldsubelement"><input type="checkbox" name="ctl00$uxPgCPH$OriginatingSource$0" id="ctl00_uxPgCPH_OriginatingSource_0">
                          <label for="ctl00_uxPgCPH_OriginatingSource_0">&nbsp;Web</label></td>
                        <td style="" class="  oldsubelement"><input type="checkbox" name="ctl00$uxPgCPH$OriginatingSource$1" id="ctl00_uxPgCPH_OriginatingSource_1">
                          <label for="ctl00_uxPgCPH_OriginatingSource_1">&nbsp;Mobile</label></td>
                        <td style="" class="  oldsubelement"><input type="checkbox" name="ctl00$uxPgCPH$OriginatingSource$2" id="ctl00_uxPgCPH_OriginatingSource_2">
                          <label for="ctl00_uxPgCPH_OriginatingSource_2">&nbsp;WebService</label></td>
                      </tr>
                    </tbody>
                  </table></td>
                <td>&nbsp;</td>
              </tr>
			 
			  <table>
			  <tr>
                <td height="50" align="left" valign="left" class="caf_col_15" style="font-weight:normal;">UserName</td>
                <td class="caf_col_15" style="font-weight:normal"><input class="input_box_1" type="text" name="txtuname" style="height:15px;" /></td>
				<span class="status"></span>
				<tr>
				<td>
				<input class="" name="check" type="submit" value="Chech Availability" style="height:30px;" /></td>
                <td>&nbsp;</td>
              </tr>
			 
			  <table>
            </table></td>
        </tr>
      </table>
	  
      
      <table width="40%" border="1" style="margin-top:10px;">
  <tr>
    <td class="blue_bg"> List of Privileges</td>
  </tr>
  <tr height="420">
    <td></td>
  </tr>
</table>

<div class="caf_btn" style="margin-top:20px;">
        <ul>
          <li style="float:right; margin-left:10px;"><a href="#">Cancel</a></li>
          <li style="float:right;"><button type="submit" class="save" name="save"> Save</button</li>
        </ul>
      </div>
</form>
      
      
      <div class="clear"></div>
	  <?php 
	  } 
	  ?>
    </div>
  </div>
  <div class="clear"></div>
</div>
</div>
<!----section1 end---->
<?php
include("footer.php");
?>
<!----footer start ---->
  <div class="clear"></div>
</div>
<!----design by end---->
</body>
</html>
<?php
if(isset($_POST['save']))
{
$cust_no = $_SESSION['customer_no'];
$newuname=	$_POST['txtuname'];
$userdisc='testsalfcare';
$newpwd=	$_POST['txtpwd'];
$newcpwd=	$_POST['txtcnfpwd'];
$email=	$_POST['txtemail'];
$validfrom=	$_POST['fromdate'];
$validto=	$_POST['todate'];
$privalcode='ADD';
$funtype='F';
$funid='7';

$selfcare = CreateUserSelfCare($cust_no,$newuname,$userdisc,$newpwd,$newcpwd,$validfrom,$validto,$privalcode,$funtype,$funid);
if($selfcare)
{	
echo "<pre>";
		//print_r($selfcare);
		$msg = 'User Self Care created successfully!';
		//header("location:done.php");
	}else
	{
		$msg = "User Self Care created Fail...!!!";
		//header("location:fail.php");
	}

}
?>
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