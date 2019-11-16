<?php
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');
include_once('../../includes/check_session.php');
$smarty->assign('UserShippingNotify',GetUserShippingNotify());
$pageAllwed =$_SESSION['pageAllwed'];
$smarty->assign('pagesAllwed',$pageAllwed);



function UpdateGroupPrevileges(){
global $dbconn;
	$company_id=$_SESSION['company_id'];

	if(request('group_id')!= null) $group_id=request('group_id');
	if(request('page_id')!= null) $page_id=request('page_id');
	if(request('status')!= null) $status=request('status');
	

	$SqlStr="UPDATE pages_priveleges set status='$status' where Group_id='$group_id' and page_id='$page_id'";
	$res= db_query($SqlStr);
	return "0";
}


function GetAvalableQTY(){
	global $dbconn,$smarty;
	if(request('priceId')!= null) $priceId=request('priceId');
	if(request('storeId')!= null) $storeId=request('storeId');
	
	
	$SqlStr="SELECT * FROM prod_in_store WHERE 
	storeId='$storeId'
	AND prod_id=(select prod_id from productprice where priceId='$priceId')
	AND package_id=(select package_id from productprice where priceId='$priceId')
	";	
	
	$res= db_query($SqlStr);
	$size=db_num_rows($res);
	$rows= db_fetch_array_all($res);
	if($size>0)	
	$rtn=$rows[0]['QTY_AVALABLE'];
	else
	$rtn='0';
		 
	return "AVALABLE QTY. " . $rtn;
}


function AddNewRecentActivity($ACTIVITY_TYPE_ID,$USER_ID){
	global $dbconn;
	
	$SqlStr="insert into recentactivity (ACTIVITY_TYPE_ID,USER_ID) VALUES (?,?)";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ss', $ACTIVITY_TYPE_ID,$USER_ID);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
		return "0";
	}else{
	return "1";
	}
}



function GetPendingBills(){
	global $dbconn;
	$where ='';	
	$company_id=$_SESSION['company_id'];	

	if(isset($_REQUEST['selected'])){
	
	  if(request('selected')!= null) {
		$user_id=request('selected');
		$where=" AND s.owner_id='$user_id'";
		}
		
	}

 $SqlStr="SELECT c.cust_name, bills.ProdName,bills.ProdQty,bills.ProdPrice,
(bills.ProdQty * bills.ProdPrice) AS Total_Price,
sum(pay_amt) as 'PaidAmt',
((bills.ProdQty * bills.ProdPrice)-sum(pay_amt)) as 'PendingAmt',
 date(bills.BillDate) AS 'Bill_dt',
s.owner_id as 'User_id'
FROM
customers_bills bills,
customers_bills_payment payment,
customers c,
shipping s
WHERE 
bills.BillId=payment.BillId
AND bills.cust_id=c.cust_id
AND bills.ShippingId=s.ShippingId
AND c.company_id='$company_id'
$where
";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"cust_name" => $rows[$i]['cust_name']
								 ,"ProdName" => $rows[$i]['ProdName']
								 ,"ProdQty" => $rows[$i]['ProdQty']
								 ,"ProdPrice" => $rows[$i]['ProdPrice']
								 ,"Total_Price" => ConvertMoney($rows[$i]['Total_Price'])
								 ,"PaidAmt" => ConvertMoney($rows[$i]['PaidAmt'])
								 ,"PendingAmt" => ConvertMoney($rows[$i]['PendingAmt'])
								 ,"Bill_dt" => $rows[$i]['Bill_dt']
								 ,"User_id" => $rows[$i]['User_id']								 								 							
								));
		}
	return $list;
}


function GetCUSTOMERS_LOCATION(){
global $dbconn;
$company_id=$_SESSION['company_id'];
if(request('user_id')!= null) $user_id=request('user_id');

$SqlStr="SELECT * FROM `customers` c,shops_locations l 
where 
c.company_id='$company_id' 
AND c.del=0
AND c.location_id=l.location_id
AND c.user_id='$user_id'";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list="";

for($i=0;$i < $size;$i++){
	$count = $i+1;
$list= $list  . $rows[$i]['cust_id'] . ":" . $rows[$i]['cust_name'] . ":" . $rows[$i]['cust_mobile'] . ":" . $rows[$i]['cust_shop_name']  . ":" . $rows[$i]['LX'] . ":" . $rows[$i]['LY'] . ",";
}

return $list;
}

function GET_CLS_CONFIGRATION_VALUES_ARRAY(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM cls_configuration_values cv, productprice pp, products p,packages pg,cls_configuration config where 
				config.config_id=cv.config_id
				AND config.config_status=0
				AND pp.package_id=cv.package_id
				AND pp.prod_id=cv.prod_id
				AND p.prod_id=pp.prod_id  
				AND pg.package_id=pp.package_id";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"config_id" => $rows[$i]['config_id']
								 ,"priceId" => $rows[$i]['priceId']
								 ,"name_value" => $rows[$i]['prod_name'] . ' - ' . $rows[$i]['package_name'] . " => " . $rows[$i]['config_value']
								));										
		}
	return $list;
}

function GET_CLS_CONFIGRATION_VALUES($Config_id){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM cls_configuration_values cv, productprice pp, products p,packages pg where 
				pp.package_id=cv.package_id
				AND pp.prod_id=cv.prod_id
				AND p.prod_id=pp.prod_id  
				AND pg.package_id=pp.package_id
				AND cv.config_id='$Config_id'";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
	$rsp='';
		for($i=0;$i < $size;$i++){
		$rsp= $rsp . $rows[$i]['priceId'] . ":" . $rows[$i]['prod_name'] . ' - ' . $rows[$i]['package_name'] . " => " . $rows[$i]['config_value'] . ",";
										
		}
	return $rsp;
}

function UPDATE_CLS_VALUE_LIST(){
	//ajax_info.php?op=cls_upate_val_list&new_value="+new_value+"&l_new_value="+l_new_value+"&Config_id="+Config_id
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];
	////?op=cls_upate&new_val="+new_val+"&config_name="+config_name
	if(request('new_value')!= null) $new_value=request('new_value');
	if(request('Config_id')!= null) $Config_id=request('Config_id');
	if(request('l_new_value')!= null) $priceId=request('l_new_value');
	if(request('Config_type')!= null) $Config_type=request('Config_type');
	//select * from a LEFT OUTER JOIN b on a.id = b.id;
	
	 $SqlStr="SELECT 
	 cv.config_value_id AS 'config_value_id',
	 cv.package_id AS 'cpackage_id',
	 cv.prod_id AS 'cprod_id',
	 pp.package_id AS 'ppackage_id',
	 pp.prod_id AS 'pprod_id'
	 FROM productprice pp  	 
	 LEFT OUTER JOIN cls_configuration_values cv 
	 on pp.package_id=cv.package_id 
	 AND pp.prod_id=cv.prod_id 
	 AND cv.config_id='$Config_id'
	 WHERE priceId='$priceId'
	 ";	
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$package_id=$rows[0]['ppackage_id'];
    $prod_id=$rows[0]['pprod_id'];
		 
	 if($rows[0]['config_value_id'] != null){
	 	 
	$SqlStr="UPDATE cls_configuration_values 
	SET config_value=? 
	WHERE package_id=? AND prod_id=? AND config_id=?";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ssss', $new_value,$package_id,$prod_id,$Config_id);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
    	}
	 }else{ 
	 $SqlStr="INSERT INTO cls_configuration_values (config_id,config_value,prod_id,package_id,Config_type) 
	 VALUES (?,?,?,?,?)";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('sssss', $Config_id,$new_value,$prod_id,$package_id,$Config_type);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
    	}
	 }
	 
return GET_CLS_CONFIGRATION_VALUES($Config_id);
}

function UPDATE_CLS_VALUE(){
	//"ajax_info.php?op=cls_upate_val&new_value="+new_value+"&Config_id="+Config_id
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];
	////?op=cls_upate&new_val="+new_val+"&config_name="+config_name
	if(request('new_value')!= null) $new_value=request('new_value');
	if(request('Config_id')!= null) $Config_id=request('Config_id');

	 $SqlStr="SELECT count(*) FROM cls_configuration_values 
	 WHERE Config_id='$Config_id'";
	
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	 if($rows[0][0] > 0){
	$SqlStr="UPDATE cls_configuration_values 
	SET config_value=? 
	WHERE Config_id=?";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ss', $new_value,$Config_id);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
    	}
	 }else{
	 	 
	 $SqlStr="INSERT INTO cls_configuration_values (config_id,config_value) 
	 VALUES (?,?)";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ss', $Config_id,$new_value);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
    	}
	 }
	 if(GetConfigName($Config_id)=='MinimumRegistrationPeriod')
		return Convert_days($new_value);
	 elseif(GetConfigName($Config_id)=='MinimumSalesAmount')
	 	return ConvertMoney($new_value);
	 elseif(GetConfigName($Config_id)=='MaximumSalesAmount')
	 	return ConvertMoney($new_value);
	elseif(GetConfigName($Config_id)=='MaximumInstallmentAmount')
	 	return ConvertMoney($new_value);		
		
}

