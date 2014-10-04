<?php

$wsdl = 'http://testselfcare.gtpl.net:85/SERVICE/SERVICE.ASMX?WSDL';
$namespace = 'http://tempuri.org/';
$elementName = 'MQUserNameToken';

$authenticationHeader = array
(
	'User_id' => 'RAJ_IT',
	'Password' => 'PASSWORD123',
    'ExternalPartyName'  => 'MQS_A',
);

$soapClient = new SoapClient($wsdl, array( "trace" => 1 ));

$soapHeader = new SoapHeader($namespace, $elementName, $authenticationHeader);
$soapHeaders[] = $soapHeader;
$soapClient->__setSoapHeaders($soapHeaders);

//$date = new DateTime();
//$timestamp=$date->getTimestamp();
$timestamp = time();
$RefNo="Att".$timestamp;

// ********** AuthenticateUser ************
function AuthenticateUser($username, $password){
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO><AUTHENTICATEUSER><USERNAME>'.$username.'</USERNAME><PASSWORD>'.$password.'</PASSWORD></AUTHENTICATEUSER></REQUESTINFO>';
	$params = array(
		'MQUserNameToken' => $soapHeader,
		'AuthenticateUserXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->AuthenticateUser($params);
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	//print_r($final_php);
	$response = $final_php->Body->AuthenticateUserResponse->AuthenticateUserResult->RESPONSEINFO;


	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response;
	}else{
		return $error;
	}
}

// ********** GetCustomerBalance ************
function GetCustomerBalance($custno){
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO><KEY_NAMEVALUE><KEY_NAME>CUSTOMERNO</KEY_NAME><KEY_VALUE>'.$custno.'</KEY_VALUE></KEY_NAMEVALUE></REQUESTINFO>';
	$params = array(
		'MQUserNameToken' => $soapHeader,
		'GetCustomerBalanceXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->GetCustomerBalance($params);
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	$response = $final_php->Body->GetCustomerBalanceResponse->GetCustomerBalanceResult->RESPONSEINFO;
	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response->BALANCEINFO;
	}else{
		return false;
	}
}
// ********** GetCustomerInfo ************
function GetCustomerInfo($custno){
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO><KEY_NAMEVALUE><KEY_NAME>CUSTOMERNO</KEY_NAME><KEY_VALUE>'.$custno.'</KEY_VALUE></KEY_NAMEVALUE></REQUESTINFO>';
	$params = array(
		'MQUserNameToken' => $soapHeader,
		'CustomerInfoXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->GetCustomerInfo($params);
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	
	$response = $final_php->Body->GetCustomerInfoResponse->GetCustomerInfoResult->RESPONSEINFO;
	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response->CUSTOMERINFO;
	}else{
		return false;
	}
}

