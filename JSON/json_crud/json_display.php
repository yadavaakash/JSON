<?php

    require './connection/connection.php';

    // Query
    $selectq = mysqli_query($connection, "select * from tbl_student");
    $count = mysqli_num_rows($selectq);
    // Creat Blank Array
    $myarray = array();
    $response = array();

    if($count > 0){

   // Fetch Data
   while($data = mysqli_fetch_array($selectq)){
        $temparr = array();
        $temparr['st_id'] = $data['st_id'];
        $temparr['st_name'] = $data['st_name'];
        $temparr['st_gender'] = $data['st_gender'];
        $temparr['st_email'] = $data['st_email']; 
        $temparr['st_password'] = $data['st_password']; 
        $myarray[] = $temparr;
   } 
   $response['flag'] = 1;
   $response['message'] = "$count Record Found";
   $response['data'] = $myarray;

}else{

    //Print Response in JSON
    $response['flag'] = 0;
    $response['message'] = "No Record Found";

}

   //Print Resonse in JSON
   echo json_encode($response);

?>