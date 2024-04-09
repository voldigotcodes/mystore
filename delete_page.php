<?php

include('dbcon.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE from `employee` WHERE id=$id";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query failed".mysqli_error($connection));
    }else{
        header('location:index.php?delete_msg=You have succesfully deleted the review.');
    }
}

?>