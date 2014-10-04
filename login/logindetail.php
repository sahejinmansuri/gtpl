<?php @session_start(); ?>
<style>
.wrapper_login {  margin: 0 auto; width: 100%;}


.customer_outer { border:2px solid #2980b9;}
.customer {padding:5px; background:#1261AC; color:#fff; font-size:14px; font-family:Arial, Helvetica, sans-serif; border-bottom:1px solid #2980b9;}
.customer p {  float: left; margin: 0 50px 0 0;}

.customer_detail { padding:1px 5px; background:#1261AC; color:#fff; font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:22px;}
.customer_name {
  float: left;
  margin: 5px 40px 5px 0;
  text-align: left;
  width: 18%;
}
.customer_address { width:37%; float:left; margin: 5px 40px 5px 0;text-align:left;}

.customer_mobile {width:20%; float:left; margin: 5px 40px 5px 0;}
.customer_rs {width:10%; float:left; margin: 5px 0px 5px 0;}
.clear { clear:both;}

</style>

<div class="wrapper_login">
	<div class="customer_outer">
		<div class="customer">
			<p>Customer</p><p><?php echo $cust_no; ?></p>
			<div class="clear"></div>
		</div>
		<div class="customer_detail">
			<p class="customer_name"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']."<br>".$_SESSION['C_OPENTITYNAME']; ?></p>
			<p class="customer_address">
				<?php echo $_SESSION['c_address1'].", ".$_SESSION['c_address2'].", ".$_SESSION['c_street'].", ".$_SESSION['c_city'].",<br> ".$_SESSION['c_district'].", ".$_SESSION['c_state'].", ".$_SESSION['c_zipcode'].", ".$_SESSION['c_country'];?>
			</p>
			<p class="customer_mobile">
				<?php echo $_SESSION['c_mobile']; ?><br>
				<?php echo $_SESSION['c_email']; ?>
			</p>
			<p class="customer_rs">Rs <?php echo $_SESSION['c_amount']; ?> Cr</p>
			<div class="clear"></div>
		</div>
	</div>
</div>