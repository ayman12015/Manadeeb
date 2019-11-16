<?php 
include_once('../../includes/header.php');
include_once('../../model/login/login.php');

$feedback="";
$error_msg='';
$success_msg='';
$REQUEST_URI = esc_url($_SERVER['REQUEST_URI']);


/*
$password = password_hash("123",PASSWORD_DEFAULT);
$password = password_hash($password, PASSWORD_BCRYPT);
echo $password ;
die;
*/

//3e39b3844837bdefc8017fbcb386ea302af877fb17baa09d0a1bd34b67bbf2b34fba314bbcab450f5f3f73771b7aea956ba3320defda029723f4fdff7dfa007b 



if(isset($_POST['submit']) && $_POST['submit']=='resetPass'){

$userInfo=GetResetPasswordInfo();

$phone=$userInfo[0]['phone'];
$username=$userInfo[0]['username'];  

header('Location: ../../controllers/login/RecoverPassword.php?phone='.$phone.'&username=' . $username);

}


 
if (isset($_POST['uId'], $_POST['password'])) {
	sec_session_start(); // Our custom secure way of starting a PHP session. 
	
    $email = $_POST['uId'];
    $password = $_POST['p']; // The hashed password.
 
$login_return= login($email, $password);

    if ($login_return==1) {
        // Login success 		
		if($_SESSION['lang_session']=="EN")
			$url='?chang_lang=1';
		else
			$url='?chang_lang=2';
			
        header('Location: ../../controllers/company/Home.php' . $url);
    } else {
        // Login failed 
		if($login_return==0)
		$feedback="<strong>Account is Blocked!</strong> Please Contact your System Administrator";
		elseif($login_return==2)
		$feedback="<strong>error (#0" . $login_return . ") !</strong> wrong username or password";	
		elseif($login_return==3)
		$feedback="<strong>error (#0" . $login_return . ") !</strong> User Doesn't exist";
		elseif($login_return==4)
		$feedback="<strong>error (#0" . $login_return . ") !</strong> User not Allwed";
		elseif($login_return==5)
		$feedback="<strong>error (#0" . $login_return . ") !</strong> User is Disabled";
		else
		$feedback="<strong>Unkown Error (#0" . $login_return . ") !</strong>Please Contact your System Administrator";		
    }
} 


if (isset($_POST['phone'])) {
	sec_session_start(); // Our custom secure way of starting a PHP session. 
	
    $email = $_POST['phone'];
  
 
$login_return= recovery($email);

    if ($login_return==1) {
        // Login success 		
		if($_SESSION['lang_session']=="EN")
			$url='?chang_lang=1';
		else
			$url='?chang_lang=2';
			
        header('Location: ../../controllers/company/Home.php' . $url);
    } else {
        
		$feedback="<strong>Account is Blocked!</strong> Please Contact your System Administrator";
	
}
}




// send email or phone for verification






$smarty->assign('feedback',$feedback);

//$Aciont = $_SERVER['DOCUMENT_ROOT']. "/manadeeb/controllers/login/login.php";

$smarty->assign('Aciont',"login.php");
$smarty->display('login/login.tpl');
?>