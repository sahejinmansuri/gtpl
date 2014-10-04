<?php
	//Start session
	@session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['username']) || (trim($_SESSION['username']) == '')) 
	{
		//header("location: access-denied.php");
		header("location: login.php");
		exit();
	}
	
	if( isset($_SESSION['LAST_REQUEST']) &&
    (time() - $_SESSION['LAST_REQUEST'] >3600) ) {
    session_unset();
    session_destroy();
	header("location: login.php");
    exit();
}
 
$_SESSION['LAST_REQUEST'] = time();
?>