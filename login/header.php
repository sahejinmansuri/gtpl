<?php 
 @session_start(); 
require_once('auth.php');
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
<div id="header_wrapper">
  <div id="header">
    <div class="logo"><a href="summary.php"><img src="images/logo.png" width="148" height="55" / border="0"></a></div>
    <form method="post" action="logout.php">
	<div class="cont_right">
      <h1>Welcome <?php @session_start(); echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></h1>
      <a href="login.php">
	  </a>
	  
	<button  class="signout_button" type="submit" name="logout">Sign Out</button>
	
      
      <!--<a href="caf.html"><button class="register_button">Register</button></a>-->
      <div class="mob_icon"><span></span>+91-9727-633-633<br />
        +91-1800-2330-233</div>
    </div>
	</form>
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
   <!--<li><a href='index.html'><span>HOME</span></a></li>-->
   <li class='has-sub'><a href='#'><span>My Account</span></a>
      <ul>
         <li><a href="after_login_profile.php"><span>My Profile</span></a>         </li>
         <li class='last'><a href='after_login_changepass.php' ><span>Change Password</span></a></li>
         <!--<li class='last'><a href='after_login_user_selfcare.php'><span>User Self-Care</span></a></li>-->
		 <li><a href='after_login_bills.php'><span>My Bills</span></a></li>
         <li><a href='after_login_payments.php' ><span>My Payments</span></a></li>
         <!--<li><a href='after_login_online_payment.html'><span>Online Payment</span></a></li>-->
      
         
      </ul>
   </li>
   
   <!--<li><a href='#'><span>Download Forms</span></a>
   	 <ul>
         <li><a href='career.html'><span>People</span></a></li>
         <li><a href='#'><span>Current Openings</span></a></li>
      </ul>-->
   </li>
       <!--<li><a href='#'><span>Order Management</span></a>
      <ul>
         <li><a href='after_login_book_Order.html'><span>Book or Modify Order</span></a></li>
         
      </ul>
       </li>-->
       <li class='has-sub'><a href='after_login_services.php'><span>Services</span></a>
   
   <!--<ul>
         <li><a href='plan/plan1/index.html'><span>plan Selector</span></a></li>
         <li class='last'><a href='#'><span>View Plans</span></a></li>
      </ul>-->
   
     <!--- <ul>
         <li><a href='#'><span>About</span></a></li>
         <li class='last'><a href='#'><span>Location</span></a></li>
      </ul>---->
   </li>
   
   <li><a href='#'><span>Order Showcase</span></a>
      <ul>
         <li><a href='after_login_use_detail.php'><span>Usage Details</span></a></li>
         <!--<li><a href='after_login_topup.html'><span>Top Up</span></a></li>-->
         
      </ul>
       </li>
         <!--<li class="last"><a href='#'><span>Service Request</span></a>
         
         <ul>
         
         <li><a href='#'><span>Register Ticket</span></a></li>
         
      </ul>
         
         </li> -->  
</ul>
</div>
</div>
</div>
</body>
</html>
<?php 
	@session_start();
	if(isset($_REQUEST['logout']))
	{
		session_destroy();
		header('location:auth.php');
				
	}
	if($_SESSION['first_name']==NUll)
	{
		header('location:login.php');
	}
	?>