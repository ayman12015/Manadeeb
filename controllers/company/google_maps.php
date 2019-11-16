<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$user_id='';





$smarty->assign('user_id',$user_id);
$smarty->assign('Users',GetUsersPhone());
$smarty->assign('active_ProductsStore',"active");
$smarty->display('company/google_maps.tpl');
?>