<?php

$AppSid="mKxfeHmIE_zufjYRPvoWuvr58zYKoq";
$apiUrl="http://api.unifonic.com/rest/Messages/Send";

function SendSms ($Body,$Recipient){
	global $AppSid,$apiUrl;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, FALSE);

	curl_setopt($ch, CURLOPT_POST, TRUE);

	curl_setopt($ch, CURLOPT_POSTFIELDS, "AppSid=$AppSid&Recipient=$Recipient&Body=$Body");

	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	  "Content-Type: application/x-www-form-urlencoded"));

	if($response = curl_exec($ch)){
	
	curl_close($ch);
	$arr = json_decode($response, true);

	$success=$arr["success"];
	$errorCode=$arr["errorCode"];
	 
	$MessageID		=$arr["data"]["MessageID"];
	$Status			=$arr["data"]["Status"];
	$NumberOfUnits	=$arr["data"]["NumberOfUnits"];
	$Cost 			=$arr["data"]["Cost"];
	$Balance		=$arr["data"]["Balance"];
	$Recipient		=$arr["data"]["Recipient"];
	$TimeCreated	=$arr["data"]["TimeCreated"];
	$CurrencyCode	=$arr["data"]["CurrencyCode"];

	echo $SqlStr = "INSERT INTO messagesLog 
		(MessageID,success,errorCode,`Status`,NumberOfUnits,Cost,Balance,Recipient,TimeCreated,`CurrencyCode`)
		VALUES
 		('$MessageID','$success','$errorCode','$Status','$NumberOfUnits','$Cost','$Balance','$Recipient','$TimeCreated','$CurrencyCode')";
	$res= db_query($SqlStr);
	}
	
	return $success;
}


?>