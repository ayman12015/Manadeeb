<?php
header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");


GetLocation("LY",1);

$var = print_r($_REQUEST, true);
//storeRequest("GetCust.php","Get Cutomers day Page(GetCust.php)",$var);



$CustCompanyId="";
$weekId="";

	if(isset($_REQUEST['CustCompanyId']))
		$CustCompanyId=GetVal('CustCompanyId');
	if(isset($_REQUEST['weekId']))
		$weekId=GetVal('weekId');
	if(isset($_REQUEST['UserPhone']))
		$UserPhone=GetVal('UserPhone');
	
$sql="select * from customers where company_id='$CustCompanyId'
and cust_name != '' and cust_name !='Cus_New_ID' and del='0' and user_id=(select id from members where phone='$UserPhone' limit 1)";

$List = array();
$ListQuery=mysqli_query($dbconn,$sql);

while($row = mysqli_fetch_array($ListQuery))
{
array_push($List, array(
'CustId' => $row['cust_id'],
'CustName' => $row['cust_name'],
'CustPhone' => $row['cust_mobile'],
'Custlatitude' => GetLocation("LX",$row['location_id']),
'Custlongitude' => GetLocation("LY",$row['location_id']),
'CustShopName' => $row['cust_shop_name'],
'CustCompanyId' => $row['company_id']
));
}

if(sizeof($List)==0){
array_push($List, array(
	'CustId' => "",
	'CustName' => "",
'CustPhone' => "",
'Custlatitude' => "",
'Custlongitude' => "",
'CustShopName' => "",
'CustCompanyId' => ""
));
}
echo json_encode($List,JSON_UNESCAPED_UNICODE);
die;	
?>