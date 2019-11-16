<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

$reportDate=date('Y-m-d');
$selected="";
$ShipmentmentList=array();
$dtFrom='';
$dtTo='';
$UsrName='';


if(isset($_POST['rptsubmit']) && ($_POST['rptsubmit']!='')){	
	$ShipmentmentList=GetShipmentmentListByDateRange();
	}
	





$smarty->assign('Users',GetUsersPhone());
$smarty->assign('active_rptTrucksShipmentment',"active");
$smarty->assign('ShipmentmentList',$ShipmentmentList);
$smarty->assign('reportDate',$reportDate);
$smarty->assign('selected',$selected);

$smarty->assign('dtFrom',$dtFrom);
$smarty->assign('dtTo',$dtTo);
$smarty->assign('UsrName',$UsrName);
	
	
	
$smarty->display('company/rptTrucksShipmentment.tpl');
?>