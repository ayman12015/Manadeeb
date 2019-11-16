<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$CUSTOMERS=array();
 

if(isset($_GET['selected'])&& ($_GET['selected']>0)){
 $selected=$_GET['selected'];
 $CUSTOMERS=GET_CUSTOMERS($selected);
}else{
 $CUSTOMERS=array();
}
	
	$smarty->assign('active_rptUserCustomers',"active");
	$smarty->assign('reportDate',$reportDate);
	$smarty->assign('Users',GetUsersPhone());
	$smarty->assign('CUSTOMERS',$CUSTOMERS);
	$smarty->assign('selected',$selected);
	
	
	
$smarty->display('company/rptUserCustomers.tpl');
?>