<?php
include("conn.php");

Function GetVal($par){
	$return		=$_REQUEST[$par];	
	return $return;
}



$ProdId="";
	if(isset($_REQUEST['ProdId']))
		$ProdId=GetVal('ProdId');

	
$sql="update products set ProdStatus=1 where ProdId='$ProdId' ";

if(mysqli_query($con,$sql))
	echo "1";
else
	echo "0";


die;
?>