function GetConfigName($config_id){
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];
	
	$SqlStr="SELECT * FROM cls_configuration WHERE config_id='$config_id' AND config_status=0";	
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);	
	$config_name=$rows[0]['config_name'];
		 
	return $config_name;
}

	
function UPDATE_CLS_SATUS(){
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];
	////?op=cls_upate&new_val="+new_val+"&config_name="+config_name
	if(request('new_val')!= null) $new_val=request('new_val');
	if(request('config_name')!= null) $config_name=request('config_name');
	if(request('cls_id')!= null) $cls_id=request('cls_id');
	$config_id='';
	

	 $SqlStr="SELECT * FROM cls_configuration 
	 WHERE cls_id='$cls_id' AND config_name='$config_name'";
	
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	
	 if($size > 0){
		 $config_id=$rows[0]['config_id'];
	$SqlStr="UPDATE cls_configuration 
	SET config_status=? 
	WHERE cls_id=? AND config_name=?";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('sss', $new_val,$cls_id,$config_name);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
    	}
	 }else{
	 	 
	 $SqlStr="INSERT INTO cls_configuration (config_name,cls_id,config_status) 
	 VALUES (?,?,?)";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('sss', $config_name,$cls_id,$new_val);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();
		$config_id = $dbconn->insert_id;
    	}
	 }
 
return $config_id;
}


 function Convert_days($convert){
 	 

		$years = ($convert / 365) ; // days / 365 days
		$years = floor($years); // Remove all decimals

		$month = ($convert % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
		$month = floor($month); // Remove all decimals

		$days = ($convert % 365) % 30.5; // the rest of days

		// Echo all information set
		return $years.' years - '.$month.' month - '.$days.' days';
 }
 
function SEND_CLS_CONFIG_VALUE($config_id){
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];
	 $SqlStr="SELECT * FROM cls_configuration_values v, cls_configuration c 
	 where 
	 c.config_id=v.config_id AND
	 v.config_id='$config_id'";
	
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
	if(isset($rows[0]['prod_id'])){
	if($rows[0]['prod_id']=='0' && $rows[0]['prod_id']=='0' && $rows[0]['config_name']=='MinimumRegistrationPeriod'){
		$smarty->assign('MinimumRegistrationPeriodSval',Convert_days($rows[0]['config_value']));
	}elseif($rows[0]['prod_id']=='0' && $rows[0]['prod_id']=='0' && $rows[0]['config_name']=='MinimumSalesAmount'){
		$smarty->assign('MinimumSalesAmountSval',ConvertMoney($rows[0]['config_value']));
	}elseif($rows[0]['prod_id']=='0' && $rows[0]['prod_id']=='0' && $rows[0]['config_name']=='MaximumSalesAmount'){
		$smarty->assign('MaximumSalesAmountSval',ConvertMoney($rows[0]['config_value']));
	}elseif($rows[0]['prod_id']=='0' && $rows[0]['prod_id']=='0' && $rows[0]['config_name']=='MaximumInstallmentAmount'){
		$smarty->assign('MaximumInstallmentAmountSval',ConvertMoney($rows[0]['config_value']));
	}
	
	
	}
	
return;
}

function SNED_Config_Status_Values($selected){
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];
	 $SqlStr="SELECT * from cls_configuration where
	cls_id IN(SELECT cls_id FROM cls_customer_classes where cls_id='$selected' AND company_id='$company_id')";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){

		 if($rows[$i]['config_name']=="MinimumRegistrationPeriod"){
		 	$smarty->assign('chkMinimumRegistrationPeriod',$rows[$i]['config_status']);
			$smarty->assign('MinimumRegistrationPeriodConfig_id',$rows[$i]['config_id']);
		 	if($rows[$i]['config_status']=='0'){
		 		SEND_CLS_CONFIG_VALUE($rows[$i]['config_id']);}
		 }
		 
		 
		if($rows[$i]['config_name']=="MinimumSalesConsumed"){
			$smarty->assign('chkMinimumSalesConsumed',$rows[$i]['config_status']);
			$smarty->assign('MinimumSalesConsumedConfig_id',$rows[$i]['config_id']);
		}
		
		if($rows[$i]["config_name"] == "MinimumSalesAmount"){			
			$smarty->assign('chkMinimumSalesAmount',$rows[$i]['config_status']);
			$smarty->assign('MinimumSalesAmountConfig_id',$rows[$i]['config_id']);
		 	if($rows[$i]['config_status']=='0'){
		 		 SEND_CLS_CONFIG_VALUE($rows[$i]['config_id']);}
					 
		}

		if($rows[$i]["config_name"] == "MaximumSalesQTY"){
			$smarty->assign('chkMaximumSalesQTY',$rows[$i]["config_status"]);
			$smarty->assign('MaximumSalesQTYConfig_id',$rows[$i]['config_id']);			 
		}

		if($rows[$i]["config_name"] == "MaximumSalesAmount"){
			$smarty->assign('chkMaximumSalesAmount',$rows[$i]['config_status']);
			$smarty->assign('MaximumSalesAmountConfig_id',$rows[$i]['config_id']);
		 	if($rows[$i]['config_status']=='0'){
		 		 SEND_CLS_CONFIG_VALUE($rows[$i]['config_id']);}	
	   }
	
	   if($rows[$i]["config_name"] == "MaximumInstallmentQTY"){
			$smarty->assign('chkMaximumInstallmentQTY',$rows[$i]["config_status"]);
			$smarty->assign('MaximumInstallmentQTYConfig_id',$rows[$i]['config_id']);			 
	   }	
	   
	   if($rows[$i]["config_name"] == "MaximumInstallmentAmount"){
			$smarty->assign('chkMaximumInstallmentAmount',$rows[$i]['config_status']);
			$smarty->assign('MaximumInstallmentAmountConfig_id',$rows[$i]['config_id']);
		 	if($rows[$i]['config_status']=='0'){
		 		 SEND_CLS_CONFIG_VALUE($rows[$i]['config_id']);}	
	   }	 
		
		
}//For loop end
		
	return;
}

function GetClassesList(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * from cls_customer_classes where company_id='$company_id'";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			if($rows[$i]['cls_SalesStatus']==0)
				$cls_SalesStatus="Active";
			if($rows[$i]['cls_SalesStatus']==1)
				$cls_SalesStatus="Not Active";


			array_push($list, array("mycount" => $i+1
								 ,"cls_id" => $rows[$i]['cls_id']
								 ,"cls_name" => $rows[$i]['cls_name']
								 ,"default_cls" => $rows[$i]['default_cls']
								 ,"cls_SalesStatus" => $cls_SalesStatus
								));
		}
	return $list;
}


function AddNewClass(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	if(post('Class_Name')!= null) $Class_Name=post('Class_Name');
	if(post('Sales_Status')!= null) $Sales_Status=post('Sales_Status');
 
	$SqlStr="insert into cls_customer_classes (cls_name,cls_SalesStatus,company_id) VALUES (?,?,?)";	 
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('sss', $Class_Name,$Sales_Status,$company_id);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
        $rtn=$stmt->store_result();

		AddNewRecentActivity("6",$_SESSION['user_id']);
		return "0";
	}else{
	return "1";

	}
}


//Update Info

function Editinfo(){
global $dbconn; 
$company_id=$_SESSION['company_id'];

    if(post('user_id')!= null) $user_id=post('user_id');
    if(request('username')!= null) $username=request('username');
	if(request('email')!= null) $email=request('email');
	if(request('phone')!= null) $phone=request('phone');
    if(request('status')!= null) $status=request('status');

	
      $SqlStr = "UPDATE members SET username='$username', email='$email', phone='$phone', status='$status' WHERE id='$user_id' And company_id='$company_id'";

    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";
}

// edit customer
function Editcustomerinfo(){

	global $dbconn;
    $company_id=$_SESSION['company_id'];
    
    $entered_by_id=$_SESSION['user_id'];

    if(post('user_id')!= null) $cust_id=post('user_id');
    if(post('cust_id')!= null) $cust_id=post('cust_id');
    if(request('cust_name')!= null) $cust_name=request('cust_name');
	if(request('cust_shop_name')!= null) $cust_shop_name=request('cust_shop_name');
	if(request('cust_mobile')!= null) $cust_mobile=request('cust_mobile');
	
	
	 $SqlStr = "UPDATE  customers SET cust_name='$cust_name', cust_shop_name='$cust_shop_name', cust_mobile='$cust_mobile', cust_mobile='$cust_mobile'WHERE cust_id='$cust_id' And company_id='$company_id' ";

     
      

    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";
	
	

}

function ResetPassword(){
global $dbconn;
	$company_id=$_SESSION['company_id'];

	if(post('user_id')!= null) $user_id=post('user_id');
	if(post('p')!= null) $pass=post('p');
	$pass = password_hash($pass, PASSWORD_BCRYPT);

	$SqlStr="UPDATE members set password='$pass' where id='$user_id'";
	$res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";
}
function ResetphonePassword(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	if(post('id')!= null) $id=post('id');
	if(post('p')!= null) $pass=post('p');
	$pass = password_hash($pass, PASSWORD_BCRYPT);

	$SqlStr="UPDATE members set password='$pass' where id='$id'";
	$res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";

}


