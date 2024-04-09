<?php
include ('dbcon.php');

if(isset($_POST['add_review'])){
    $f_name = mysqli_real_escape_string($connection,$_POST['f_name']);
    $l_name = mysqli_real_escape_string($connection,$_POST['l_name']);
    $age = mysqli_real_escape_string($connection,$_POST['age']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $rating = mysqli_real_escape_string($connection,$_POST['rating']);
    $descripiton = mysqli_real_escape_string($connection,$_POST['description']);

    // Validations
    if($f_name=== "" || empty($f_name)){
        header('location:index.php?message=You need to fill in the first name');
    }
    // elseif($l_name=== "" || empty($l_name)){
    //     header('location:index.php?message=You need to fill in the last name');
    // }
    elseif($age=== "" || empty($age)){
        header('location:index.php?message=You need to fill in the age');
    }
    // elseif($email=== "" || empty($email)){
    //     header('location:index.php?message=You need to fill in the email');
    // }
    elseif($rating=== "" || empty($rating)){
        header('location:index.php?message=You need to fill in the rating');
    }
    // elseif($description=== "" || empty($descripiton)){
    //     header('location:index.php?message=You need to fill in the description');
    // }
    
    else{
        $query = "INSERT INTO `reviews` (`first_name`, `last_name`, `age`, `email`, `rating`, `description`) VALUES ('$f_name','$l_name','$age','$email','$rating','$descripiton')";
       // $query = "insert into `employee` (`first_name`, `last_name`, `age`, `email`, `rating`, `description`) values('$f_name', '$l_name', '$age', '$email', '$rating', '$description')";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query failed".mysqli_error($connection));
        }else{
            header('location:index.php?insert_msg=Your Review was added!');
        }
    }
}
?>