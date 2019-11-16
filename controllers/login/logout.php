<?php
include_once('../../includes/header.php');
include_once('../../model/login/login.php');

sec_session_start();

$user_id=$_SESSION['user_id'];
SetLoginStatus($user_id,0);
 
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Destroy session 
session_destroy();
header('Location: ../../controllers/login/login.php?out');