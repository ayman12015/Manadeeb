<?php	
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');

function QueryThis($SqlStr){
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
return $rows;
}
function InsertPageGroup($page_id,$Group_id,$tab){
	global $dbconn;
	$status = 0;
	if($tab=='0')
		$status='1';

	$SqlStr="INSERT INTO pages_priveleges (Group_id,page_id,status) VALUES ('$Group_id','$page_id','$status')";
		$res= db_query($SqlStr);		
				
}	

function CheckGroupExist($page_id,$Group_id){
	global $dbconn;
	$SqlStr="SELECT * FROM  pages_priveleges WHERE page_id='$page_id' AND Group_id='$Group_id' ";
		$res= db_query($SqlStr);		
		$size=db_num_rows($res);
		if($size > 0){
			LogInScreen("<strong>Check status,</strong> Group and Page, <strong>exist</strong>");	
		return true;
		
		}else{
			LogInScreen("<strong>Check status,</strong> Group and Page, <strong>Not exist</strong>");	
		return false;
		}
}	
	
function LogInScreen ($string){
	echo $string . "..." . "</br>";
}

$list= array(); 

$SqlStr="SELECT * FROM  pages_table";
$res= db_query($SqlStr);
$rows= db_fetch_array_all($res);
$size=db_num_rows($res);



$SqlStr_group="SELECT * FROM  pages_group";
$res_group= db_query($SqlStr_group);
$rows_group= db_fetch_array_all($res_group);
$size_group=db_num_rows($res_group);

	for($i=0;$i < $size;$i++){
		$page_id=$rows[$i]['page_id'];
		$tab=$rows[$i]['tab'];
		$page_name=$rows[$i]['page_name'];
		
		LogInScreen("<strong>Configring Page </strong> (" . $page_name . ")");		
		
		for($ig=0;$ig < $size_group;$ig++){
		$Group_id=$rows_group[$ig]['Group_id'];
		$Group_name=$rows_group[$ig]['Group_name'];		
		LogInScreen("<strong>Check exist,</strong> Group:(" . $Group_name . "), Page:(" . $page_name . ")");	
			if(CheckGroupExist($page_id,$Group_id)== false){
				LogInScreen("<strong>INSERT ,</strong> Group:(" . $Group_name . "), Page:(" . $page_name . ")");	
				InsertPageGroup($page_id,$Group_id,$tab);
				LogInScreen("<strong>INSERTED ,</strong> Group:(" . $Group_name . "), Page:(" . $page_name . ")");
			}
		
}
		
		
		
			
		 	
	}





















?>