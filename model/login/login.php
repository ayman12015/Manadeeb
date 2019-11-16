<?php
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');

function GetPageAllwed($type,$lang){
    global $dbconn;
    $company_id=$_SESSION['company_id'];

    $SqlStr="SELECT * FROM pages_table pt, pages_priveleges pp 
    where 
                pp.page_id=pt.page_id
            AND pp.Group_id='$type'
            AND pp.status=1";

    $res= db_query($SqlStr);
    $rows= db_fetch_array_all($res);
    $size=db_num_rows($res);
    $list= array();
        for($i=0;$i < $size;$i++){

            if($lang=="EN")
                $page_name=$rows[$i]['page_name'];
            else
                $page_name=$rows[$i]['page_name_ar'];

            array_push($list, array("mycount" => $i+1
                                 ,"page_id" => $rows[$i]['page_id']
                                 ,"page_name" => $page_name
                                 ,"page_name_EN" => $rows[$i]['page_name']
                                 ,"page_name_AR" => $rows[$i]['page_name_ar']
                                 ,"page" => $rows[$i]['page']
                                 ,"pageUrl" => $rows[$i]['pageUrl']
                                 ,"tab" => $rows[$i]['tab']
                                 ,"active_cls" => "1"
                                ));                                     
        }

    return $list;
    }

    // recover pass


 
function SendOTP($phone){
	
	return "00000";
	}
function GetResetPasswordInfo(){
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$SqlStr="select * from members where email='$email' or phone= '$email' limit 1";
	
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
	$phone='';
		for($i=0;$i < $size;$i++){
			$phone=$rows[$i]['phone'];
			array_push($list, array("mycount" => $i+1
								 ,"user_id" => $rows[$i]['id']
								 ,"username" => $rows[$i]['username']
								 ,"email" => $rows[$i]['email']
								 ,"phone" => $phone
								 ,"company_id" => $rows[$i]['company_id']
								));										
		}
		SendOTP($phone);
		
		
	return $list;
			
	}
	

 function ResetPassword(){
 global $dbconn;
   

     if(post('user_id')!= null) $user_id=post('user_id');
	 if(post('otb')!= null) $otb=post('otb');
	 if(post('pass')!= null) $pass=post('pass');
	 if(post('confirm_pass')!= null) $confirm_pass=post('confirm_pass');

     if(post('p')!= null) $pass=post('p');
     $pass = password_hash($pass, PASSWORD_BCRYPT);

     $SqlStr="UPDATE members set otb=00000, password='$pass' where id='$user_id'";
     $res= db_query($SqlStr);

//     // 1 = success
//     //2= faild error

 }

    

function SetLoginStatus($user_id,$loginVal){
	global $dbconn;		    	
	$dbconn->query("UPDATE members SET Login='$loginVal' where id='$user_id'");                    																						
	return 1;
	}
	
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name 
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
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


function login($email, $password) {
	global $dbconn;

//print_r($_POST) ;die;

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $dbconn->prepare("SELECT id, username, password, company_id, type, status, lang
        FROM members
       WHERE (email = ? or phone= ?)
        LIMIT 1")) {
        $stmt->bind_param('ss', $email,$email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password,$company_id,$type,$status,$lang);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 		if($type == 4 ){
			// Phone User type Not Allwed
			return "4";
		
		}
		if($status == 5 ){
			// User Status is Disabled (Not Allwed)
			return "5";
		
		}
            if (checkbrute($user_id, $dbconn) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return "0";
            } else {
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.

 
 
                if (password_verify($password, $db_password)){
 
					
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);
					$_SESSION['company_id'] = $company_id;
					$_SESSION['lang_session'] = $lang;
					$_SESSION['pageAllwed'] = GetPageAllwed($type,$lang);
                    // Login successful.
					$rtn = SetLoginStatus($user_id,1);					
                    return "1";
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $dbconn->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return "2";
                }
            }
        } else {
            // No user exists.
            return "3";
        }
    }
}


function recovery($email) {
    global $dbconn;

//print_r($_POST) ;die;

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $dbconn->prepare("SELECT id, username, password, company_id, type, status, lang
        FROM members
       WHERE (email = ? or phone= ?)
        LIMIT 1")) {
        $stmt->bind_param('ss', $email,$email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password,$company_id,$type,$status,$lang);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
        
        
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.

 
 
                                  
                    return "1";
                } else {
             
            // No user exists.
            return "3";
        }
    }
}
 //


function checkbrute($user_id) {
	global $dbconn;
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $dbconn->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
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


function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if (hash_equals($login_check, $login_string) ){
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}







?>