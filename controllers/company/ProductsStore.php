<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$success_msg='';
$error_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);

if(isset($_POST['UpdateproductStore']) && ($_POST['UpdateproductStore']!='')){

	//print_r($_POST);
	//die;
  $rtn=Editproductstore();
  if($rtn=="1")
  $success_msg='Info Has been Updated';
  else
  $error_msg=' Not Updated'; 
	}

if(isset($_POST['submit']) && ($_POST['submit']=='Save_store')){
	$rtn=Save_store();
	
	if($rtn==1)
	$success_msg='Product Added to Store Successfully';
	
	if($rtn!=1)
	$error_msg='Data Not Saved, Please Contact Your System Administrator';
		
	}


$smarty->assign('ProductStore',GetProductStored());
$smarty->assign('ProductInStore',GetProductInStore());
$smarty->assign('Products',GetProductsPrices());
$smarty->assign('Stores',GetStoresPrices());
$smarty->assign('REQUEST_URI',$REQUEST_URI );
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('active_ProductsStore',"active");
$smarty->display('company/ProductsStore.tpl');
?>