<?php
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

function login_check() {
	global $dbconn;
    // Check if all session variables are set 
	sec_session_start();
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $dbconn->prepare("SELECT password 
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
                    $pageAllwed=array();
                    $allowAccess = false;

                    $pageAllwed =$_SESSION['pageAllwed'];
                    $size=sizeof($pageAllwed);
                    
                    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                    $actual_link ='http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];


                    for($i=0;$i < $size;$i++){
                        $loopUrl=$pageAllwed[$i]['pageUrl'];
                        if($loopUrl == $actual_link){
                            $allowAccess=true;
                            $pageAllwed[$i]['active_cls']="active";
                        }else{
                            $pageAllwed[$i]['active_cls']="";
                        }
                    }
                    if($allowAccess==false){
                        header("location: ../../controllers/404.php");
                        //die('Page is not Allwed, ' . $actual_link);
                    }
                    //print_r($pageAllwed);
                    $_SESSION['pageAllwed']= $pageAllwed;
                    return true;
                } else {
                    "// Not logged in ";
					
                    return false;
                }
            } else {
                 "// Not logged in 2";
				
                return false;
            }
        } else {
            "// Not logged in 3";
            return false;
        }
    } else {
        //echo "// Not logged in 4";
        return false;
    }
}

if(login_check() == false) {	
    header("location: ../../controllers/login/login.php");
}else{
	require "./../../includes/languages.php";
}

?>