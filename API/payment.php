<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");
 
$amt = '';
$Bill_Id = '';
$paymentType = '';
$amt = '';


if(isset($_REQUEST['amt']))
	$amt=$_REQUEST['amt'];

if(isset($_REQUEST['Bill_Id']))
	$Bill_Id=$_REQUEST['Bill_Id'];

if(isset($_REQUEST['paymentType']))
	$paymentType=$_REQUEST['paymentType'];

if(isset($_REQUEST['cheakNumber']))
	$cheakNumber=$_REQUEST['cheakNumber'];

if(isset($_REQUEST['banckName']))
	$banckName=$_REQUEST['banckName'];

if(isset($_REQUEST['cheakDate']))
	$cheakDate=$_REQUEST['cheakDate'];

	$sql = "INSERT INTO customers_bills_payment (pay_amt,BillId,pay_type) VALUES 
	('$amt','$Bill_Id','$pay_type')";	


if( mysqli_query($dbconn,$sql) )
	{
	$pay_id=mysqli_insert_id($dbconn)
	
	$checkSql = "INSERT INTO customers_bills_payment_checks 
	(checks_amt,checks_no,bank_name,check_dt,pay_id) VALUES 
	('$amt','$Bill_Id','$pay_type')";

	echo "Bill_Canceled"; 	
	}
	else
	{
echo "Error";
	}

?>