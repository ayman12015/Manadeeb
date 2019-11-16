<?php 
include_once('../../includes/header.php');
include_once('../../model/login/login.php');

$feedback="";
$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);
$username='';
$phone='';




///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

if(isset($_REQUEST['phone'])){
$phone=$_REQUEST['phone'];
$username=$_REQUEST['username'];	
}


if(isset($_POST['submit']) && ($_POST['submit']=='submit_reset')){

		$rtn=ResetPassword();
		if($rtn=="1")
		$success_msg='Password Has been reset';
		else
		$error_msg=' not reset Password';

	}
	



// send email or phone for verification






$smarty->assign('username',$username);
$smarty->assign('phone',$phone);

$smarty->assign('feedback',$feedback);

//$Aciont = $_SERVER['DOCUMENT_ROOT']. "/manadeeb/controllers/login/login.php";

$smarty->assign('Aciont',"RecoverPassword.php");
$smarty->display('login/RecoverPassword.tpl');
?>