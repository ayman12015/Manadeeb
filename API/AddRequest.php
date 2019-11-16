<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");

$mRequest = print_r($_REQUEST, true);
storeRequest("AddRequest.php","Add a new Customer Request",$mRequest);


$ProdQty="";
$ProdPrice="";
$ProdName='';
$SizerName='';
$cust_id='';
$ReqBillDate='';

$List = array();

if(isset($_REQUEST['ProdQty']))
$ProdQty=GetVal('ProdQty');

if(isset($_REQUEST['ProdPrice']))
$ProdPrice=GetVal('ProdPrice');

if(isset($_REQUEST['ProdName']))
$ProdName=GetVal('ProdName');

if(isset($_REQUEST['SizerName']))
$SizerName=GetVal('SizerName');

if(isset($_REQUEST['cust_id']))
$cust_id=GetVal('cust_id');

if(isset($_REQUEST['ReqBillDate']))
$ReqBillDate=GetVal('ReqBillDate');

//2019-08-20
$ReqBillDate = date("Y-m-d",$ReqBillDate);

 
$New_Request_sql="INSERT INTO `customers_request` (ReqBillDate,ProdQty,ProdPrice,ProdName,SizerName,cust_id)
VALUES
 ('{$ReqBillDate}','{$ProdQty}','{$ProdPrice}','{$ProdName}','{$SizerName}','{$cust_id}')";

if( mysqli_query($dbconn,$New_Request_sql) )
	{
echo "Requested"; 	
    }
    else
    {
echo "Erorr"; 
//echo $New_Request_sql ;
    }

//}

    $mRequest = print_r($_REQUEST, true);
storeRequest("AddRequest.php","Add a new Customer Request, " . $New_Request_sql,$mRequest);

?>