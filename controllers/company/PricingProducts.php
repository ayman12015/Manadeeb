<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$return="";
$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);

if(isset($_POST['UpdatePrice']) && ($_POST['UpdatePrice']=='UpdatePrice')){
$return=Editprice($_POST);
}


if(isset($_POST['submit'])&& ($_POST['submit']=='AddNewProductsPrices')){
$return=AddNewProductsPrices($_POST);
}


$smarty->assign('return',"$return");
$smarty->assign('ProductsPricess',GetProductsPrices());
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('REQUEST_URI',$REQUEST_URI);
$smarty->assign('return',"$return");
$smarty->assign('Packages',GetPackages());
$smarty->assign('Products',GetProducts());
$smarty->assign('active_PricingProducts',"active");
$smarty->display('company/PricingProducts.tpl');
?>