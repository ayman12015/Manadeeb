<?php
header( 'Content-Type: application/json; charset=utf-8' );
include("conn.php");

Function GetVal($par){
	$return		=$_REQUEST[$par];	
	return $return;
}


$SizerName="";
$ProdCompanyId="";

	if(isset($_REQUEST['SizerName']))
		$SizerName=GetVal('SizerName');
	if(isset($_REQUEST['ProdCompanyId']))
		$ProdCompanyId=GetVal('ProdCompanyId');
	

	

  $sql="INSERT INTO prodsizer (SizerName,SizerCompanyId) VALUES ('{$SizerName}','{$ProdCompanyId}')";  
 
   
$List = array();
if(mysqli_query($con,$sql)){
echo "DataSaved";
}else{
	$error= mysqli_error($con);
echo $error;
}

die;	
?>