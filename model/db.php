<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function db_fetch_array_all($res) {

    $rec_arr = array();

    if ( $res )
    while ($rec = mysqli_fetch_array($res))
        $rec_arr[]=$rec;

    return $rec_arr;
}
function db_fetch_array_first($res) {
    $rec = array();

    if ( $res ) {
        $rec = mysqli_fetch_array($res) ;

    }
    return $rec;
}

function db_fetch_array_last($res) {
    $rec = array();

    if ( $res )
    while ($rec = mysqli_fetch_array($res))
        { }

    return $rec;
}
function  db_query($sql) {

    //$sql = mysqli_real_escape_string($sql);
    global $dbconn;
    //check_role_table_access($sql) ;
    //@TODO
    //if ( !check_role_table_access($sql) )
        //die('Sorry, table level access denied');
    return mysqli_query($dbconn,$sql);
   die; 
}

function  db_num_rows($res) {
    global $dbconn;
    if ( $res )
        return mysqli_num_rows($res);
    else
        return 0  ; 

}

function db_error() {
    global $dbconn;

    return mysqli_error($dbconn);
    
}

function db_insert_id() {
    global $dbconn;
    return mysqli_insert_id($dbconn);

}

function size_of($arry) {
    global $dbconn;
    return sizeof($arry);

}

function post($var){
	return filter_input(INPUT_POST, $var, FILTER_SANITIZE_STRING);
}
function request($var){
	return $_REQUEST[$var];
}
 
function ConvertMoney($number){	
return number_format($number,2,',','.');
}


?>
