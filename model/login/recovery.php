<?php
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');



function recover($email) {
    global $dbconn;

//print_r($_POST) ;die;

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $dbconn->prepare("SELECT id, username, company_id, type, status, lang
        FROM members
       WHERE (email = ? or phone= ?)
        LIMIT 1")) {
        $stmt->bind_param('ss', $username,$username);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username,$company_id,$type,$status,$lang);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
                            
                    return "1";
                } else {
            
            return "0";
        }
    }
}
 //
















?>