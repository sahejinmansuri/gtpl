<?php
include('functions.php');
$username = $_SESSION['username'];
if(isset($_REQUEST['submit_password'])){
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
if(isset($msg))
{
	echo $msg;
}
?>
<form action="" method="post" name="changePassword">
	<div class="password">
		<div class="label">Old Password</div>
		<input type="password" placeholder="Old Password" value="" name="old_password"  id="old_password" />
	</div>
	<div class="password">
		<div class="label">New Password</div>
		<input type="password" placeholder="New Password" value="" name="new_password" id="new_password" />
	</div>
	<div class="password">
		<div class="label">Confirm Password</div>
		<input type="password" placeholder="Confirm Password" value="" name="confirm_password" id="confirm_password" />
	</div>
	<div class="password">
		<input type="submit" name="submit_password" id="submit_password" value="Submit" />
	</div>
</form>