function GetUserShippingNotify(){
	global $dbconn,$smarty;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM members WHERE type=4";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){

			array_push($list, array("mycount" => $i+1
								 ,"id" => $rows[$i]['id']
								 ,"username" => $rows[$i]['username']
								 ,"percent" => rand(10,95)
								));
		}
	$smarty->assign('notyfiSize',sizeof($list));
	return $list;
}

function GetCustomersRequest($selected){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	
	$SqlStr="SELECT sum(ProdQty) AS 'QTY',ProdName  FROM customers_request
WHERE ReqBillDate = CURDATE()
GROUP BY ProdName";

$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"qty" => $rows[$i]['QTY']
								 ,"ProdName" => $rows[$i]['ProdName']								
								));
		}
	return $list;
	

	}

function GetRequestsList(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	 $SqlStr="SELECT * , date(cr.ReqDate) AS 'RequtedDate'
FROM 
customers_request cr,
customers c,
members m
WHERE
m.id=c.user_id
AND cr.cust_id=c.cust_id
AND cr.request_status=0
AND c.company_id ='$company_id'
ORDER BY date(cr.ReqDate),cr.request_status ASC
";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"ReqId" => $rows[$i]['ReqId']
								 ,"ProdName" => $rows[$i]['ProdName']
								 ,"RequestedProdQty" => $rows[$i]['ProdQty']
								 ,"PriceUponRequest" => $rows[$i]['ProdPrice']
								 ,"ReqDate" => $rows[$i]['RequtedDate']
								 ,"cust_name" => $rows[$i]['cust_name']
								 ,"request_status" => $rows[$i]['request_status']
								 ,"cust_mobile" => $rows[$i]['cust_mobile']
								 ,"owner_id" => $rows[$i]['user_id']
								));
		}
	return $list;
}
//Edit vendor
function Editvendor(){
	global $dbconn;
  
	$company_id=$_SESSION['company_id'];
	//$company_id=$_SESSION['user_id'];
	if(request('vendor_id')!= null) $vendor_name=request('vendor_name');
	if(request('vendor_name')!= null) $vendor_name=request('vendor_name');
	if(request('vendor_phone')!= null) $vendor_phone=request('vendor_phone');
	if(request('vendor_tell')!= null) $vendor_tell=request('vendor_tell');
	// if(request('CompanyName')!= null) $CompanyName=request('CompanyName');
	// if(request('address')!= null) $address=post('address');

	
   
       $SqlStr = "UPDATE  vendors SET vendor_name='$vendor_name', vendor_phone='$vendor_phone', vendor_tell='$vendor_tell'  WHERE storeId='$storeId' And company_id='$company_id' ";

    
    $res= db_query($SqlStr);


	// 1 = success
	//2= faild error

	return "1";
}
//Edit price
function Editprice(){

	global $dbconn;
    $company_id=$_SESSION['company_id'];
    $manageable=0;
    if(post('priceId')!= null) $priceId=post('priceId');
    if(request('prod_id')!= null) $prod_id=request('prod_id');
    if(request('package_id')!= null) $package_id=request('package_id');
    if(request('ProductPrice')!= null) $ProductPrice=request('ProductPrice');
    if(request('ProductCost')!= null) $ProductCost=request('ProductCost');
	
	
    
         $SqlStr = "UPDATE  productprice SET prod_id='$prod_id', package_id='$package_id', ProductPrice='$ProductPrice', ProductCost='$ProductCost'  WHERE priceId='$priceId' And company_id='$company_id' ";

        $res= db_query($SqlStr);


	// 1 = success
	//2= faild error

	return "1";
}

function GetUserRequestList(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM members WHERE id IN(
SELECT c.user_id
FROM customers_request cr,
customers c
WHERE
cr.cust_id=c.cust_id
AND cr.request_status=0
) AND company_id='$company_id'";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			if($rows[$i]['status']==0)
				$status_name="Active";
			if($rows[$i]['status']==1)
				$status_name="Disabled";

			array_push($list, array("mycount" => $i+1
								 ,"id" => $rows[$i]['id']
								 ,"username" => $rows[$i]['username']
								 ,"phone" => $rows[$i]['phone']
								 ,"status" => $rows[$i]['status']
								 ,"status_name" => $status_name
								));
		}
	return $list;
}

//Edit Store
function Editstore(){ 

	global $dbconn;
    $company_id=$_SESSION['company_id'];
    if(request('storeId')!= null) $storeId=request('storeId');
    if(request('store_name')!= null) $store_name=request('store_name');
    if(request('store_type')!= null) $store_type=request('store_type');
    //if(request('store_status')!= null) $store_status=request('store_status');

	
    
       $SqlStr = "UPDATE  stores SET store_name='$store_name', store_type='$store_type' WHERE storeId='$storeId' And company_id='$company_id' ";


    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";

	} 
	
	function EditNewVendor(){

	global $dbconn;
    $company_id=$_SESSION['company_id'];
    if(post('vendor_id')!= null) $vendor_id=post('vendor_id');
    if(request('vendor_name')!= null) $vendor_name=request('vendor_name');
    if(request('vendor_phone')!= null) $vendor_phone=request('vendor_phone');
	if(request('vendor_tell')!= null) $vendor_tell=request('vendor_tell');
	//if(request('vendor_company_name')!= null) $vendor_company_name=request('vendor_company_name');

	
	
    
       $SqlStr = "UPDATE  vendors SET vendor_name='$vendor_name', vendor_phone='$vendor_phone', vendor_tell='$vendor_tell'  WHERE vendor_id='$vendor_id' And company_id='$company_id' ";


    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";

}

function GetStoresList(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * from stores where company_id='$company_id'";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			if($rows[$i]['store_type']==1)
				$store_type_name="Normal Store";
			if($rows[$i]['store_type']==2)
				$store_type_name="Shipping Store";
			if($rows[$i]['store_type']==3)
				$store_type_name="Return Store";
			if($rows[$i]['store_status']==1)
				$store_status_name="Active";
			if($rows[$i]['store_status']==2)
				$store_status_name="Not Active";


			array_push($list, array("mycount" => $i+1
								 ,"storeId" => $rows[$i]['storeId']
								 ,"store_name" => $rows[$i]['store_name']
								 ,"store_type" => $rows[$i]['store_type']
								 ,"store_type_name" => $store_type_name
								 ,"store_status" => $rows[$i]['store_status']
								 ,"store_status_name" => $store_status_name
								 ,"created_dt" => $rows[$i]['created_dt']
								));
		}
	return $list;
}


function UpdateFeaturedProducts(){
	global $dbconn;

	if(request('prod_id')!= null) $prod_id=request('prod_id');
	if(request('val')!= null) $val=request('val');

	if($val=='1'){
		 $SqlStr="SELECT count(*) as cnt FROM products WHERE
		company_id=(SELECT company_id from products WHERE prod_id='$prod_id')
		And featured=1
		And del=0";
		$res= db_query($SqlStr);
		$rows= db_fetch_array_all($res);
		$count= $rows[0]['cnt'];

		if($count > 6){
			return 1;
		}

	}

	  $sqlStr="UPDATE products set featured='$val' where prod_id='$prod_id'";
	  $dbconn->query($sqlStr);

	return 0;
	}


function CheckStore($priceId,$qty){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	$prod_id='';
	$package_id='';
	$QTY_AVALABLE='';
	$manageable='';

	$SqlStr="SELECT * FROM productprice pp,prod_in_store ps,products p
	WHERE
	pp.priceId='$priceId' AND
	pp.company_id='$company_id'
	AND pp.CurrentPrice=1
	AND pp.prod_id=ps.prod_id
	AND pp.package_id=ps.package_id
	limit 1";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);

	for($i=0;$i < $size;$i++){
				//$rows[$i]['id']
				$prod_id= $rows[$i]['prod_id'] ;
				$package_id= $rows[$i]['package_id'] ;
				$QTY_AVALABLE= $rows[$i]['QTY_AVALABLE'];
				$manageable= $rows[$i]['manageable'];
	}

if($size=='0'){
$SqlStr="SELECT * FROM products WHERE prod_id=(SELECT prod_id from productprice WHERE priceId='$priceId')";
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$manageable= $rows[0]['manageable'];
if($manageable == '0')
return 1;
else
return 0;
}

	if($manageable == '0'){
		return 1;
		}

	if($QTY_AVALABLE >= $qty ){
		return 1;
		}else{
		return 0;
		}

}

