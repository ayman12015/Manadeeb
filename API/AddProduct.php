<?php
header( 'Content-Type: application/json; charset=utf-8' );
include("conn.php");

Function GetVal($par){
	$return		=$_REQUEST[$par];	
	return $return;
}
Function GetProdSizer($con,$SizerName,$ProdCompanyId){
	
	
	$sql="select SizerId from prodsizer where SizerName='{$SizerName}' and SizerCompanyId='{$ProdCompanyId}'";
	$res=mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	return $row['SizerId'];	
}


$ProdName="";
$ProdCompanyId="";
$SizerName="1";

	if(isset($_REQUEST['ProdName']))
		$ProdName=GetVal('ProdName');
	if(isset($_REQUEST['ProdCompanyId']))
		$ProdCompanyId=GetVal('ProdCompanyId');
	if(isset($_REQUEST['SizerName']))
		$SizerName=GetVal('SizerName');
	

	$ProdSizer=GetProdSizer($con,$SizerName,$ProdCompanyId);
	
	
$sql="INSERT INTO Products (ProdName,ProdSizer,ProdCompanyId) VALUES ('{$ProdName}','{$ProdSizer}','{$ProdCompanyId}')";  
  
 
   
$List = array();

if(mysqli_query($con,$sql)){
	array_push($List, array(
'ProdId' => "-1",
'ProdCompanyId' => "",
'ProdName' => "",
'ProdSizer' => ""
));
}else{
	array_push($List, array(
'ProdId' => "-2",
'ProdCompanyId' => "",
'ProdName' => "",
'ProdSizer' => ""
));
}
echo json_encode($List,JSON_UNESCAPED_UNICODE);
die;	
?>