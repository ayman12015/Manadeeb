<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$selected='';
$CUSTOMERS='';
$Users='';


if(isset($_GET['selected'])){
 $selected=$_GET['selected'];
 $CUSTOMERS=GET_CUSTOMERS_BY_CLS($selected);
}else{
 $CUSTOMERS=array();
}

$smarty->assign('CUSTOMERS',$CUSTOMERS);
$smarty->assign('CLASSES',GET_CLASSES());
$smarty->assign('selected',$selected);
$smarty->assign('active_CustomersClassification',"active");
$smarty->display('company/CustomersClassification.tpl');
?>