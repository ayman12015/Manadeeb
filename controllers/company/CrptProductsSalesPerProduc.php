<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$ProductsSalesList=array();
$dtFrom='';
$dtTo='';
$prod_id='';
$ProdName='';


if(isset($_POST['rptsubmit']) && ($_POST['rptsubmit']!='')){	
	$ProductsSalesList=GetProductsSalesListByDateRange();
	}
	

$smarty->assign('Products',GetProducts());
$smarty->assign('active_CrptProductsSalesPerProduc',"active");
$smarty->assign('ProductsSalesList',$ProductsSalesList);
$smarty->assign('reportDate',$reportDate);
$smarty->assign('selected',$selected);

$smarty->assign('dtFrom',$dtFrom);
$smarty->assign('dtTo',$dtTo);
$smarty->assign('ProdName',$ProdName);
$smarty->assign('prod_id',$prod_id);
	
	
	
$smarty->display('company/CrptProductsSalesPerProduc.tpl');
?>