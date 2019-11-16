<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);
$selected='';
$Receipt_id='';
$success_msg='';
$error_msg='';
$ProductName='';
$qty='';
$ProductPackagePrice='';
$TotalPrice='';
$RemainingBalance='';	
	

if(isset($_GET['selected'])) $selected=$_GET['selected'];
if(isset($_GET['ShippingId']))$Receipt_id=$_GET['ShippingId'];

if(isset($_POST['submit']) and isset($_GET['ShippingId'])){
	
 
	$success_msg=NewReceiptPayment($_POST);
	if($success_msg==1){
	$success_msg="Receipt Paid Successfully";	
	}else if($success_msg==2){
	$success_msg="";
	$error_msg="Paied Amount Grater than Pening Amount";
	}else{
	$success_msg="";
	$error_msg="Error in Saving Data";	
	}
}


$smarty->assign('ShipmentmentList',GetFinanceShipmentmentList($selected));
$smarty->assign('Products',GetProductsPrices());
$smarty->assign('Users',GetUsersPhone());
$smarty->assign('selected',$selected);
$smarty->assign('Receipt_id',$Receipt_id);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('active_Finance',"active");
$smarty->assign('Vendors',GetVendors());
$smarty->assign('REQUEST_URI',$REQUEST_URI );

	$smarty->assign('ProductName',$ProductName);
	$smarty->assign('qty',$qty);
	$smarty->assign('ProductPackagePrice',$ProductPackagePrice);
	$smarty->assign('TotalPrice',$TotalPrice);
	$smarty->assign('RemainingBalance',$RemainingBalance);	
	
$smarty->display('company/Finance.tpl');
?>