<?php

require './connection.php';
$response = array();

if (isset($_GET['st_id']) ) {

    $st_id = mysqli_real_escape_string($connection,$_GET['st_id']);
   
    $query = mysqli_query($connection," delete from tbl_student where st_id='{$st_id}'") or die(mysqli_error($connection));

    if ($query) {
        $response['flag'] = '1';
        $response["message"] = "Record Deleted ";
    } else {
        $response['flag'] = '0';
        $response["message"] = "Error in Query";
    }
    
} else {
    $response['flag'] = '0';
    $response["message"] = "Required Field Is Missing ";
}

echo json_encode($response);
?>