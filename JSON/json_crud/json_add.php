<?php

    require './connection/connection.php';

    //Blank Array
    $myarray =  array();
    //Check Parameter
    if(isset($_POST['st_name']) && isset($_POST['st_gender']) && isset($_POST['st_email']) && isset($_POST['st_password']) ){
        // Store Value in Variable
        $name = $_POST['st_name'];
        $gender = $_POST['st_gender'];
        $email = $_POST['st_email'];
        $password = $_POST['st_password'];

        $query = mysqli_query($connection, "insert into tbl_student(st_name, st_gender, st_email, st_password)
         values('{$name}','{$gender}','{$email}','{$password}') ");

         if($query){
            $myarray['flag'] = 1;
            echo "<br/>";
            $myarray['message'] = " Record Added";
         }else{
            $myarray['flag'] = 0;
            echo "<br/>";
            $myarray['message'] = " Error in Query";
         }
    }else{
        $myarray['flag'] = 0;
        echo "<br/>";
        $myarray['message'] = " Parameter is Missing";
    }

    echo json_encode($myarray);

?>