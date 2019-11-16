<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');

function storeRequest($page,$request_notes,$mRequest){
	global $dbconn;
	
	$SqlStr="insert into request_test (page,request_notes,mRequest) VALUES (?,?,?)";
	
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('sss',$page,$request_notes,$mRequest);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
	}	
}

if(isset($_GET['op']) && ($_GET['op']=='GetPrice')){
echo GetProductPrice();
die;
}

if(isset($_GET['op']) && ($_GET['op']=='MoveCust')){
$return=MoveCustomers();

echo $return;
die;
}


if(isset($_GET['op']) && ($_GET['op']=='Featured')){
$return=UpdateFeaturedProducts();
echo $return;
die;
}

if(isset($_GET['op']) && ($_GET['op']=='cls_upate')){
	//?op=cls_upate&new_val="+new_val+"&config_name="+config_name
$return=UPDATE_CLS_SATUS();
echo $return;
die;
}

if(isset($_GET['op']) && ($_GET['op']=='cls_upate')){
$return=UPDATE_CLS_SATUS();
echo $return;
die;
}

if(isset($_GET['op']) && ($_GET['op']=='cls_upate_val')){
$return=UPDATE_CLS_VALUE();
echo $return;
die;
}

if(isset($_GET['op']) && ($_GET['op']=='cls_upate_val_list')){
$return=UPDATE_CLS_VALUE_LIST();
echo $return;
die;
}

if(isset($_GET['op']) && ($_GET['op']=='showMap')){
$return=GetCUSTOMERS_LOCATION();
echo print_r($return);
die;
}

if(isset($_GET['op']) && ($_GET['op']=='AvalableQTYVal')){
$return=GetAvalableQTY();
echo $return;
die;
}

if(isset($_GET['op']) && ($_GET['op']=='page_previleges')){
$return=UpdateGroupPrevileges();
echo $return;
die;
}






?>