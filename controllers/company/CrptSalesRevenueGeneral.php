<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$SalesRevenueList=array();
$dtFrom='';
$dtTo='';
$prod_id='';
$UsrName='';


if(isset($_POST['rptsubmit']) && ($_POST['rptsubmit']!='')){	
	$SalesRevenueList=GetSalesRevenueListByDateRange();
	}
	

$smarty->assign('active_CrptSalesRevenueGeneral',"active");
$smarty->assign('SalesRevenueList',$SalesRevenueList);
$smarty->assign('reportDate',$reportDate);
$smarty->assign('selected',$selected);

$smarty->assign('dtFrom',$dtFrom);
$smarty->assign('dtTo',$dtTo);
$smarty->assign('UsrName',$UsrName);
	
	
	
$smarty->display('company/CrptSalesRevenueGeneral.tpl');
?>