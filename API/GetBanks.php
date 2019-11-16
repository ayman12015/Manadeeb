<?php
include("../includes/adoconn.php");
include("../API/functions.php");
	
	$sql="SELECT * FROM `customer_banks` WHERE del=0";

$List = array();
$ListQuery=mysqli_query($dbconn,$sql);

while($row = mysqli_fetch_array($ListQuery))
{
array_push($List, array(
'bank_id' => $row['bank_id'],
'bank_name' => $row['bank_name']
));
}

if(sizeof($List)==0){
array_push($List, array(
'bank_id' => "",
'bank_name' => ""
));
}

echo json_encode($List,JSON_UNESCAPED_UNICODE);
die;	
?>