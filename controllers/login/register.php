<?php
include_once('../includes/header.php');
include_once('../model/register.php');



$smarty->assign('Aciont',"login.php");
$smarty->display('register.tpl');
?>