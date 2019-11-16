<?php
 error_reporting(E_ALL); ini_set('display_errors', 1);
 
$server_root = $_SERVER['DOCUMENT_ROOT'];

require("$server_root/manadeeb/smart/Smarty.class.php");
$smarty = new Smarty;
$mypath = "$server_root/manadeeb";
$smarty->template_dir = "$mypath/mView";
$smarty->config_dir = "$mypath/mConfig";
$smarty->cache_dir = "$mypath/mCache";
$smarty->compile_dir ="$mypath/mView_c";
$smarty->assign('year', date('Y') ); 
?>
