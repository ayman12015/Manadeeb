<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$success_msg='';
$error_msg='';

if(isset($_POST['submit']) && ($_POST['submit']!='')){
	
$rtn=AddNewClass();
if($rtn=="0")
	$success_msg='Clasee Added Succssefully';
	else
	$error_msg='Error in Saving the Data';
}

 

$smarty->assign('ClassesList',GetClassesList());
$smarty->assign('success_msg',$success_msg);
$smarty->assign('error_msg',$error_msg);
$smarty->assign('active_CustomersClasse',"active");
$smarty->display('company/CustomersClasse.tpl');
?>