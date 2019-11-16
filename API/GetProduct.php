<?php
include("../includes/adoconn.php");
include("../API/functions.php");




$UserCompanyId="";
$UserPhone="";

	if(isset($_REQUEST['UserCompanyId']))
		$UserCompanyId=GetVal('UserCompanyId');	
	if(isset($_REQUEST['UserPhone']))
		$UserPhone=GetVal('UserPhone');	
	
	$sql="SELECT * FROM `and_shipped_prod` where owner_id= (SELECT id FROM `members` where phone='$UserPhone' limit 1)";

$List = array();
$ListQuery=mysqli_query($dbconn,$sql);

while($row = mysqli_fetch_array($ListQuery))
{
array_push($List, array(
'ShippingId' => $row['ShippingId'],
'ProdNamePackage' => $row['ProdNamePackage'],
'package_abbreviation' => $row['package_abbreviation'],
'ProductPackagePrice' => $row['ProductPackagePrice'],
'qty' => $row['qty']
));
}

if(sizeof($List)==0){
array_push($List, array(
'ShippingId' => "",
'ProdNamePackage' => "",
'package_abbreviation' => "",
'qty' => ""
));
}

//$var = print_r($_REQUEST, true);
//storeRequest("GetProduct.php","Get Shipment Products(GetProduct.php)",$var);

echo json_encode($List,JSON_UNESCAPED_UNICODE);
die;	
?>