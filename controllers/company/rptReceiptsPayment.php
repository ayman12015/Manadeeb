<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$PaymentsList=array();
$dtFrom='';
$dtTo='';
$UsrName='';


if(isset($_POST['rptsubmit']) && ($_POST['rptsubmit']!='')){	
	$PaymentsList=GetPaymentsListByDateRange();
	}
	

$smarty->assign('Users',GetUsersPhone());
$smarty->assign('active_rptReceiptsPayment',"active");
$smarty->assign('PaymentsList',$PaymentsList);
$smarty->assign('reportDate',$reportDate);
$smarty->assign('selected',$selected);

$smarty->assign('dtFrom',$dtFrom);
$smarty->assign('dtTo',$dtTo);
$smarty->assign('UsrName',$UsrName);
	
	
	
$smarty->display('company/rptReceiptsPayment.tpl');
?>