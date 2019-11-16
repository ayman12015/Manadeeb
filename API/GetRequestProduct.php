<?php
include("../includes/adoconn.php");
include("../API/functions.php");




$UserCompanyId="";

	if(isset($_REQUEST['UserCompanyId']))
		$UserCompanyId=GetVal('UserCompanyId');	

	
	$sql="
	SELECT * FROM products p ,productprice pp ,packages pg  where
	pp.del=0
	And pp.company_id='$UserCompanyId'
	And pp.package_id=pg.package_id
	And pp.prod_id=p.prod_id
	And pp.CurrentPrice=1
	";

$List = array();
$ListQuery=mysqli_query($dbconn,$sql);

while($row = mysqli_fetch_array($ListQuery))
{
array_push($List, array(
'ProdNamePackage' => $row['prod_name'] . " - " . $row['package_name'],
'package_abbreviation' => $row['package_abbreviation'],
'ProductPackagePrice' => $row['ProductPrice']
));
}

if(sizeof($List)==0){
array_push($List, array(
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