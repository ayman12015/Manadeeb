<?php
header( 'Content-Type: application/json; charset=utf-8' );
include("conn.php");

Function GetVal($par){ 
	$return		=$_REQUEST[$par];	
	return $return;
}


$ProdCompanyId="";

	if(isset($_REQUEST['ProdCompanyId']))
		$ProdCompanyId=GetVal('ProdCompanyId');
	
	
    $sql="select * from prodsizer where SizerCompanyId='{$ProdCompanyId}' and SizerStatus='0'";
   
  

$List = array();
$ListQuery=mysqli_query($con,$sql);

while($row = mysqli_fetch_array($ListQuery))
{
array_push($List, array(
'SizerId' => $row['SizerId'],
'SizerCompanyId' => $row['SizerCompanyId'],
'SizerName' => $row['SizerName'] 
));
}

if(sizeof($List)==0){
array_push($List, array(
'SizerId' => "",
'SizerCompanyId' => "",
'SizerName' => ""
));
}
echo json_encode($List,JSON_UNESCAPED_UNICODE);
die;	
?>