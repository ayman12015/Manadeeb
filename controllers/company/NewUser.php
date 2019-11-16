<?php 
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);


if(isset($_POST['UpdateWebUser']) && ($_POST['UpdateWebUser']!='')){

	//print_r($_POST);
	//die;
  $rtn=Editinfo();
  if($rtn=="1")
  $success_msg='Info Has been Updated';
  else
  $error_msg=' Not Updated'; 
	}
	 
	if(isset($_POST['deleteWebUser']) && ($_POST['deleteWebUser']!='')){

	//print_r($_POST);
	//die;
  $rtn=deleteinfo();
  if($rtn=="1")
  $success_msg='Info Has been deleted';
  else
  $error_msg=' Not deleted'; 
	}


if(isset($_POST['submit_reset']) && ($_POST['submit_reset']!='')){

		$rtn=ResetPassword();
		if($rtn=="1")
		$success_msg='Password Has been reset';
		else
		$error_msg=' in reset Password';

	}



if(isset($_POST['username'],$_POST['email'],$_POST['phone'],$_POST['p'])){

	$error_msg=NewRegister($_POST);
	if($error_msg=='') $success_msg = "Data saved Successfully.";
}


$smarty->assign('active_NewUser',"active");
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('REQUEST_URI',$REQUEST_URI );
$smarty->assign('Users',GetUsers());


$smarty->display('company/NewUser.tpl');
?>
