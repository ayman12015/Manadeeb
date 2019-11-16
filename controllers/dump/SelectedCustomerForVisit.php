<?php	
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');

function QueryThis($SqlStr){
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
return $rows;
}
	
function LogInScreen ($string){
	echo $string . "..." . "</br>";
}

LogInScreen("<strong>Step 1:</strong>	Select All The Manadeeb Users and his customers");		
LogInScreen("<strong>Step 2:</strong>  Select All The products information for selected Customer");		
LogInScreen("<strong>Step 3:</strong>	From the prevouse list, get the customers current QTY he has in the shop + entred date");
LogInScreen("<strong>Step 4:</strong>	get the customer ProductCunsumingPerDay for this product");
LogInScreen("<strong>Step 5:</strong>	FROM the <strong>ProductCunsumingPerDay,current QTY and entred Date</strong> get the exaxt QTY in the shop");
LogInScreen("<strong>Step 6:</strong>	From the <strong>exact QTY, NEXT vesit Date and ProductCunsumingPerDay </strong> get <strong>Needed QTY</strong> for Next viste");
LogInScreen("<strong>Step 7:</strong>	IF <strong>Needed QTY</strong> Greater than <strong>Current Exate QTY</strong> List this cutomer in Proposed to viste + <strong>Needed QTY</strong> for selected product");
  

LogInScreen("...............>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");
LogInScreen(".................>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");
LogInScreen("..................>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>");

LogInScreen("<strong>Starting Step 1,</strong> Getting Customers and Manadeeb User Info.");


$SqlStr="SELECT m.id as 'user_id',c.cust_id as 'cust_id' FROM members m, customers c WHERE m.type=4 AND c.user_id=m.id";
$rows= QueryThis($SqlStr);
$size=sizeof($rows);
for($i=0;$i < $size;$i++){
$user_id=$rows[$i][0];
$cust_id=$rows[$i][1];	
LogInScreen("<strong>LOOPING</strong> :::::::::::::::::::::::::::::::::::::::::::::::::::::User: $user_id, Customer: $cust_id");




LogInScreen("<strong>Starting Step 2,</strong> Getting Product Info For the Customer <strong>($cust_id)</strong>.");
$SqlStr="SELECT * FROM `dump_productcusperday` WHERE cust_id='$cust_id'";
$prod_rows= QueryThis($SqlStr);
$prod_size=sizeof($prod_rows);
for($prod_i=0;$prod_i < $prod_size;$prod_i++){

LogInScreen("<strong>Starting Step 3,</strong> Getting Customer <strong>($cust_id)</strong> current QTY he has in the shop + entred date");


	
}




die;
}





















?>