<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$PendingBills=array();
 

if(isset($_GET['selected']) && ($_GET['selected']>0)){
 $PendingBills=GetPendingBills();
 $selected=$_GET['selected'];
}else{
 $PendingBills=GetPendingBills();
}
	
	$smarty->assign('active_rptCustomersPendingBills',"active");
	$smarty->assign('UserList',GetUsersPhone());
	$smarty->assign('PendingBills',$PendingBills);
	$smarty->assign('reportDate',$reportDate);
	$smarty->assign('selected',$selected);
	
	
	
$smarty->display('company/rptCustomersPendingBills.tpl');
?>