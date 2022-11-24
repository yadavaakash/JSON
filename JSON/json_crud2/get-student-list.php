<?php
//Require File Name 
require './connection.php';
//Create an Blank Array
$response = array(); //Blank Array
$response["student"] = array(); // Two Dim Array Key will be Student

$query = mysqli_query($connection, "SELECT * FROM `tbl_student`") or die(mysqli_error($connection));

$count = mysqli_num_rows($query);

// check for empty result
if ($count > 0) {
  

    while ($row = mysqli_fetch_array($query)) {
        $temparry  = array();

        $temparry["st_id"] = $row["st_id"];
         $temparry["st_name"] = $row["st_name"];
         $temparry["st_gender"] = $row["st_gender"];
         $temparry["st_email"] = $row["st_email"];
		 //Array Append
        array_push($response["student"], $temparry);
    }
    // success
    $response["flag"] = 1;
    $response["message"] = "$count Record Found";
    // echoing JSON response

} else {
    // success
    $response["flag"] = 0;
    $response["message"] = "No Record Found";
    // echoing JSON response
    
}
//echo "<pre>";
//print_r($response);
echo json_encode($response);
