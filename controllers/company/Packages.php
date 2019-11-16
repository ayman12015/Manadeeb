<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$return="null";

$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);


if(isset($_POST['AddPakage']) && $_POST['AddPakage']=='Save'){
	$return=AddNewPackage($_POST['AddPakage']);			
}

if(isset($_POST['UpdatePackage']) && ($_POST['UpdatePackage']!='')){ 

	//print_r($_POST);
	//die;
  $rtn=Editpackage();
  if($rtn=="1")
  $success_msg='Info Has been Updated';
  else
  $error_msg=' Not Updated'; 
	} 


$smarty->assign('Packages',GetPackages());
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('REQUEST_URI',$REQUEST_URI);
$smarty->assign('return',"$return");
$smarty->assign('active_Packages',"active");
$smarty->display('company/Packages.tpl');
?>