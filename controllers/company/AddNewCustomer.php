<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);


if(isset($_POST['UpdateCustomerInfo']) && ($_POST['UpdateCustomerInfo']!='UpdateCustomerInfo')){

	//print_r($_POST);
	//die;
  $rtn=Editcustomerinfo();
  if($rtn=="1")
  $success_msg='Info Has been Updated';
  else
  $error_msg=' Not Updated'; 
	}
	
	if(isset($_POST['UpdateCustomerInfo']) && ($_POST['UpdateCustomerInfo']=='UpdateCustomerInfo')){
$return=Editcustomerinfo($_POST);
}



if(isset($_POST['AddNewCustomer']) && ($_POST['AddNewCustomer']!='')){
		

    $rtn=NewRegisterCustomer($_POST);
    if($rtn=='1')
		 $success_msg = "Data saved Successfully.";
	else
		$error_msg = "somthing wrong";

	
}


 

$smarty->assign('active_AddNewCustomer',"active");
$smarty->assign('error_msg',$error_msg);
$smarty->assign('success_msg',$success_msg);
$smarty->assign('REQUEST_URI',$REQUEST_URI );
$smarty->assign('Users',GetUsersPhone(""));
$smarty->assign('customers',GET_CUSTOMERS(""));


$smarty->display('company/AddNewCustomer.tpl');
?>
