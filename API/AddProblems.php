<?php
//header( 'Content-Type: application/json; charset=utf-8' );
include("../includes/adoconn.php");
include("../API/functions.php");
 
$SelectedProblem="";
$phone_st="";
$other_problems_st="";
$details_problems_st='';
$List = array();

	if(isset($_REQUEST['SelectedProblem']))
		$SelectedProblem=$_REQUEST['SelectedProblem'];

	if(isset($_REQUEST['phone_st']))
		$phone_st=$_REQUEST['phone_st'];
	
	if(isset($_REQUEST['other_st']))
		$other_problems_st=$_REQUEST['other_st'];

		if($other_problems_st == "")
			{
				$other_problems_st = "Empty";
			}

		if(isset($_REQUEST['details_st']))
		$details_problems_st=$_REQUEST['details_st'];

		if($details_problems_st == "")
		{
			$details_problems_st = "Empty";
		}

		if(isset($_REQUEST['user_id']))
		$user_id=$_REQUEST['user_id'];

		if(isset($_REQUEST['member_phone']))
		$member_phone=$_REQUEST['member_phone'];
		
		//BIGIF////
		if($phone_st == $member_phone)
				{
		
		$get_user_number_sql = "SELECT * FROM `members`  where phone = '{$phone_st}'";

		$get_user_number_query = mysqli_query($dbconn,$get_user_number_sql) ; 

if(mysqli_num_rows($get_user_number_query))
		{
			
$Problems_sql = "INSERT INTO `members_problems`(member_id,problem_type,problem_details,problem_others) VALUES ($user_id,'{$SelectedProblem}','{$details_problems_st}','{$other_problems_st}')";



if( mysqli_query($dbconn,$Problems_sql) )
	{
echo "Done"; 	
    }
    else
    {
echo "Erorr"; 

	}	
		}
		
		else
		{
echo "User_Not_Exist";
		}
	

		}
		else
		{
			echo "Phone_Not_Exist";
		}

	?>