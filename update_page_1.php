<?php include('header.php') ?>
<?php include('dbcon.php') ?>


<?php

                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                $query = "select * from `reviews` where id=$id";
                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }else{
                    $row = mysqli_fetch_row($result);
                }
            }
?>

<?php

if(isset($_POST['modify_review'])){
    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $f_name = mysqli_real_escape_string($connection,$_POST['f_name']);
    $l_name = mysqli_real_escape_string($connection,$_POST['l_name']);
    $age = mysqli_real_escape_string($connection,$_POST['age']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $rating = mysqli_real_escape_string($connection,$_POST['rating']);
    $description = mysqli_real_escape_string($connection,$_POST['description']);

    // Validations
    if($f_name=== "" || empty($f_name)){
        header('location:update_page_1.php?message=You need to fill in the first name');
    }else{
        $query = "UPDATE `reviews` SET `first_name` = '$f_name', `last_name` = '$l_name', `age` = '$age', `email` = '$email', `rating` = '$rating', `description` = '$description'
        where id = $idnew";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query failed".mysqli_error($connection));
        }else{
            header('location:index.php?update_msg=Your Review was Modified!');
        }
    }
}

?>

<form action="update_page_1.php?id_new=<?php echo $id;?>" method="POST">
<div class="form-group">
<?php echo '<input type="hidden" name="id" value="' . $id . '">'; ?>
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row[1]?>">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $row[2]?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" value="<?php echo $row[3]?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $row[4]?>">
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" name="rating" class="form-control" value="<?php echo $row[5]?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" value="<?php echo $row[6]?>">
            </div>
            <div class="update-footer">
        <a href="index.php"> <button type="button" class="btn btn-secondary">GO BACK</button></a>
        <input type="submit" class="btn btn-success" name="modify_review" value="MODIFY">
      </div>
</form>


<?php include('footer.php') ?>