function GetProductStored(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT *
	FROM products p ,productprice pp ,packages pg,product_store ps,stores s
	WHERE
	pp.del=0
	AND s.storeId=ps.storeId
	And pp.company_id='$company_id'
	And pp.package_id=pg.package_id
	And pp.prod_id=p.prod_id
	AND ps.prod_id=p.prod_id
	AND ps.package_id =pg.package_id
	Order by ps.Store_id DESC
	";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){

			$TranType=$rows[$i]['Store_type'];
			if($TranType==0)
			$TranTypeVal="مدخلات";
			else
			$TranTypeVal="مخرجات";


			array_push($list, array("mycount" => $i+1
								 ,"prod_id" => $rows[$i]['prod_id']
								 ,"priceId" => $rows[$i]['priceId']
								 ,"prod_name" => $rows[$i]['prod_name']
								 ,"ProdNamePackage" => $rows[$i]['prod_name'] . ' - ' . $rows[$i]['package_name']
								 ,"package_name" => $rows[$i]['package_name']
								 ,"qty" => $rows[$i]['qty']
								 ,"tran_date" => $rows[$i]['tran_date']
								 ,"store_name" => $rows[$i]['store_name']
								 ,"TranType" => $TranTypeVal
								));
		}
	return $list;
}

function GetProductInStore(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM products p ,productprice pp ,packages pg,prod_in_store ps,stores s
	WHERE
	pp.del=0
	AND s.storeId=ps.storeId
	And pp.company_id='$company_id'
	And pp.package_id=pg.package_id
	And pp.prod_id=p.prod_id
	AND ps.prod_id=p.prod_id
	AND ps.package_id =pg.package_id
	Order By s.storeId ASC
	";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"prod_id" => $rows[$i]['prod_id']
								 ,"priceId" => $rows[$i]['priceId']
								 ,"prod_name" => $rows[$i]['prod_name']
								 ,"ProdNamePackage" => $rows[$i]['prod_name'] . ' - ' . $rows[$i]['package_name']
								 ,"package_name" => $rows[$i]['package_name']
								 ,"store_name" => $rows[$i]['store_name']
								 ,"QTY_AVALABLE" => $rows[$i]['QTY_AVALABLE']
								));
		}
	return $list;
}

function Add_store($qty,$prod_id,$package_id,$storeId,$company_id,$Store_type,$ShippingId){
	global $dbconn;
	  $sqlStr="INSERT INTO product_store (storeId,qty,prod_id,package_id,company_id,Store_type,ShippingId)
	VALUES ('$storeId','$qty','$prod_id','$package_id','$company_id','$Store_type','$ShippingId')";

	$dbconn->query($sqlStr);

	return 0;
	}

//Update Info

function EditinPhonefo(){
global $dbconn;
$company_id=$_SESSION['company_id'];

    if(post('id')!= null) $id=post('id');
    if(request('username')!= null) $username=request('username');
	if(request('email')!= null) $email=request('email');
	if(request('phone')!= null) $phone=request('phone');
      if(request('status')!= null) $status=request('status');
	
      $SqlStr = "UPDATE members SET username='$username', email='$email', phone='$phone', status='$status' WHERE id='$id' And company_id='$company_id'";

    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";
}


//delete user
function deleteinfo($user_id){
global $dbconn; 
//$company_id=$_SESSION['company_id'];

	
      $SqlStr = "SELECT FROM members  WHERE id='$user_id' ";

    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";
}

// edit customer



function Save_store(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	if(post('priceId')!= null) $priceId=post('priceId');
	if(post('qty')!= null) $qty=post('qty');
	if(post('storeId')!= null) $storeId=post('storeId');

	$prod_id='';
	$package_id='';


	$SqlStr="SELECT * FROM productprice
	WHERE priceId='$priceId' AND company_id='$company_id' AND CurrentPrice=1  limit 1";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
				//$rows[$i]['id']
				$prod_id= $rows[$i]['prod_id'] ;
				$package_id= $rows[$i]['package_id'] ;
	}
	if($qty <= 0 or $prod_id=='' or $package_id=='' or $company_id=='' ){
		return 0;
		}else{
	Add_store($qty,$prod_id,$package_id,$storeId,$company_id,'0','0');
	AddNewRecentActivity("10",$_SESSION['user_id']);
	return 1;
		}
}


function SubmitReturn(){
	global $dbconn;

	$priceId='';
	$qty='';
	$PaymentStatus='';
	$owner_id='';

	$company_id=$_SESSION['company_id'];
	if(post('ShippingID')!= null) $ShippingID=post('ShippingID');
	if(post('ProductName')!= null) $ProductName=post('ProductName');
	if(post('return')!= null) $returnVal=post('return');
	if(post('storeId')!= null) $storeId=post('storeId');

	$SqlStr="SELECT * FROM v_shipping where  ShippingId ='$ShippingID' limit 1";
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();

	for($i=0;$i < $size;$i++){
				//$rows[$i]['id']
		$ProductPackagePrice=$rows[$i]['ProductPackagePrice'];
		$qty=$rows[$i]['qty'];
		$PaymentStatus=$rows[$i]['PaymentStatus'];
		$owner_id=$rows[$i]['owner_id'];
		$PaidAmount=$rows[$i]['PaidAmount'];
		$TotalPrice=$rows[$i]['TotalPrice'];
	}

	if($returnVal > $qty ){
		return 1;
	}

	if($PaidAmount > 0){
		$CavredQTY = ($TotalPrice - $PaidAmount) / $ProductPackagePrice  ;
		if($returnVal > $CavredQTY){
			return 2;
		}
	}

	$dbconn->query("UPDATE shipping SET qty=( qty - '$returnVal') where ShippingId='$ShippingID'");

	$SqlStr="SELECT * FROM productprice
			WHERE priceId=(select priceId from shipping where ShippingId='$ShippingID')";
			$res= db_query($SqlStr);
			$rows= db_fetch_array_all($res);
			$prod_id= $rows[0]['prod_id'];
			$package_id= $rows[0]['package_id'];

	Add_store($returnVal,$prod_id,$package_id,$storeId,$company_id,'0',$ShippingID);

	return '0';
}

function SendUserInfo($id){
	global $dbconn, $smarty;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM members where id='$id' limit 1";
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
				//$rows[$i]['id']
				$smarty->assign('USR_username',$rows[$i]['username']);
				$smarty->assign('USR_email',$rows[$i]['email']);
				$smarty->assign('USR_phone',$rows[$i]['phone']);
	}
return;
}


function SendCompanyInfo(){
	global $dbconn, $smarty;
	$company_id=$_SESSION['company_id'];

	$SqlStr="SELECT * FROM companies where company_id='$company_id' limit 1";
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
				//$rows[$i]['id']
				$smarty->assign('COM_company_name',$rows[$i]['company_name']);
				$smarty->assign('COM_Country',$rows[$i]['Country']);
				$smarty->assign('COM_City',$rows[$i]['City']);
				$smarty->assign('COM_Address',$rows[$i]['Address']);
				$smarty->assign('COM_tell',$rows[$i]['tell']);
	}
return;
}


function GetSheppingPendingAmount($ShippingId){
	global $dbconn;

	if($res=$dbconn->query("SELECT (TotalPrice-PaidAmount) AS 'PendingAmount' FROM `v_shipping` WHERE ShippingId='$ShippingId' ")){
				$rows= db_fetch_array_all($res);
				return $rows[0][0];
			}else{
				return 0;
			}



}

function NewReceiptPayment ($post){
	global $dbconn;

	$company_id=$_SESSION['company_id'];
	$ShippingId=$_GET['ShippingId'];
	$pendingAmount=GetSheppingPendingAmount($ShippingId);

	if(post('NewAmount')!= null) $NewAmount=post('NewAmount');


	// Using prepared statements means that SQL injection is not possible.
	$SqlStr="insert into shippingpayment (ShippingId,PaidAmount) VALUES (?,?)";
	if($NewAmount<=$pendingAmount){
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ss', $ShippingId,$NewAmount);  // Bind  parameter.
        $stmt->execute();    // Execute the prepared query.
		UpdateShepingStatus($ShippingId,'1');
        return $stmt->store_result();
	}
	}else{
		return 2;
	}



}


function AddNewShipmentment($post){
	global $dbconn;
    $priceId='';
	$qty='';
	$owner_id='';

	$company_id=$_SESSION['company_id'];

	if(post('priceId')!= null) $priceId=post('priceId');
	if(post('qty')!= null) $qty=post('qty');
	if(post('owner_id')!= null) $owner_id=post('owner_id');
	if(post('storeId')!= null) $storeId=post('storeId');

	$CheckStore=CheckStore($priceId,$qty);
	if($CheckStore==1){
		// Using prepared statements means that SQL injection is not possible.
		$SqlStr="insert into shipping (priceId,qty,owner_id) VALUES (?,?,?)";
		if ($stmt = $dbconn->prepare($SqlStr)) {
			$stmt->bind_param('sss', $priceId,$qty,$owner_id);  // Bind  parameter.
			$stmt->execute();    // Execute the prepared query.
			//NewActivity($ACTIVITY_TYPE=1,$owner_id);
			if($stmt->store_result()==1){
			$ShippingId=db_insert_id();

			$SqlStr="SELECT * FROM productprice
			WHERE priceId='$priceId'";
			$res= db_query($SqlStr);
			$rows= db_fetch_array_all($res);
			$prod_id= $rows[0]['prod_id'];
			$package_id= $rows[0]['package_id'];
			Add_store($qty,$prod_id,$package_id,$storeId,$company_id,'1',$ShippingId);
			}
			return $stmt->store_result();
			AddNewRecentActivity("11",$_SESSION['user_id']);
		}
	}else{
	 return 2;
	}


}


