<?php	
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');
include_once('../../model/company/sms.php');

function SendPendingSMS(){
	global $dbconn;
	$SqlStr="SELECT * FROM Messages where msgStatus = 0";
	$res= db_query($SqlStr);
	$rows= db_fetch_array_all($res);
	$size=db_num_rows($res);
	$list= array();
		for($i=0;$i < $size;$i++){
			$msgBody=$rows[$i]['msgBody'];
			$msgRecipient=$rows[$i]['msgRecipient'];
			$msgId=$rows[$i]['msgId'];
			SendSms($msgBody,$msgRecipient);
			$SqlStr = "UPDATE Messages SET msgStatus='1' WHERE msgId='$msgId'";
			$res= db_query($SqlStr);
		}
}

SendPendingSMS();

?>