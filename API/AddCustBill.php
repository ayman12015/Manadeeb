<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");
 
$qty="";
$ShippingId="";
$CustSelectedId="";
$ProdPrice='';
$ProdName='';
$SizerName='';
$Req_Message = '';
$NewQun = '';
$AddDate = '';
$toggaled_value = '';
$OrderedQun = '';

$mRequest = print_r($_REQUEST, true);
storeRequest("AddCustBill.php","Add New Customer Bill",$mRequest);


	if(isset($_REQUEST['qty']))
		$qty=GetVal('qty');

	if(isset($_REQUEST['ShippingId']))
		$ShippingId=GetVal('ShippingId');
	
	if(isset($_REQUEST['CustSelectedId']))
		$CustSelectedId=GetVal('CustSelectedId');

		////if bill exists add new one values///
		if(isset($_REQUEST['NewQun']))
		$NewQun=GetVal('NewQun');

		if(isset($_REQUEST['AddDate']))
		$AddDate=GetVal('AddDate');

		if(isset($_REQUEST['toggaled_value']))
		$toggaled_value=GetVal('toggaled_value');

		if(isset($_REQUEST['OrderedQun']))
		$OrderedQun=GetVal('OrderedQun');

	 
	$sqlStr= "SELECT * FROM `and_shipped_prod` where ShippingId='$ShippingId'";
	$List = array();
	$ListQuery=mysqli_query($dbconn,$sqlStr);
	while($row = mysqli_fetch_array($ListQuery))
		{
	$ProdPrice = $row['ProductPackagePrice'];
	$ProdName  =$row['ProdNamePackage'];
	$SizerName  = $row['package_abbreviation'];
		}

	//$List = array();

	//////////////////Super check//////////////////////////////////Super check////////////////
$check_bill_sql = "Select * from customers_bills where ShippingId = '{$ShippingId}' and cust_id = '{$CustSelectedId}' ";
		
 	$bill_query = mysqli_query($dbconn,$check_bill_sql);

	$get_bill_result=mysqli_fetch_array($bill_query);

 	$bill_id = $get_bill_result['BillId'];


	if(mysqli_num_rows($bill_query))
		{

			$Req_Message = '3' ;
			if($NewQun==''){
				echo $Req_Message ;
				die;	
			}
			
				
//echo $bill_id ;

$NewBill_sql="INSERT INTO customers_bills (ProdQty,ProdPrice,ProdName,SizerName,ShippingId,cust_id )
VALUES ('{$OrderedQun}','{$ProdPrice}','{$ProdName}','{$SizerName}','{$ShippingId}','{$CustSelectedId}' )";

////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($toggaled_value==1){
$New_Exist_Bill_sql  = "INSERT INTO customers_bills_query (BillId,query_type,available_Qty) 
VALUES	($bill_id,$toggaled_value,'{$NewQun}')" ;
}else{
$New_Exist_Bill_sql  = "INSERT INTO customers_bills_query (BillId,query_type,finish_date,available_Qty) 
VALUES	($bill_id,$toggaled_value,'{$AddDate}','{$NewQun}')" ;

}	

//echo $New_Exist_Bill_sql;
if( (mysqli_query($dbconn,$New_Exist_Bill_sql))  && (mysqli_query($dbconn,$NewBill_sql))  ) 
	{
echo "Bill_Inserted"; 	
	}
	else
	{
echo "Error";
	}

			//}

			
	//	}

	}// End of Big IF ///
		else
		{
			////Insert New Fresh bill//// 

$sql="INSERT INTO customers_bills (ProdQty,ProdPrice,ProdName,SizerName,ShippingId,cust_id )VALUES ('{$qty}','{$ProdPrice}','{$ProdName}','{$SizerName}','{$ShippingId}','{$CustSelectedId}' )";



if(mysqli_query($dbconn,$sql))
{
$flg=GetPreviuseShippedProduct($ShippingId,$CustSelectedId);
echo "1"; 
}
else{
echo "Error";echo $sql;
}
die;	

		}


?>