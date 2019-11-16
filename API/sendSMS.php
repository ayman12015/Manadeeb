<?php
require('Unifonic/Autoload.php');
use \Unifonic\API\Client;
$client = new Client();

function SendSms($phone,$text,$sender){

}


try {

$response = $client->Messages->Send(249924594681,'Hello','Al-Sahaba'); // send regular massage
//$response = $client->Account->GetBalance();
//$response = $client->Account->getSenderIDStatus('Arabic');
//$response = $client->Account->getSenderIDs();
//$response = $client->Account->GetAppDefaultSenderID();
//$response = $client->Messages->Send('recipient','messageBody','senderName');
//$response = $client->Messages->SendBulkMessages('96650*******,9665*******','Hello','UNIFONIC');
//$response = $client->Messages->GetMessageIDStatus('9459*******');
//$response = $client->Messages->GetMessagesReport();
//$response = $client->Messages->GetMessagesDetails();


     //$response = $client->Messages->GetScheduled();
     print_r($response);
     
} catch (Exception $e) {

    echo $e->getCode();
}
?>