function AddNewVendor_full($post){
	global $dbconn;
    $Mobile='';
	$address='';
	$CompanyName='';
	$Phone='';

	$company_id=$_SESSION['company_id'];
	$company_id=$_SESSION['user_id'];
	if(post('vendor_name')!= null) $vendor_name=post('vendor_name');
	if(post('vendor_phone')!= null) $vendor_phone=post('vendor_phone');
	if(post('vendor_tell')!= null) $vendor_tell=post('vendor_tell');
	if(post('CompanyName')!= null) $CompanyName=post('CompanyName');
	if(post('address')!= null) $address=post('address');

	// Using prepared statements means that SQL injection is not possible.
	$SqlStr="insert into vendors (vendor_name,vendor_phone,vendor_tell,vendor_company_name,vendor_Company_address,company_id) VALUES (?,?,?,?,?,?)";

    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ssssss', $vendor_name,$vendor_phone,$vendor_tell,$CompanyName,$address,$company_id);  // Bind "$email" to parameter.
        $stmt->execute();  // Execute the prepared query.
        AddNewRecentActivity("4",$_SESSION['user_id']);
        return $stmt->store_result();

	}
}


function AddNewVendor($post){
	global $dbconn;
	$VendorName=post('vendor_name');
	$company_id=$_SESSION['company_id'];
	$SqlStr= "insert into vendors (vendor_name,company_id) VALUES ('$VendorName','$company_id')";
	$dbconn->query($SqlStr);
}


function AddNewProductsPrices($post){
	global $dbconn;
	$manageable=0;
	$prod_id=post('prod_id');
	$package_id=post('package_id');
	$ProductPrice=post('ProductPrice');
	$ProductCost=post('ProductCost');
	$company_id=$_SESSION['company_id'];

		if(RemoveDefaultPrice($prod_id,$package_id,$company_id)==true){
			if($dbconn->query("insert into productprice (prod_id,package_id, ProductPrice,ProductCost, company_id) VALUES
			('$prod_id','$package_id','$ProductPrice','$ProductCost','$company_id')")){
				AddNewRecentActivity("9",$_SESSION['user_id']);
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
}


function RemoveDefaultPrice($prod_id,$package_id,$company_id){
	global $dbconn;

	if($dbconn->query("update productprice set CurrentPrice=0 where prod_id='$prod_id' and package_id='$package_id' and company_id='$company_id'")){
				return true;
			}else{
				return false;
			}

	}

function AddNewProduct($post){
	global $dbconn;
	$manageable=0;

	$prod_name=post('prod_name');
	$status=post('status');
	$vendor_id=post('vendor_id');
	if(isset($_POST['manageable'])){
		$manageable=post('manageable');
	}
	$Descriptions=post('Descriptions');
	$company_id=$_SESSION['company_id'];

	if($dbconn->query("insert into products (prod_name,manageable, Descriptions,vendor_id, status,company_id) VALUES ('$prod_name','$manageable','$Descriptions','$vendor_id','$status','$company_id')")){
		AddNewRecentActivity("8",$_SESSION['user_id']);
		return 1;
	}else{
		return 0;
	}
}

//Edit new product
function EditNewProduct(){  
	global $dbconn;
    $company_id=$_SESSION['company_id'];
    $manageable=0;
    if(post('prod_id')!= null) $prod_id=post('prod_id');
    if(request('prod_name')!= null) $prod_name=request('prod_name');
    if(isset($_POST['manageable'])){
		$manageable=post('manageable');
	}
    if(request('vendor_id')!= null) $vendor_id=request('vendor_id');
	if(request('status')!= null) $status=request('status');
	
    
       $SqlStr = "UPDATE  products SET prod_name='$prod_name', manageable='$manageable', vendor_id='$vendor_id', status='$status'  WHERE prod_id='$prod_id' And company_id='$company_id' ";


    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";

}
//Edit Package
function Editpackage(){
	global $dbconn;
    $company_id=$_SESSION['company_id'];
  
    if(post('package_id')!= null) $package_id=post('package_id');
    if(request('package_name')!= null) $package_name=request('package_name');
	if(request('package_abbreviation')!= null) $package_abbreviation=request('package_abbreviation');

	
      $SqlStr = "UPDATE  packages SET package_name='$package_name', package_abbreviation='$package_abbreviation'  WHERE package_id='$package_id' And company_id='$company_id'";

    
    $res= db_query($SqlStr);

	// 1 = success
	//2= faild error

	return "1";
}



function AddNewPackage($post){
	global $dbconn;
	$package_name=post('package_name');
	$package_abbreviation=post('package_abbreviation');
	$company_id=$_SESSION['company_id'];
	if($dbconn->query("insert into packages (package_name, package_abbreviation ,company_id) VALUES ('$package_name','$package_abbreviation','$company_id')")){
		AddNewRecentActivity("7",$_SESSION['user_id']);
		return 1;
	}else{
		return 0;
	}
}

function SendReceiptInfo($ShippingId){
global $dbconn;

return;
	}

function UpdateShepingStatus($ShippingId,$status){
	global $dbconn;

	if($dbconn->query("UPDATE `shipping` SET `PaymentStatus` = '$status' WHERE `shipping`.`ShippingId` = '$ShippingId'")){
				return true;
			}else{
				return false;
			}

}

function GetSalesRevenueListByDateRange(){
global $dbconn,$dtFrom,$dtTo,$prod_id,$ProdName;
$company_id=$_SESSION['company_id'];

if(post('dtfrom')!= null) $dtFrom=post('dtfrom');
if(post('dtto')!= null) $dtTo=post('dtto');
if(post('prod_id')!= null) $prod_id=post('prod_id');

$where='';

if($prod_id!=''){
	$where = $where . " AND bill.prod_id = '$prod_id'";
}

$SqlStr="SELECT
p.prod_name, bill.ProdName,
v.vendor_name,
date(bill.BillDate) AS 'BillDate',
sum(ProdQty) AS 'SalesQTY',
pg.package_abbreviation AS 'SizerName',
bill.ProductCost,
bill.ProdPrice
FROM v_bills_full_info bill,products p,vendors v,packages pg
WHERE
bill.prod_id=p.prod_id
AND bill.package_id=pg.package_id
AND p.vendor_id=v.vendor_id
AND date(bill.BillDate) >= '$dtFrom' AND date(bill.BillDate) <= '$dtTo'
 $where
GROUP By bill.ProdName, v.vendor_name, date(bill.BillDate), pg.package_abbreviation ,bill.ProductCost, bill.ProdPrice
ORDER BY bill.BillDate DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
$totalCost=0;
$totalRevenue=0;

	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/

$totalCost= $totalCost + ($rows[$i]['ProductCost'] * $rows[$i]['SalesQTY']);
$totalRevenue= $totalRevenue + ($rows[$i]['ProdPrice'] * $rows[$i]['SalesQTY']);


		array_push($list, array("mycount" => $i+1
							 ,"ProdName" => $rows[$i]['ProdName']
							 ,"vendor_name" => $rows[$i]['vendor_name']
							 ,"BillDate" => $rows[$i]['BillDate']
							 ,"SizerName" => $rows[$i]['SizerName']
							 ,"SalesQTY" => $rows[$i]['SalesQTY']
 							 ,"ProductCost" => $rows[$i]['ProductCost']
							 ,"ProdPrice" => $rows[$i]['ProdPrice']
							 ,"CostRevenue" => ($rows[$i]['ProductCost'] * $rows[$i]['SalesQTY'])
							 ,"SalesRevenue" => ($rows[$i]['ProdPrice'] * $rows[$i]['SalesQTY'])
							 ,"totalCost" => ConvertMoney($totalCost)
							 ,"totalRevenue" => ConvertMoney($totalRevenue)
							));
	$ProdName=$rows[$i]['prod_name'];
	}

return $list;
}

function GetProductsSalesListByDateRange(){
global $dbconn,$dtFrom,$dtTo,$prod_id,$ProdName;
$company_id=$_SESSION['company_id'];

if(post('dtfrom')!= null) $dtFrom=post('dtfrom');
if(post('dtto')!= null) $dtTo=post('dtto');
if(post('prod_id')!= null) $prod_id=post('prod_id');

$where='';

if($prod_id!=''){
	$where = $where . " AND bill.prod_id = '$prod_id'";
}

$SqlStr="SELECT p.prod_name, bill.ProdName, v.vendor_name, date(bill.BillDate) AS 'BillDate',sum(ProdQty) AS 'SalesQTY', pg.package_abbreviation AS 'SizerName' FROM v_bills_full_info bill,products p,vendors v,packages pg
WHERE
bill.prod_id=p.prod_id
AND bill.package_id=pg.package_id
AND p.vendor_id=v.vendor_id
AND date(bill.BillDate) >= '$dtFrom' AND date(bill.BillDate) <= '$dtTo'
 $where
GROUP By bill.ProdName, v.vendor_name, date(bill.BillDate), pg.package_abbreviation
ORDER BY bill.BillDate DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
$toalPendingAmt = 0;
	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/
		array_push($list, array("mycount" => $i+1
							 ,"ProdName" => $rows[$i]['ProdName']
							 ,"vendor_name" => $rows[$i]['vendor_name']
							 ,"BillDate" => $rows[$i]['BillDate']
							 ,"SizerName" => $rows[$i]['SizerName']
							 ,"SalesQTY" => $rows[$i]['SalesQTY']
							));
	$ProdName=$rows[$i]['prod_name'];
	}

return $list;
}


function GetPaymentsListByDateRange(){
global $dbconn,$selected,$dtFrom,$dtTo,$UsrName;
$company_id=$_SESSION['company_id'];

$dtfrom= post('dtfrom');
$dtto=post('dtto');
$owner_id=post('owner_id');
$selected=$owner_id;
$dtFrom=$dtfrom;
$dtTo=$dtto;
$where='';

 $SqlStr="SELECT * , date(ShippingDate) AS 'Shippingdt' FROM v_shipping s, members m
WHERE s.owner_id='$owner_id'
AND s.owner_id=m.id
AND date(s.ShippingDate) >= '$dtfrom' AND date(s.ShippingDate) <= '$dtto'
ORDER BY s.ShippingId DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
$toalPendingAmt = 0;
	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/


		$spanclass=$rows[$i]['PaymentStatus'];
		$PaymentStatus="";

		if($spanclass==2){
		 $spanclass='label label-success label-mini';
		 $PaymentStatus="Full Paid";
		}elseif($spanclass==1){
		 $spanclass='label label-warning';
		 $PaymentStatus="Not Complete";
		}else{
		 $spanclass='label label-danger label-mini';
		 $PaymentStatus="No Payment";
		}

		 $Pending=ConvertMoney($rows[$i]['TotalPrice']-$rows[$i]['PaidAmount']);
		 $toalPendingAmt = $toalPendingAmt + ($rows[$i]['TotalPrice']-$rows[$i]['PaidAmount']);
		 if($Pending<=0){
			 UpdateShepingStatus($rows[$i]['ShippingId'],2);
		}
		array_push($list, array("mycount" => $i+1
							 ,"ShippingId" => $rows[$i]['ShippingId']
							 ,"ProdNamePackage" => $rows[$i]['ProdNamePackage']
							 ,"qty" => ($rows[$i]['qty'] * 1)
							 ,"ProductPackagePrice" => ConvertMoney($rows[$i]['ProductPackagePrice']) 					 					 		 ,"TotalPrice" => ConvertMoney($rows[$i]['TotalPrice'])
							 ,"PaidAmount" => ConvertMoney($rows[$i]['PaidAmount'])
							 ,"Pending" => $Pending
							 ,"ShippingDate" => $rows[$i]['Shippingdt']
							 ,"spanclass" => $spanclass
							 ,"PaymentStatusId" => $rows[$i]['PaymentStatus']
							 ,"username" => $rows[$i]['username']
							 ,"PaymentStatus" => $PaymentStatus
							 ,"toalPendingAmt" => ConvertMoney($toalPendingAmt)
							));

$UsrName=$rows[$i]['username'];

	}




return $list;
}

