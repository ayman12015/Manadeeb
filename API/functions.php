<?php
include_once('./../model/db.php');


 

function GetPreviuseShippedProduct($ShippingId,$CustSelectedId){
	global $dbconn;
	
}
 	
Function GetVal($par){
	$inp		=$_REQUEST[$par];	
	
	if(is_array($inp))
        $inp= array_map(__METHOD__, $inp);

    if(!empty($inp) && is_string($inp)) {
        $inp= str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp; 
}


function storeRequest($page,$request_notes,$mRequest){
	global $dbconn;
	
	$SqlStr="insert into request_test (page,request_notes,mRequest) VALUES (?,?,?)";
	
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('sss',$page,$request_notes,$mRequest);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
	}	
}

function GetLocation($clm,$id){
	global $dbconn;
	
	$SqlStr="SELECT " . $clm . " FROM shops_locations where location_id=". $id;
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	return $rows[0][0];	
}

function AddNewLocation($lan,$Lon){
	global $dbconn;
	
	$SqlStr="insert into shops_locations (LX,LY) VALUES (?,?)";
	
    if ($stmt = $dbconn->prepare($SqlStr)) {
        $stmt->bind_param('ss',$lan,$Lon);  // Bind "$email" to parameter.
        $res=$stmt->execute();    // Execute the prepared query.
		return $Lid= $dbconn->insert_id;
	}	
}


function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name 
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ./login.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
}


function GetUserId($UserPhone){
	global $dbconn;
	
	$SqlStr="SELECT id FROM members where  phone='$UserPhone'";
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	return $rows[0][0];	
}




?>