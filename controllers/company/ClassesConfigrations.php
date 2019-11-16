<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');


$success_msg='';
$error_msg='';
$selected='';
$list_Config_Status= array();

if(isset($_REQUEST["selected"]) && ($_REQUEST["selected"]!='')){
	$selected=request('selected');
	SNED_Config_Status_Values($selected);

}
if(isset($_POST['submit']) && ($_POST['submit']!='')){
	
$rtn=AddNewClass();
if($rtn=="0")
	$success_msg='Clasee Added Succssefully';
	else
	$error_msg='Error in Saving the Data';
}

 

$smarty->assign('CLS_CONFIGRATION_VALUES',GET_CLS_CONFIGRATION_VALUES_ARRAY());
$smarty->assign('GetProductsPrices',GetProductsPrices());
$smarty->assign('ClassesList',GetClassesList());
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('selected',$selected);
$smarty->assign('active_ClassesConfigrations',"active");
$smarty->display('company/ClassesConfigrations.tpl');
?>