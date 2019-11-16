<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
SendCompanyInfo();
$selected='';
$success_msg='';
$error_msg='';
$ShipmentmentList = array();
$CustomersRequest = array();
$INVOICE_DATE = date('y/m/d'); 
$INVOICE_NO  = date('ym'); 

$INVOICE_NO  = $INVOICE_NO . rand(1,30) ; 


if(isset($_POST['submit_return'])){
	/*
	0=> success
	1=> returned QTY Greater than Shipped QTY
	2=> There is Amount Paid Cover the returned value
		
	*/
	
	if($return=SubmitReturn()=='0'){
		$success_msg="Return Value Added to Store Successfully";	
		}
	}
	
if(isset($_GET['selected']) && ($_GET['selected'] > 0)){
	$selected=$_GET['selected'];
	SendUserInfo($selected);
	$ShipmentmentList=GetShipmentmentList($selected);
	$CustomersRequest=GetCustomersRequest($selected);
	} 

if(isset($_POST['submit'])){
	$success_msg=AddNewShipmentment($_POST);
	if($success_msg==1)
	$success_msg="Data saved Successfully";	
	elseif($success_msg==2){
	$success_msg="";
	$error_msg=" QTY is not Avalable";	
	}else{
	$success_msg="";
	$error_msg="Error in Saving Data";	
	}
}


$smarty->assign('ShipmentmentFinanceList',GetFinanceShipmentmentList($selected));
$smarty->assign('ShipmentmentList',$ShipmentmentList);
$smarty->assign('CustomersRequest',$CustomersRequest);
$smarty->assign('Products',GetProductsPrices());
$smarty->assign('Users',GetUsersPhone());
$smarty->assign('StoresList',GetStoresPrices());
$smarty->assign('selected',$selected);
$smarty->assign('INVOICE_DATE',$INVOICE_DATE);
$smarty->assign('INVOICE_NO',$INVOICE_NO);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('active_NewShipmentment',"active");
$smarty->assign('Vendors',GetVendors());
$smarty->display('company/NewShipmentment.tpl');
?>