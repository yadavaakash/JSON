<?php

require './connection.php';
$response = array();

if (isset($_POST['st_name']) && isset($_POST['st_gender']) && isset($_POST['st_email']) && isset($_FILES['file123']['name']) ) 
    {

    $st_name = mysqli_real_escape_string($connection,$_POST['st_name']);
    $st_gender = mysqli_real_escape_string($connection,$_POST['st_gender']);
    $st_email = mysqli_real_escape_string($connection,$_POST['st_email']);
    $filepath = "upload/".$_FILES['file123']['name'];
    
    $query = mysqli_query($connection,"insert into tbl_student(`st_name`, `st_gender`, `st_email`) values('{$st_name}','{$st_gender}','{$st_email}')") or die(mysqli_error($connection));

    
    if ($query) {
    
        $file = move_uploaded_file($_FILES['file123']['tmp_name'],$filepath);
        
        if($file)
        {
             $response['flag'] = '1';
               $response["message"] = "Record Inserted With File Upload";
        }
        else
        {
             $response['flag'] = '0';
            $response["message"] = "Error in File Upload";
        }
       
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