function GetFinanceShipmentmentList($owner_id){
global $dbconn, $ProductName,$qty,$ProductPackagePrice,$TotalPrice,$RemainingBalance;

$where='';
if(isset($_GET['ShippingId']) && ($_GET['ShippingId']!='')){
$ShippingId=$_GET['ShippingId'];
SendReceiptInfo($ShippingId);
$where=" and ShippingId='$ShippingId'";
}

$company_id=$_SESSION['company_id'];
$SqlStr="SELECT *, date(ShippingDate) as 'Shipping_dt' FROM v_shipping
WHERE owner_id='$owner_id'
AND PaymentStatus in (0,1)
$where
ORDER BY ShippingId DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
$toalPendingAmt = 0;
$toalTotalPrice =0;
$toalPaidAmt  =0;

	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/


		$spanclass=$rows[$i]['PaymentStatus'];
		$PaymentStatus="";

		if($spanclass==2){
		 $spanclass='label label-success label-mini';
		 $PaymentStatus="Full Paid";
		}elseif($spanclass==1){
		 $spanclass='label label-danger label-mini';
		 $PaymentStatus="Not Complete";
		}else{
		 $spanclass='label label-danger label-mini';
		 $PaymentStatus="No Payment";
		}

		 $Pending=ConvertMoney($rows[$i]['TotalPrice']-$rows[$i]['PaidAmount']);
		 $toalPendingAmt = $toalPendingAmt + ($rows[$i]['TotalPrice']-$rows[$i]['PaidAmount']);
		 
		 
		 $toalTotalPrice  = $toalTotalPrice  + ($rows[$i]['TotalPrice']);
		 
		  $toalPaidAmt  = $toalPaidAmt  + ($rows[$i]['PaidAmount']);
		 		 
		 
		 
		 
		 
		 if($Pending<=0){
			 UpdateShepingStatus($rows[$i]['ShippingId'],2);
		}else{
		array_push($list, array("mycount" => $i+1
							 ,"ShippingId" => $rows[$i]['ShippingId']
							 ,"ProdNamePackage" => $rows[$i]['ProdNamePackage']
							 ,"qty" => ($rows[$i]['qty'] * 1)
							 ,"ProductPackagePrice" => ConvertMoney($rows[$i]['ProductPackagePrice'])
							 ,"TotalPrice" => ConvertMoney($rows[$i]['TotalPrice'])
							 ,"PaidAmount" => ConvertMoney($rows[$i]['PaidAmount'])
							 ,"Pending" => $Pending
							 ,"spanclass" => $spanclass
							 ,"PaymentStatusId" => $rows[$i]['PaymentStatus']
							 ,"Shipping_dt" => $rows[$i]['Shipping_dt']
							 ,"priceId" => $rows[$i]['priceId']
							 ,"PaymentStatus" => $PaymentStatus
							 ,"toalPendingAmt" => ConvertMoney($toalPendingAmt)
							 ,"toalTotalPrice" => ConvertMoney($toalTotalPrice)
							 ,"toalPaidAmt" => ConvertMoney($toalPaidAmt)
							));

				if(isset($_GET['ShippingId']) && ($_GET['ShippingId']!='')){
					$ProductName=$rows[$i]['ProdNamePackage']  ;
					$ProductPackagePrice=ConvertMoney($rows[$i]['ProductPackagePrice']);
					$qty=$rows[$i]['qty'];
					$TotalPrice=ConvertMoney($rows[$i]['TotalPrice']);
					$RemainingBalance=0;
				}
		}
	}




return $list;
}


function GetShipmentmentListByDateRange(){
global $dbconn,$selected,$dtFrom,$dtTo,$UsrName;
$company_id=$_SESSION['company_id'];

$dtfrom= post('dtfrom');
$dtto=post('dtto');
$owner_id=post('owner_id');
$selected=$owner_id;
$dtFrom=$dtfrom;
$dtTo=$dtto;


$SqlStr="SELECT * , date(s.ShippingDate) AS 'ShippingDt' FROM v_shipping s, members m
WHERE
s.owner_id='$owner_id'
AND s.owner_id=m.id
AND date(s.ShippingDate) >= '$dtfrom'
AND date(s.ShippingDate) <= '$dtto'
ORDER BY s.ShippingId DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/


		$spanclass=$rows[$i]['PaymentStatus'];
		$PaymentStatus="";

		if($spanclass==2){
		 $spanclass='label label-success label-mini';
		 $PaymentStatus="Full Paid";
		}elseif($spanclass==1){
		 $spanclass='label label-warning';
		 $PaymentStatus="Not Complete";
		}else{
		 $spanclass='label label-danger label-mini';
		 $PaymentStatus="No Payment";
		}


		array_push($list, array("mycount" => $i+1
							 ,"ShippingId" => $rows[$i]['ShippingId']
							 ,"ProdNamePackage" => $rows[$i]['ProdNamePackage']
							 ,"qty" => ($rows[$i]['qty'] * 1 )
							 ,"ProductPackagePrice" => ($rows[$i]['ProductPackagePrice'])
							 ,"TotalPrice" => ConvertMoney($rows[$i]['TotalPrice'] )
							 ,"spanclass" => $spanclass
							 ,"PaymentStatusId" => $rows[$i]['PaymentStatus']
							 ,"username" => $rows[$i]['username']
							 ,"ShippingDate" => $rows[$i]['ShippingDt']
							 ,"PaymentStatus" => $PaymentStatus
							));
        $UsrName=$rows[$i]['username'];
	}
return $list;
}

