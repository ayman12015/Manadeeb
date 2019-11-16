<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$selected='';
$success_msg='';
$error_msg='';


if(isset($_GET['selected'])){
 $selected=$_GET['selected'];
}

 

$smarty->assign('RequestsList',GetRequestsList());
$smarty->assign('UserRequestList',GetUserRequestList());
$smarty->assign('selected',$selected);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('active_CustomersRequests',"active");
$smarty->display('company/CustomersRequests.tpl');
?>