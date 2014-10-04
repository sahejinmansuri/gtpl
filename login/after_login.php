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
<?php
@session_start();
include("functions.php");
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$cust_no = $_SESSION['customer_no'];

$customer_info = GetCustomerInfo($cust_no);

$first_name = $customer_info->FIRSTNAME;
$last_name = $customer_info->LASTNAME;
$full_name = $first_name." ".$last_name;
?>
<div id="header_wrapper">

<div id="header">
<div class="logo"><a href="index.html"><img src="images/logo.png" width="148" height="55" / border="0"></a></div>

<div class="cont_right">
      <h1>Welcome <?php echo $full_name; ?></h1>
      <a href="login.php">
      <button class="signout_button">Sign Out</button>
      </a>
      <!--<a href="caf.html"><button class="register_button">Register</button></a>-->
      <div class="mob_icon"><span></span>+91-9727-633-633<br />
        +91-1800-2330-233</div>
    </div>
<div class="clear"></div>

</div>

<!--<div class="nav">
<ul>
<li class="first"><a href="#">Home</a></li>
<li><a href="#">Television</a></li>
<li><a href="#">BROADBAND</a></li>
<li><a href="#">CAREER</a></li>
<li><a href="#">ABOUT US</a></li>
<li><a href="#">CUSTOMER SUPPORT</a></li>
<li><a href="#">CONTACT US</a></li>                           
</ul>

</div>-->

<div id='cssmenu'>
<ul>
   <li><a href='index.html'><span>HOME</span></a></li>
   <li class='has-sub'><a href='#'><span>TELEVISION</span></a>
      <ul>
         <li><a href='standard_definition.html'><span>Standard Definition</span></a>
         </li>
         <li class='last'><a href='heigh_definition.html'><span>High Definition</span></a></li>
         <li class='last'><a href='packages.html'><span>Digital Cable TV Packages</span></a></li>
		 <li><a href='tvschedule.html'><span>TV schedule</span></a></li>

      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>BROADBAND</span></a>
   
   <ul>
         <li><a href='plan/plan1/index.html'><span>plan Selector</span></a></li>
         <li class='last'><a href='#'><span>View Plans</span></a></li>
      </ul>
   
     <!--- <ul>
         <li><a href='#'><span>About</span></a></li>
         <li class='last'><a href='#'><span>Location</span></a></li>
      </ul>---->
   </li>
   <li><a href='#'><span>CAREER</span></a>
   	 <ul>
         <li><a href='career.html'><span>People</span></a></li>
         <li><a href='#'><span>Current Openings</span></a></li>
      </ul>
   
   </li>
       <li><a href='#'><span>ABOUT US</span></a>
      <ul>
         <li><a href='corporate_philosophy.html'><span>Corporate Philosophy</span></a>
         </li>
         <li class='last'><a href='leaders.html'><span>Leaders</span></a></li>
         <li class='last'><a href='timeline.html'><span>Timeline</span></a></li>
      </ul>
       </li>
         <li><a href='customersupport.html'><span>CUSTOMER SUPPORT</span></a></li>
      
      <li class='last'><a href='contactus.html'><span>CONTACT US</span></a></li>
   


</ul>
</div>

</div>

<!----banner---->

<div class="banner_main">
<div class="brn"><img src="images/add_banner.jpg" width="1300" height="300" /></div>
</div>

<!----end banner---->



<!----section1 start---->
<div class="section_1">
<div class="wrapper">
<h1>Welcome <?php echo $full_name; ?></h1>

<div class="add_left">
<ul>

<li><a href="after_login_bills.html">View your Bills		</a></li>
<li><a href="after_login_profile.html">Update your Profile</a></li>
<li><a href="after_login_changepass.html">Change/Reset (fulfillment of security questions/OTP) your  Password</a></li>
<li><a href="after_login_payments.html">Renew and Payment via netbanking/credit or debit card etc	</a></li>
<li><a href="#">View Usage Details </a></li>
<li><a href="after_login_payments.html">View Payment History 		</a></li>	
<li><a href="after_login_bills.html">Access to e-bills 			</a></li>
<li><a href="after_login_services.html">Service Request Tracking			</a></li>
<li><a href="#">Download Forms (Relocation Form/Replacement Form etc)</a></li>

</ul>
</div>

<div class="add_right"><img src="images/add.jpg" /></div>
    
  </div>
<div class="clear"></div>
</div>

<!----section1 end---->



</body>
</html>

<?php 
include("footer.php");
?>