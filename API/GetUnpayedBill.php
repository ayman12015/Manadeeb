<?php
header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");

$CustId="1";

	if(isset($_REQUEST['CustId']))
		$CustId=GetVal('CustId');
		

$sql="select * from customers_bills where  cust_id='$CustId' and payment_status = 0 ORDER BY BillId DESC";


$List = array();
$ListQuery=mysqli_query($dbconn,$sql);
if(mysqli_num_rows($ListQuery))
				{
while($row = mysqli_fetch_array($ListQuery))
	{
array_push($List, array(
'billId' => $row['BillId'],
'billDate' => $row['BillDate'],
'ProdQty' => $row['ProdQty'],
'ProdPrice' => $row['ProdPrice'],
'ProdName' => $row['ProdName'],
'SizerName' => $row['SizerName']
));
	}
/////////////////
		echo json_encode($List,JSON_UNESCAPED_UNICODE);/////////////////
///////////////
			}
			else
			{
		echo "Null";
			}		
die;	
?>