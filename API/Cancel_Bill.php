<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");
 
$Bill_id = '';

if(isset($_REQUEST['Bill_id']))
$Bill_id=$_REQUEST['Bill_id'];


$sql = "Update `customers_bills` set `payment_status` = 2 where BillId = {$Bill_id}" ;

if( mysqli_query($dbconn,$sql) )
	{
echo "Bill_Canceled"; 	
	}
	else
	{
echo "Error";
	}

?>