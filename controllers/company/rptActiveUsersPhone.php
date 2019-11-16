<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$reportDate=date('Y-m-d');
 	
	
	$smarty->assign('active_rptActiveUsersPhone',"active");
	$smarty->assign('reportDate',$reportDate);
	$smarty->assign('Users',GetUsersPhone());
	
	
$smarty->display('company/rptActiveUsersPhone.tpl');
?>