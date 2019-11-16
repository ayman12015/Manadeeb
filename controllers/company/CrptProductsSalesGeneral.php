<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$ProductsSalesLis=array();
$dtFrom='';
$dtTo='';
$prod_id='';
$UsrName='';


if(isset($_POST['rptsubmit']) && ($_POST['rptsubmit']!='')){	
	$ProductsSalesLis=GetProductsSalesListByDateRange();
	}
	

$smarty->assign('active_CrptProductsSalesGeneral',"active");
$smarty->assign('ProductsSalesLis',$ProductsSalesLis);
$smarty->assign('reportDate',$reportDate);
$smarty->assign('selected',$selected);

$smarty->assign('dtFrom',$dtFrom);
$smarty->assign('dtTo',$dtTo);
$smarty->assign('UsrName',$UsrName);
	
	
	
$smarty->display('company/CrptProductsSalesGeneral.tpl');
?>