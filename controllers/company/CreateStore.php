<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');


$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);


if(isset($_POST['UpdateStore']) && ($_POST['UpdateStore']!='')){

	//print_r($_POST);
	//die;
  $rtn=Editstore();
  if($rtn=="1")
  $success_msg='Info Has been Updated';
  else
  $error_msg=' Not Updated'; 
	} 
 

$smarty->assign('StoresList',GetStoresList());
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('REQUEST_URI',$REQUEST_URI );
$smarty->assign('active_CreateStore',"active");
$smarty->display('company/CreateStore.tpl');
?>