function GetShipmentmentList($owner_id){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM v_shipping
WHERE owner_id='$owner_id' ORDER BY ShippingId DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/


		$spanclass=$rows[$i]['PaymentStatus'];
		$PaymentStatus="";

		if($spanclass==2){
		 $spanclass='label label-success label-mini';
		 $PaymentStatus="Full Paid";
		}elseif($spanclass==1){
		 $spanclass='label label-warning';
		 $PaymentStatus="Not Complete";
		}else{
		 $spanclass='label label-danger label-mini';
		 $PaymentStatus="No Payment";
		}


		array_push($list, array("mycount" => $i+1
							 ,"ShippingId" => $rows[$i]['ShippingId']
							 ,"ProdNamePackage" => $rows[$i]['ProdNamePackage']
							 ,"qty" => ($rows[$i]['qty'] * 1 )
							 ,"ProductPackagePrice" => ($rows[$i]['ProductPackagePrice'])
							 ,"TotalPrice" => ConvertMoney($rows[$i]['TotalPrice'] )
							 ,"spanclass" => $spanclass
							 ,"PaymentStatusId" => $rows[$i]['PaymentStatus']
							 ,"PaymentStatus" => $PaymentStatus
							));
	}
return $list;
}


function GetUsersPhone(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM members where
del=0
And company_id='$company_id'
And type = 4
order by status, id DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/
		$type=$rows[$i]['type'];
		if($type==0) $type="Admin Accout";
		if($type==1) $type="Sales Administration";
		if($type==2) $type="Financial Management";
		if($type==3) $type="Production Management";
		if($type==4) $type="Phone User";

		$status=$rows[$i]['status'];
		if($status==0) $status='<span class="label label-success label-mini">Active</span>';
		if($status==1) $status='<span class="label label-danger label-mini">Disabled</span>';
		
		
		array_push($list, array("mycount" => $i+1
		
							 ,"id" => $rows[$i]['id']
							 ,"username" => $rows[$i]['username']
							 ,"email" => $rows[$i]['email']
							 ,"phone" => $rows[$i]['phone']
							 ,"type" => $type
							 ,"status" => $status
							 ,"CustomerCount" => size_of(GET_CUSTOMERS($rows[$i]['id']))
							 ,"NotComplete" => GetTotalNotComplete($rows[$i]['id'])							 
							));
	}
return $list;
}

function GetTotalNotComplete($owner_id){
global $dbconn;
	$company_id=$_SESSION['company_id'];
	$SqlStr="SELECT count(*) FROM `shipping` where PaymentStatus<>2 and owner_id='$owner_id' ";
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	return $rows[0][0];
}



function GetUsers(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM members where
del=0
And company_id='$company_id'
And type <> 4
order by status, id DESC
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
/*
0=Web Admin Accout,
1=Web Sales Administration,
2=Web Financial Management,
3=Web Production Management,
4=Phone AndroidUser'
*/
		$type=$rows[$i]['type'];
		if($type==0) $type="Admin Accout";
		if($type==1) $type="Sales Administration";
		if($type==2) $type="Financial Management";
		if($type==3) $type="Production Management";

		$status=$rows[$i]['status'];
		if($status==0) $status='<span class="label label-success label-mini">Active</span>';
		if($status==1) $status='<span class="label label-danger label-mini">Disabled</span>';

		array_push($list, array("mycount" => $i+1
							 ,"user_id" => $rows[$i]['id']
							 ,"username" => $rows[$i]['username']
							 ,"email" => $rows[$i]['email']
							 ,"phone" => $rows[$i]['phone']
							 ,"typeId" => $rows[$i]['type']
							 ,"type" => $type
							 ,"status" => $status
							));
	}
return $list;
}

function GetVendors(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM vendors where
del=0
And company_id='$company_id'
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"vendor_id" => $rows[$i]['vendor_id']
							 ,"vendor_name" => $rows[$i]['vendor_name']
							 ,"vendor_phone" => $rows[$i]['vendor_phone']
							 ,"vendor_tell" => $rows[$i]['vendor_tell']
							 ,"vendor_company_name" => $rows[$i]['vendor_company_name']
							));
	}
return $list;
}

// function to get page

function GetPagesGroupList(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM pages_group order by Group_id ASC";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"Group_id" => $rows[$i]['Group_id']
							 ,"Group_name" => $rows[$i]['Group_name']
							));
	}
return $list;

}

function GetPagesList(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM pages_table where tab <> 0";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"page_id" => $rows[$i]['page_id']
							 ,"page_name" => $rows[$i]['page_name']
							));
	}
return $list;

}

function GetPagesDisplay(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM  pages_priveleges ";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"page_id" => $rows[$i]['page_id']
							 ,"status" => $rows[$i]['status']		
							 ,"Group_id" => $rows[$i]['Group_id']						 
							));
	}
return $list;

}

 


function GetProducts(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM products p,vendors v  where
p.del=0
And p.company_id='$company_id'
And v.vendor_id=p.vendor_id
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"prod_id" => $rows[$i]['prod_id']
							 ,"prod_name" => $rows[$i]['prod_name']
							 ,"manageable" => $rows[$i]['manageable']
							 ,"Descriptions" => $rows[$i]['Descriptions']
							 ,"vendor_name" => $rows[$i]['vendor_name']
							 ,"status" => $rows[$i]['status']
							 ,"featured" => $rows[$i]['featured']
							));
	}
return $list;
}

function GetProductsPricesByProdId($prod_id){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	$SqlStr="SELECT * FROM products p ,productprice pp ,packages pg  where
	pp.del=0
	And p.prod_id='$prod_id'
	And pp.company_id='$company_id'
	And pp.package_id=pg.package_id
	And pp.prod_id=p.prod_id
	And pp.CurrentPrice=1
	";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"prod_id" => $rows[$i]['prod_id']
								 ,"priceId" => $rows[$i]['priceId']
								 ,"prod_name" => $rows[$i]['prod_name']
								 ,"ProdNamePackage" => $rows[$i]['prod_name'] . ' - ' . $rows[$i]['package_name']
								 ,"package_name" => $rows[$i]['package_name']
								 ,"ProductCost" => ConvertMoney($rows[$i]['ProductCost'])
								 ,"ProductPrice" => ConvertMoney($rows[$i]['ProductPrice'])
								 ,"PriceDate" => $rows[$i]['PriceDate']
								));
		}
	return $list;
}


function GetStoresPrices(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	$SqlStr="SELECT * FROM stores where company_id='$company_id' AND store_status=1";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"storeId" => $rows[$i]['storeId']
								 ,"store_name" => $rows[$i]['store_name']
								 ,"store_type" => $rows[$i]['store_type']
								));
		}
	return $list;
}

function GetProductsPrices(){
	global $dbconn;
	$company_id=$_SESSION['company_id'];
	$SqlStr="SELECT * FROM products p ,productprice pp ,packages pg  where
	pp.del=0
	And pp.company_id='$company_id'
	And pp.package_id=pg.package_id
	And pp.prod_id=p.prod_id
	And pp.CurrentPrice=1
	";

	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			array_push($list, array("mycount" => $i+1
								 ,"prod_id" => $rows[$i]['prod_id']
								 ,"priceId" => $rows[$i]['priceId']
								 ,"prod_name" => $rows[$i]['prod_name']
								 ,"ProdNamePackage" => $rows[$i]['prod_name'] . ' - ' . $rows[$i]['package_name']
								 ,"package_name" => $rows[$i]['package_name']
								 ,"ProductCost" => ConvertMoney($rows[$i]['ProductCost'])
								 ,"ProductPrice" => ConvertMoney($rows[$i]['ProductPrice'])
								 ,"PriceDate" => $rows[$i]['PriceDate']
								));
		}
	return $list;
}


function MoveCustomers(){
global $dbconn;
	if(request('selected')!= null) $selected=request('selected');
	if(request('MoveTo')!= null) $MoveTo=request('MoveTo');
	if(request('list')!= null) $list=request('list');
	if(request('who')!= null) $who=request('who');
	$company_id=$_SESSION['company_id'];
	$list=trim($list,',');
	if($who=='usr')
	$SqlStr="UPDATE customers set user_id='$MoveTo' where cust_id  in ($list) ";
	
	if($who=='cls')
	$SqlStr="UPDATE customers set cls_id='$MoveTo' where cust_id  in ($list) ";
	
	if($who=='AutoMove')
	$SqlStr="UPDATE customers set cls_auto='$MoveTo' where cust_id=$selected";
	
	$res= db_query($SqlStr);
	
	return "Selected customer has been moved";
}

function GetProductPrice(){
global $dbconn;
	$company_id=$_SESSION['company_id'];
	$priceId =$_GET['priceId'];
	$SqlStr="SELECT * FROM productprice where priceId= '$priceId' ";
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	return $rows[0]['ProductPrice'];
}

function GetPackages(){
global $dbconn;
$company_id=$_SESSION['company_id'];
$SqlStr="SELECT * FROM packages where del=0 and company_id='$company_id'";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"package_id" => $rows[$i]['0']
							 ,"package_name" => $rows[$i]['1']
							 ,"package_abbreviation" => $rows[$i]['2']
							));
	}
