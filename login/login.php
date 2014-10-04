
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to GTPL</title>
<link rel="shortcut icon" href="images/favicon_icon.png" />
	<link rel='stylesheet' type='text/css' href='css/menu.css' />
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    	<script type='text/javascript' src='menu_jquery.js'></script>

<?php
$IE8 = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE 8') ? true : false;
$IE7 = strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE 7') ? true : false;
?>        

<!--[if IE 7]>
<link rel="stylesheet" href="css/ie7.css" type="text/css" />
<![endif]-->
	<!--[if IE 8]>
<link rel="stylesheet" href="css/ie8.css" type="text/css" />
<![endif]-->
        
<!---for inputype--->
<script>
function autotab(original,destination){
if (original.getAttribute&&original.value.length==original.getAttribute("maxlength"))
destination.focus()
}
</script>
<!---end for inputype--->
<link rel="stylesheet" type="text/css" href="css/gtpl_style.css" />

<link href="src/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
			jQuery('#demo2').skdslider({'delay':5000, 'animationSpeed': 1000,'showNextPrev':true,'showPlayButton':false,'autoSlide':true,'animationType':'sliding'});
			jQuery('#demo3').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
			
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>		
	<script typ="text/javascript">
 var namepattern=/^[a-zA-Z]+$/
 var phonepattern = /^\d{10}$/
 var emailpattern =/^[a-zA-Z][a-zA-Z0-9_]*(\.[a-zA-Z0-9_]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.([a-zA-Z]{2,4})$/
 var emailpattern2 =/^[a-zA-Z][a-zA-Z0-9_]*(\.[a-zA-Z0-9_]+)*$/
 var idpattern=/^\d{6}$/;

function validateForm()
{

 var x=document.forms["form1"]["txtuname"];
 if (x.value=="")
   {
 
  document.getElementById('pointuname').innerHTML="Please Enter Your Username.";
    x.focus();
  return false;
   }
 document.getElementById('pointuname').innerHTML='';

 x=document.form1.txtpwd;
 if(x.value=="")
 {
  x.value="";
  document.getElementById('pointpwd').innerHTML="Please Enter Your Password";
  x.focus();
  return false;
 }
 document.getElementById('pointpwd').innerHTML="";

}
</script>	


</head>
<body>
<div id="header_wrapper">

<div id="header">
<div class="logo"><a href="../"><img src="images/logo.png" width="148" height="55" / border="0"></a></div>

<div class="cont_right">
<a href="login.php"><button class="signin_button">Sign In</button></a>
<a href="../node/433"><button class="register_button">Register</button></a>
<div class="mob_icon"><span></span>+91-9727-633-633<br />
+91-1800-2330-233</div>

</div>
<div class="clear"></div>
</div>


<div id='cssmenu'>
<ul>
   <li><a href='../'><span>HOME</span></a></li>
   <li class='has-sub'><a href='#'><span>TELEVISION</span></a>
      <ul>
         <li><a href='../node/2'><span>Standard Definition</span></a>
         </li>
         <li class='last'><a href='../node/3'><span>High Definition</span></a></li>
         <li class='last'><a href='../node/4'><span>Digital Cable TV Packages</span></a></li>
<li><a href='#'><span>TV schedule</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>BROADBAND</span></a>
   
   <ul>
         <li><a href='../node/5'><span>plan Selector</span></a></li>
         <li class='last'><a href='../node/6'><span>View Plans</span></a></li>
      </ul>
   
     <!--- <ul>
         <li><a href='#'><span>About</span></a></li>
         <li class='last'><a href='#'><span>Location</span></a></li>
      </ul>---->
   </li>
   <li><a href='#'><span>CAREER</span></a>
   	 <ul>
         <li><a href='../node/7'><span>People</span></a></li>
         <li><a href='../node/8'><span>Current Openings</span></a></li>
      </ul>
   
   </li>
       <li><a href='#'><span>ABOUT US</span></a>
      <ul>
         <li><a href='../node/389'><span>Corporate Philosophy</span></a>
         </li>
         <li class='last'><a href='../node/391'><span>Leaders</span></a></li>
         <li class='last'><a href='../node/461'><span>Timeline</span></a></li>
      </ul>
       </li>
         <li><a href='../node/10'><span>CUSTOMER SUPPORT</span></a></li>
      <li class='last'><a href='../node/11'><span>CONTACT US</span></a></li>
   


</ul>
</div>

</div>

<div class="pack_wrapper">
<div class="wrapper">
<div id="message" style="margin-left:400px;">
<?php 
if(isset($_REQUEST['msg'])){
	echo $_REQUEST['msg'];
}
?>
</div>
<form method="post" action="authenticate.php" name="form1">
<div class="login">

<div width="150"><i style="color:red;" id="pointuname"></i> </div>
<div class="login_inner">
<div class="login_icon"><img src="images/login_man.png" /></div>
<input type="text" name="txtuname" placeholder="User Name" />

</div>
<div width="150"><i style="color:red;" id="pointpwd"></i> </div>
<div class="login_inner">
<div class="login_icon"><img src="images/lock.png" width="16" height="20" style="margin-top:2px" /></div>
<input type="password" name="txtpwd" placeholder="Password" />
</div>
<?php if($IE8 || $IE7){ ?>
<div class="login_input">
	<div class="broad_input">
		<input type="radio" class="login" id="radio1" name="radiog_lite">
		<label class="login_1" for="radio1">Broadband</label>
	</div>
	<div class="digital_input">
		<input type="radio" class="login" id="radio2" name="radiog_lite">
		<label class="login_1" for="radio2">Digital Cable TV</label>
	</div>
</div>
<?php } else { ?>

<div class="login_input">

<input type="radio" class="login" id="radio1" name="radiog_lite">
<label class="login_1" for="radio1"><br />Broadband</label>

<input type="radio" class="login" id="radio2" name="radiog_lite">
<label class="login_1" for="radio2"><br /> Digital Cable TV</label>

</div>
<?php } ?>

<!--<div class="login_inner">
<div class="login_icon"><img src="images/select_hand.png" width="20" height="24" /></div>

<div class="lg_select">
<select>
<option selected="selected" value="">Select</option>
<option>Broadband</option>
<option>Digital Cable TV</option>
</select>



</div>
	
</div>-->

<div class="login_option">
</div>

<div class="login_button">
<button type="submit" onClick="return validateForm()" name="submit">Login</button>
</div>

<div class="forgotpass"><a href="#"> Forgot your Password?</a></div>

</div>
</form>


</div>
<div class="clear"></div>
</div>

</body>
</html>
<?php 
include("footer.php");
?>