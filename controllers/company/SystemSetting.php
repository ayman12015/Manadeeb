<?php 
include_once('../../includes/header.php');
include_once('../../model/company/company.php');
$selected='';
$success_msg='';
$error_msg='';


if(isset($_GET['selected'])){
 $selected=$_GET['selected'];
}

  

$smarty->assign('Products',GetProducts());
$smarty->assign('pages_display',GetPagesDisplay());
$smarty->assign('pages_group',GetPagesGroupList());
$smarty->assign('pages',GetPagesList());
$smarty->assign('selected',$selected);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('active_SystemSetting',"active");
$smarty->display('company/SystemSetting.tpl');
?>