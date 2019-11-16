<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$return="";
$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);

if(isset($_POST['EditNewProduct']) && ($_POST['EditNewProduct']=='EditNewProduct')){
$return=EditNewProduct($_POST);
}

if(isset($_POST['submit_vendor'])){
AddNewVendor($_POST);

}

if(isset($_POST['AddNewProduct']) && ($_POST['AddNewProduct']=='Save')){
$return=AddNewProduct($_POST);
}


$smarty->assign('REQUEST_URI',$REQUEST_URI);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('return',"$return");
$smarty->assign('Products',GetProducts());
$smarty->assign('Packages',GetPackages());
$smarty->assign('Vendors',GetVendors());
$smarty->assign('active_NewProduct',"active");
$smarty->display('company/NewProduct.tpl');
?>