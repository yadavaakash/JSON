<?php

require './connection.php';

$response = array();



if (isset($_POST['st_id']) && isset($_POST['st_name']) && isset($_POST['st_gender']) && isset($_POST['st_email'])) {
    $st_id = mysqli_real_escape_string($connection, $_POST['st_id']);
    $st_name = mysqli_real_escape_string($connection, $_POST['st_name']);
    $st_gender = mysqli_real_escape_string($connection, $_POST['st_gender']);
    $st_email = mysqli_real_escape_string($connection, $_POST['st_email']);


//Check ID Record is Present or not 
    $selectquery = mysqli_query($connection, "select * from tbl_student where st_id= {$st_id}") or die(mysqli_error($connection));
    $count = mysqli_num_rows($selectquery);

	//If Record Present then Fire Update Query
    if ($count > 0) {

        $updatequery = mysqli_query($connection,"update tbl_student set `st_name`='{$st_name}',`st_gender`='{$st_gender}',`st_email`='{$st_email}' where st_id='{$st_id}'") or die(mysqli_error($connection));
        if ($updatequery) {
            $response['flag'] = '1';
            $response["message"] = "Record Updated ";
        } else {
            $response['flag'] = '0';
            $response["message"] = "Error in Query ";
        }
    } else {
        $response['flag'] = '0';
        $response["message"] = "Record Not Found ";
    }
 
}
else {
    $response['flag'] = '0';
    $response["message"] = "Required Field Is Missing ";
}

echo json_encode($response);