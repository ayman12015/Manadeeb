<?php
include("conn.php");

Function GetVal($par){
	$return		=$_REQUEST[$par];	
	return $return;
}



$SizerId="";
	if(isset($_REQUEST['SizerId']))
		$SizerId=GetVal('SizerId');

	
$sql="update prodsizer set SizerStatus=1 where SizerId='$SizerId' ";

if(mysqli_query($con,$sql))
	echo "1";
else
	echo "0";


die;
?>