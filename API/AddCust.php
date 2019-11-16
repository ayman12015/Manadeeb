<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");
sec_session_start();

$date = date('Y-m-d');
$unixTimestamp = strtotime($date);
$dayOfWeek = date("l", $unixTimestamp);
//echo $date . ' fell on a ' . $dayOfWeek;


$daysArr = ['Saturday'=>'0' ,'Sunday' => '1','Monday' => '2','Tuesday' => '3','Wednesday' => '4','Thursday' => '5','Friday' => '6'];
 

$mRequest = print_r($_REQUEST, true);
storeRequest("AddCust.php","Add new Custoer",$mRequest);

$UserCompanyId="";
$CustName="";
$ShopName="";
$PhoneNumber="";
$DayId="";
$Lon="";
$Lan="";
$UserName="";
$UserPhone="";


	if(isset($_REQUEST['UserCompanyId']))
		$UserCompanyId=GetVal('UserCompanyId');

	if(isset($_REQUEST['CustName']))
		$CustName=GetVal('CustName');
	
	if(isset($_REQUEST['PhoneNumber']))
		$PhoneNumber=GetVal('PhoneNumber');
	
	if(isset($_REQUEST['ShopName']))
		$ShopName=GetVal('ShopName');
	
	//if(isset($_REQUEST['DayId']))
		//$DayId=GetVal('DayId');
	
	$DayId =  $daysArr[$dayOfWeek];
	
	if(isset($_REQUEST['Lon']))
		$Lon=GetVal('Lon');
	
	if(isset($_REQUEST['Lan']))
		$Lan=GetVal('Lan');
		
	if(isset($_REQUEST['UserName']))
		$UserName=GetVal('UserName');
		
	if(isset($_REQUEST['UserPhone']))
		$UserPhone=GetVal('UserPhone');
	
	$user_id=GetUserId($UserPhone);
	
	$location_id=AddNewLocation($Lan,$Lon);

	$List = array();
	
	////Check if user exist ////
	//and cust_mobile = '{$UserPhone}' and cust_shop_name  = '{$ShopName}'

	if($CustName == '' && $PhoneNumber == '' && $ShopName == '')
	{
		$sql="INSERT INTO customers (cust_name,cust_mobile,cust_shop_name,location_id,user_id,weekId,company_id,entered_by)  VALUES ('Cus_New_ID','1234567890','Null_Shop_Name','{$location_id}','{$user_id}','{$DayId}','{$UserCompanyId}','{$user_id}')"; 
		$mRequest = print_r($sql, true);
		storeRequest("AddCust.php","Add new Custoer, sql",$mRequest);
		if(mysqli_query($dbconn,$sql))
			echo "CustIDAdded"; 
	}
	else
	{

	$check_sql = "Select * from customers where cust_name = '{$CustName}' ";
		$check_sql_query=mysqli_query($dbconn,$check_sql);

			if(mysqli_num_rows($check_sql_query))
			{
					echo "CusExist";
					//echo $check_sql;
			}
			else
			{
		
	
$sql="INSERT INTO customers (cust_name,cust_mobile,cust_shop_name,location_id,user_id,weekId,company_id,entered_by)  VALUES ('{$CustName}','{$PhoneNumber}','{$ShopName}','{$location_id}','{$user_id}','{$DayId}','{$UserCompanyId}','{$user_id}')"; 

$mRequest = print_r($sql, true);
storeRequest("AddCust.php","Add new Custoer, sql",$mRequest);


if(mysqli_query($dbconn,$sql))
	echo "CustAdded"; 
		else
	echo "Error";
			
die;	
		}

	}
?>