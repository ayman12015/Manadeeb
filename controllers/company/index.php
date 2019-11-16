<?php
include_once('../../includes/header.php');
include_once('../../model/company/company.php');


$weather_logo='';
$weather_country='';
$weather_temperature='';
$weather_visibility='';
$weather_desc='';
$weather_sunset='';
$weather_sunrise='';
$weather_windspeed='';
$weather_humidity='';
$weather_clouds='';
 
/*
try{
$URL = 'http://api.openweathermap.org/data/2.5/weather?q=Khartoum%20State,Sudan&units=metric&apikey=a3180f44b08b14b3c9d4c171a5509b00';
$data = json_decode(file_get_contents($URL),true);
 
$temp = $data['main']['temp'];
$weather_temperature =  "<b>".$temp."°C</b><br>";
 
$weather_icon = $data['weather'][0]['icon'];
$weather_logo = "<center><img src='http://openweathermap.org/img/w/".$weather_icon.".png' ></center>";

$visibility = $data['visibility'];
$visibilitykm = $visibility / 1000;
$weather_visibility =  " Visibility: ".$visibilitykm."Km <br>";
$weather_country =  "<b>".$data['name'].",".$data['sys']['country']."</b>";
$weather_desc = $data['weather'][0]['description'];
$weather_clouds = 		"	Clouds:		".$data['clouds']['all']."%<br>";
$weather_humidity = 	"	Humidity:		".$data['main']['humidity']."%<br>";
$weather_windspeed = 	"	Wind Speed:	".$data['wind']['speed']."m/s<br>";
$weather_sunrise = 		"	Sunrise:		".date('h:i A', $data['sys']['sunrise']);
$weather_sunset = 		"	Sunset:		".date('h:i A', $data['sys']['sunset']);
}catch (Exception $e) {
    echo $e->getCode();
}
*/


$COMPLETED_ACTIONS_PROGRESS_DONE_VAL=0;
$COMPLETED_ACTIONS_PROGRESS_REMAINDED_VAL=0;
$COMPLETED_ACTIONS_PROGRESS_DONE=COMPLETED_ACTIONS_PROGRESS("DONE");
$COMPLETED_ACTIONS_PROGRESS_REMAINDED=COMPLETED_ACTIONS_PROGRESS("REMAINDED");
if($COMPLETED_ACTIONS_PROGRESS_REMAINDED > 0 and $COMPLETED_ACTIONS_PROGRESS_DONE>0){
$COMPLETED_ACTIONS_PROGRESS_DONE_VAL= ($COMPLETED_ACTIONS_PROGRESS_DONE/($COMPLETED_ACTIONS_PROGRESS_DONE+$COMPLETED_ACTIONS_PROGRESS_REMAINDED) * 100);
$COMPLETED_ACTIONS_PROGRESS_REMAINDED_VAL=($COMPLETED_ACTIONS_PROGRESS_REMAINDED/($COMPLETED_ACTIONS_PROGRESS_DONE+$COMPLETED_ACTIONS_PROGRESS_REMAINDED) * 100);
}
   

$smarty->assign('UserShippingNotify',GetUserShippingNotify());
$smarty->assign('weather_clouds',$weather_clouds);
$smarty->assign('weather_humidity',$weather_humidity);
$smarty->assign('weather_windspeed',$weather_windspeed);
$smarty->assign('weather_sunrise',$weather_sunrise);
$smarty->assign('weather_sunset',$weather_sunset);
$smarty->assign('weather_desc',$weather_desc);
$smarty->assign('weather_visibility',$weather_visibility);
$smarty->assign('weather_temperature',$weather_temperature);
$smarty->assign('weather_country',$weather_country);
$smarty->assign('weather_logo',$weather_logo);
$smarty->assign('COMPLETED_ACTIONS_PROGRESS_DONE',round($COMPLETED_ACTIONS_PROGRESS_DONE_VAL));
$smarty->assign('COMPLETED_ACTIONS_PROGRESS_REMAINDED',round($COMPLETED_ACTIONS_PROGRESS_REMAINDED_VAL));
$smarty->assign('GRAPH_PRODUCT_SALLED_PERCENTAG',GRAPH_PRODUCT_SALLED_PERCENTAG());
$smarty->assign('active_index',"active");
$smarty->assign('CUR_DATE',date('Y-m-d'));
$smarty->assign('members',DisplayMembers());
$smarty->assign('recentactivity',LastActivity());
$smarty->display('company/index.tpl');
?>