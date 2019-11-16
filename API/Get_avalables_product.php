<?php
include("../includes/adoconn.php");
include("../API/functions.php");



$mRequest = print_r($_REQUEST, true);
storeRequest("GetProduct.php","Get List of all customer avalable",$mRequest);


$UserCompanyId="";
$UserPhone="";

	if(isset($_REQUEST['UserCompanyId']))
		$UserCompanyId=GetVal('UserCompanyId');	
	if(isset($_REQUEST['UserPhone']))
		$UserPhone=GetVal('UserPhone');	
	

$sql="SELECT * FROM prod_avalable";

$List = array();
$ListQuery=mysqli_query($dbconn,$sql);

while($row = mysqli_fetch_array($ListQuery))
{
array_push($List, array(
'prod_id' => $row['prod_id'],
'ProdNamePackage' => $row['ProdNamePackage'],
'package_abbreviation' => $row['package_abbreviation'],
'ProductPackagePrice' => $row['ProductPrice']
));
}

if(sizeof($List)==0){
array_push($List, array(
'prod_id' => "",
'ProdNamePackage' => "",
'package_abbreviation' => "",
'ProductPackagePrice' => ""
));
}

//$var = print_r($_REQUEST, true);
//storeRequest("GetProduct.php","Get Shipment Products(GetProduct.php)",$var);

echo json_encode($List,JSON_UNESCAPED_UNICODE);
die;	
?>