// ********** ChangePassword ************
function ChangePassword($username, $old_password, $new_password, $confirm_password){
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO><CHANGEPASSWORD>
	<USERNAME>'.$username.'</USERNAME>
	<OLDPASSWORD>'.$old_password.'</OLDPASSWORD>
	<PASSWORD>'.$new_password.'</PASSWORD>
	<CONFIRMPASSWORD>'.$confirm_password.'</CONFIRMPASSWORD>
</CHANGEPASSWORD></REQUESTINFO>';
	$params = array(
		'MQUserNameToken' => $soapHeader,
		'ChangePasswordXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->ChangePassword($params);
	
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	print_r($final_php);
	$response = $final_php->Body->ChangePasswordResponse->ChangePasswordResult->RESPONSEINFO;
	$error = $response->STATUS->ERRORNO;
	
	if($error == 0){
		return $response;
	}else{
		return $error;

	}
}
// ********** CreateUserSelfCare ************
function CreateUserSelfCare($cust_no,$newuname,$userdisc,$newpwd,$newcpwd,$validfrom,$validto,$privalcode,$funtype,$funid)
{
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO>
<KEY_NAMEVALUE>
<KEY_NAME>CUSTOMERNO</KEY_NAME>
<KEY_VALUE>'.$cust_no.'</KEY_VALUE>
</KEY_NAMEVALUE>
<CREATEUSERSELFCARE>
<USERNAME>'.$newuname.'</USERNAME>
<USERDESCRIPTION>'.$userdisc.'</USERDESCRIPTION>
<PASSWORD>'.$newpwd.'</PASSWORD>
<CONFIRMPASSWORD>'.$newcpwd.'</CONFIRMPASSWORD>
<EMAIL></EMAIL>
<VALIDFROM>'.$validfrom.'</VALIDFROM>
<VALIDTO>'.$validto.'</VALIDTO>
</CREATEUSERSELFCARE>
<PRIVILEGEINFO>
</PRIVILEGEINFO>
</REQUESTINFO>';

	$params = array(
		'MQUserNameToken' => $soapHeader,
		'CreateUserSelfCareXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->CreateUserSelfCare($params);
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	//print_r ($final_php);
	$response = $final_php->Body->CreateUserSelfCareResponse ->CreateUserSelfCareResult->RESPONSEINFO;
	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response->STATUS->MESSAGE;
	}else{
		return false;
	}
}

// ********** GetPayments ************
function GetPayments($custno){
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO><KEY_NAMEVALUE><KEY_NAME>CUSTOMERNO</KEY_NAME><KEY_VALUE>'.$custno.'</KEY_VALUE></KEY_NAMEVALUE></REQUESTINFO>';
	$params = array(
		'MQUserNameToken' => $soapHeader,
		'GetPaymentsXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->GetPayments($params);
	
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	
	$response = $final_php->Body->GetPaymentsResponse->GetPaymentsResult->RESPONSEINFO;
	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response->PAYMENT;
	}else{
		return $error;

	}
}

// ********** GetUsageDetails ************
function GetUsageDetails($cust_no,$CONTRACTNO,$SERVICEID,$FROMDATE,$TODATE){
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO>
  <KEY_NAMEVALUE>
    <KEY_NAME>CUSTOMERNO</KEY_NAME>
    <KEY_VALUE>'.$cust_no.'</KEY_VALUE>
  </KEY_NAMEVALUE>
  <GETUSAGEDETAILS>
    <CONTRACTNO>'.$CONTRACTNO.'</CONTRACTNO>
    <SERVICECODE>13</SERVICECODE>
    <FROMDATE>'.$FROMDATE.'</FROMDATE>
    <TODATE>'.$TODATE.'</TODATE>
  </GETUSAGEDETAILS>
</REQUESTINFO>';
	
	$params = array(
		'MQUserNameToken' => $soapHeader,
		'GetUsageDetailsXML'=> $get_cust_aut, 
		'ReferenceNo' => $RefNo,
	);
	$result_auth=$soapClient->GetUsageDetails($params);
	
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	//print_r($final_php);
	$response = $final_php->Body->GetUsageDetailsResponse->GetUsageDetailsResult->RESPONSEINFO;
	print_r($response);
	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response->STATUS->GETUSAGEDETAILS;
	}else{
		return $error;

	}
}
// ********** AvailableUsageLimit ************
function AvailableUsageLimit($cust_no)
{
	global $soapHeader, $soapClient, $RefNo;
	$get_cust_aut='<REQUESTINFO>
<KEY_NAMEVALUE>
<KEY_NAME>CUSTOMERNO</KEY_NAME>
<KEY_VALUE>'.$cust_no.'</KEY_VALUE>
</KEY_NAMEVALUE>
<AVAILABLEUSAGELIMIT>
<SERVICEID></SERVICEID>
</AVAILABLEUSAGELIMIT>
</REQUESTINFO>';

	$params = array(
		'MQUserNameToken' => $soapHeader,
		'AvailableUsageLimitXML'=>$get_cust_aut,
		'ReferenceNo' => $RefNo
	);
	$result_auth=$soapClient->AvailableUsageLimit($params);
	$final_php = convertXmlToPhp($soapClient->__getLastResponse());
	//print_r ($final_php);
	$response = $final_php->Body->AvailableUsageLimitResponse ->AvailableUsageLimitResult->RESPONSEINFO;
	$error = $response->STATUS->ERRORNO;
	if($error == 0){
		return $response->STATUS->AVAILABLEUSAGELIMIT;
	}else{
		return false;
	}
}
// **********************errors code************************
function error_code($error){
	$error_codes = array(
		'10093' => 'User Already Exists With This User name',
		'40007' => 'Password and confirm password should be same',
		'40034' => 'Please specify UserName',
		'40035' => 'Please Specify Password',
		'40037' => 'Not a valid User',
		'40039' => 'Please Specify Confirm Password',      
		'40046' => 'Please Specify old Password',
		'40047' => 'Password changed successfully',
		'40001' => 'Invalid username',
		'40062' => 'Invalid password',
		'1005' => 'No Privilege',
		'1076' => 'Details are not provided properly',
		'1077' => 'No details exist for the request provided',
		'-1422' => 'Error',
	);
	if(isset($error_codes[$error])){
		return $error_codes[$error];
	}else{
		return false;
	}
	
}
//convert xml string to php array
function convertXmlToPhp($xml){
	$xml = htmlspecialchars_decode($xml);
	$xml = str_replace('<soap:Body>', '<Body>'.PHP_EOL, $xml);
$xml = str_replace('</soap:Body>', '</Body>', $xml);

	$xml = preg_replace('/xmlns:.*\"/','',$xml);

	$sxml = @simplexml_load_string($xml);

	$encode = json_encode($sxml);
	$array =  json_decode($encode);
	return $array;

	//if object valye is empty than use it to convert empty object to null
	/*
	$encode = json_encode($sxml);
	$strippedJson = str_replace(array('[]', '{}'), 'null', $encode);
	$array =  json_decode($strippedJson);
	return $array;
	*/
}
?>