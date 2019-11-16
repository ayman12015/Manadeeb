<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);


if(isset($_POST['submit']) && ($_POST['submit']=='SaveVendorInfo')){
$return=AddNewVendor_full($_POST);
}

if(isset($_POST['EditNewVendor']) && ($_POST['EditNewVendor']=='EditNewVendor')){
$return=EditNewVendor($_POST);
} 


$smarty->assign('active_Vendors',"active");
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('Vendors',GetVendors());
$smarty->assign('REQUEST_URI',$REQUEST_URI);
$smarty->display('company/Vendors.tpl');
?>