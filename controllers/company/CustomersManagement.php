<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$selected='';
$CUSTOMERS='';
$Users='';


if(isset($_GET['selected'])){
 $selected=$_GET['selected'];
 $CUSTOMERS=GET_CUSTOMERS($selected);
}else{
 $CUSTOMERS=array();
}

 

$Users=GetUsersPhone();
$smarty->assign('CUSTOMERS',$CUSTOMERS);
$smarty->assign('Users',$Users);
$smarty->assign('selected',$selected);
$smarty->assign('active_CustomersManagement',"active");
$smarty->display('company/CustomersManagement.tpl');
?>