return $list;
}


function esc_url($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

//register new customer
function NewRegisterCustomer($post){
	global $dbconn;
	$error_msg='';
	$company_id=$_SESSION['company_id'];
	$entered_by_id=$_SESSION['user_id'];

	if (isset($post['cust_name'], $post['cust_shop_name'],  $post['cust_mobile'], $post['weekId'], $post['location_id'], $post['user_id'])) {
    // Sanitize and validate the data passed in
	if(post('user_id')!= null) $user_id=post('user_id');
    $cust_name = filter_input(INPUT_POST, 'cust_name', FILTER_SANITIZE_STRING);
    $cust_shop_name = filter_input(INPUT_POST, 'cust_shop_name', FILTER_SANITIZE_STRING);
	$cust_mobile = filter_input(INPUT_POST, 'cust_mobile', FILTER_SANITIZE_STRING);
	$weekId = filter_input(INPUT_POST, 'weekId', FILTER_SANITIZE_STRING);
	$location_id = filter_input(INPUT_POST, 'location_id', FILTER_SANITIZE_STRING);
	


    // TODO:
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {


        // Insert the new user into the database
        if ($insert_stmt = $dbconn->prepare("INSERT INTO customers (cust_name, cust_shop_name, cust_mobile,weekId,location_id, user_id, entered_by, company_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssssss', $cust_name, $cust_shop_name, $cust_mobile, $weekId, $location_id, $user_id, $entered_by_id, $company_id);
            // Execute the prepared query.
            if ($stmt=$insert_stmt->execute()) {
                $rtn= "1";

            }else{
             	$rtn="2"; 
             	AddNewRecentActivity("5",$_SESSION['user_id']);              
            }

        }

    }
  }
  return $rtn;

}


function NewRegister($post){
	global $dbconn;
	$error_msg='';
	$company_id=$_SESSION['company_id'];

	if (isset($post['username'], $post['email'], $post['p'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
	$UserPrivileges = filter_input(INPUT_POST, 'UserPrivileges', FILTER_SANITIZE_STRING);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= ' The email address you entered is not valid';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= ' Invalid password configuration.';
    }

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //


    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $dbconn->prepare($prep_stmt);

   // check existing email
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= ' A user with this email address already exists.';
                        $stmt->close();
        }
    } else {
        $error_msg .= ' Database error Line 39';
                $stmt->close();
    }



    // TODO:
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {

        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Insert the new user into the database
        if ($insert_stmt = $dbconn->prepare("INSERT INTO members (username, email, password,phone,type,company_id) VALUES (?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssss', $username, $email, $password, $phone, $UserPrivileges, $company_id);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                $error_msg= " Unknown Registration Error";
            }else{
            	AddNewRecentActivity("3",$_SESSION['user_id']);
            }
        }

    }
  }
  return $error_msg;
}



function GRAPH_PRODUCT_SALLED_PERCENTAG(){
global $dbconn;
$company_id=$_SESSION['company_id'];

$SqlStr="select
ProdName,
SizerName,
(SELECT sum(qty) FROM shipping WHERE shipping.priceId=v_bills_full_info.priceId AND DATE_FORMAT(ShippingDate,'%y-%m-%d')=CURRENT_DATE) as 'ShippingQTY',
sum(ProdQty) as 'SalledProdQty',
(100/((SELECT sum(qty) FROM shipping WHERE shipping.priceId=v_bills_full_info.priceId AND DATE_FORMAT(ShippingDate,'%y-%m-%d')=CURRENT_DATE)/sum(ProdQty))) 'SalledPercentag',
DATE_FORMAT(BillDate,'%y-%m-%d') as 'BillDate'
from v_bills_full_info
where DATE_FORMAT(BillDate,'%y-%m-%d')=CURRENT_DATE AND company_id='$company_id'
GROUP BY ProdName,SizerName
limit 7
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"ProdName" => $rows[$i]['ProdName']
							 ,"SizerName" => $rows[$i]['SizerName']
							 ,"ShippingQTY" => $rows[$i]['ShippingQTY']
							 ,"SalledProdQty" => $rows[$i]['SalledProdQty']
							 ,"SalledPercentag" => round($rows[$i]['SalledPercentag'],2)
							 ,"BillDate" => $rows[$i]['BillDate']
							));
	}
return $list;
}


function COMPLETED_ACTIONS_PROGRESS($par){
	global $dbconn;
	$company_id=$_SESSION['company_id'];

	if($par=="DONE")
	$sqlStr="SELECT SUM(ProdQty * ProdPrice) AS 'DONE' FROM v_bills_full_info
WHERE DATE_FORMAT(BillDate,'%y-%m-%d')=CURRENT_DATE AND company_id='$company_id'";
	else{
   $sqlStr="SELECT SUM(SP.qty * SP.ProductPackagePrice) as 'REMAINDED' 
FROM shipping S, and_shipped_prod SP 
WHERE 
S.ShippingId=SP.ShippingId 
AND DATE_FORMAT(S.ShippingDate,'%y-%m-%d')=CURRENT_DATE 
AND S.owner_id IN (SELECT id FROM members WHERE company_id='$company_id')";
	}
	if($res=$dbconn->query($sqlStr)){
				$rows= db_fetch_array_all($res);
				return $rows[0][0];
			}else{
				return 0;
			}
}
 
 // function to convert acual date and time to string 

function time_ago ($date) {
	   $timestamp = strtotime($date);	
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . "(s) ago ";
	   }
	}


// last activities
function LastActivity(){
global $dbconn;
$company_id=$_SESSION['company_id'];




 $SqlStr="SELECT * FROM 
recentactivity a,
members m ,
recentactivity_type t
WHERE 
m.id=a.USER_ID 
AND t.ACTIVITY_TYPE_ID=a.ACTIVITY_TYPE_ID
AND a.ACTIVITY_STATUS=0
AND DATEDIFF(CURDATE(),a.ACTIVITY_DATE_TIME)< 2  
ORDER BY a.ACTIVITY_DATE_TIME ASC
limit 100
";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		$up=rand(-5,5);
		array_push($list, array("mycount" => $i+1
							 
							 ,"ACTIVITY_DATE_TIME" => time_ago($rows[$i][('ACTIVITY_DATE_TIME')])
							 ,"ACTIVITY_CONTEND" => $rows[$i]['activity_name']
							 ,"username" => $rows[$i]['username']
							 
							 
							));
	}
return $list;



}

function DisplayMembers(){
global $dbconn;
$company_id=$_SESSION['company_id'];



$SqlStr="SELECT * FROM `members` where Login=1  ";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		$up=rand(-5,5);
		array_push($list, array("mycount" => $i+1
							 ,"id" => $rows[$i]['id']
							 ,"username" => $rows[$i]['username']
							
							));
	}
return $list;

}

function GET_CUSTOMERS($user_id){
global $dbconn;
$company_id=$_SESSION['company_id'];

if($user_id!="")
$where = " and user_id='$user_id'";
else
$where = "";


$SqlStr="SELECT * FROM `customers` where company_id='$company_id' and del=0 $where";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		$up=rand(-5,5);
		array_push($list, array("mycount" => $i+1
							 ,"cust_id" => $rows[$i]['cust_id']
							 ,"cust_name" => $rows[$i]['cust_name']
							 ,"cust_mobile" => $rows[$i]['cust_mobile']
							 ,"cust_shop_name" => $rows[$i]['cust_shop_name']
							 ,"entered_date" => $rows[$i]['entered_date']
							 ,"up" => $up
							));
	}
return $list;
}


function GET_CUSTOMERS_BY_CLS($cls_id){
global $dbconn;
$company_id=$_SESSION['company_id'];

if($cls_id!="")
$where = " and cls_id='$cls_id'";
else
$where = "";


$SqlStr="SELECT * FROM `customers` where company_id='$company_id' and del=0 $where";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"cust_id" => $rows[$i]['cust_id']
							 ,"cust_name" => $rows[$i]['cust_name']
							 ,"cust_mobile" => $rows[$i]['cust_mobile']
							 ,"cust_shop_name" => $rows[$i]['cust_shop_name']
							 ,"cls_auto" => $rows[$i]['cls_auto']
							 ,"entered_date" => $rows[$i]['entered_date']
							));
	}
return $list;
}


function GET_CLASSES(){
global $dbconn;
$company_id=$_SESSION['company_id'];

$SqlStr="SELECT * FROM cls_customer_classes where company_id='$company_id' and del=0";

$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);
$list= array();
	for($i=0;$i < $size;$i++){
		array_push($list, array("mycount" => $i+1
							 ,"cls_id" => $rows[$i]['cls_id']
							 ,"cls_name" => $rows[$i]['cls_name']
							 ,"cls_SalesStatus" => $rows[$i]['cls_SalesStatus']
							 ,"CustomerCount" => size_of(GET_CUSTOMERS_BY_CLS($rows[$i]['cls_id']))
							 ,"default_cls" => $rows[$i]['default_cls']
							));
	}
return $list;
}


?>
