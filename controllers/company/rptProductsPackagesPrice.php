<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$ProductsPrices=array();
 

if(isset($_GET['selected']) && ($_GET['selected']>0)){
 $selected=$_GET['selected'];
 $ProductsPrices=GetProductsPricesByProdId($selected);
}else{
 $ProductsPrices=GetProductsPrices();
}
	
	$smarty->assign('active_rptProductsPackagesPrice',"active");
	$smarty->assign('Products',GetProducts());
	$smarty->assign('ProductsPackages',$ProductsPrices);
	$smarty->assign('reportDate',$reportDate);
	$smarty->assign('selected',$selected);
	
	
	
$smarty->display('company/rptProductsPackagesPrice.tpl');
?>