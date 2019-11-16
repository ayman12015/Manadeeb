<?php 
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);






if(isset($_POST['submit_reset']) && ($_POST['submit_reset']!='')){

		$rtn=ResetPassword();
		if($rtn=="1")
		$success_msg='Password Has been reset';
		else
		$error_msg=' in reset Password';

	}




$smarty->assign('active_NewUser',"active");
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('REQUEST_URI',$REQUEST_URI );
$smarty->assign('Users',GetUsers());


$smarty->display('company/RecoverPassword.tpl');
?>
