<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");

sec_session_start();

$mRequest = print_r($_REQUEST, true);
storeRequest("login.php","new login",$mRequest);


//		202cb962ac59075b964b07152d234b70
//		202cb962ac5975b964b7152d234b70	

//echo md5('Abc123**') . "</br>";
//die;
/*
	$hashed = hash('sha512', md5('Abc123**'));

  if (password_verify($hashed, '$2y$10$MeIDbCE6RJkXtFr.E0vanuS1TOC38uVwWdWp.zBNd60glFkUq1ePe'))
	  echo "true";
	  else
	  echo "False";
	  
	  die;
*/
	  
//$password = password_hash($password, PASSWORD_BCRYPT);




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

function login($email, $password) {
	global $dbconn;
	
	$List=array();
	
//print_r($_POST) ;die;

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $dbconn->prepare("SELECT id, username, password, company_id 
        FROM members
       WHERE (email = ? or phone= ?) and type=4
        LIMIT 1")) {
        $stmt->bind_param('ss', $email,$email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password,$company_id);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id, $dbconn) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                echo "0";
				die;
            } else {
                // Check if the password in the database matches
                // the password the user submitted. We are using
                // the password_verify function to avoid timing attacks.
				
 				$hashed = hash('sha512', $password); 
                if (password_verify($hashed, $db_password)) {
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
					$token=$_SESSION['login_string'];
					$_SESSION[$token]=$user_id;
										
					array_push($List, array(
					'UserName' => $username,
					'UserPhone' => $email,
					'UserCompanyId' => $company_id,
					'token' => $token
					));					
                    // Login successful.
                    return $List;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $dbconn->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
									
									
								if(sizeof($List)==0){
								array_push($List, array(
								'UserName' => "",
								'UserPhone' => "",
								'UserCompanyId' => 0,
								'token' => "0"
								));
								}

                    return $List;
                }
            }
        } else {            			
						if(sizeof($List)==0){
						array_push($List, array(
						'UserName' => "",
						'UserPhone' => "",
						'UserCompanyId' => 0,
						'token' => "1"
						));
						}
             return $List;
        }
		if(sizeof($List)==0){
						array_push($List, array(
						'UserName' => "",
						'UserPhone' => "",
						'UserCompanyId' => 0,
						'token' => "2"
						));
						}
             return $List;
    }
		if(sizeof($List)==0){
						array_push($List, array(
						'UserName' => "",
						'UserPhone' => "",
						'UserCompanyId' => 0,
						'token' => "3"
						));
						}
             return $List;	
}

 


 


$UserPhone="";
$UserPass="";

	if(isset($_REQUEST['UserPhone']))
		$UserPhone=GetVal('UserPhone');

	if(isset($_REQUEST['UserPass']))
		$UserPass=GetVal('UserPass');

$UserPass=md5($UserPass);	

$List= array();
$List=login($UserPhone,$UserPass);


echo(json_encode($List)); 

die;
?>