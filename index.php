<?php include('header.php') ?>
<?php include('dbcon.php') ?>

<div class="box1">

<h2>All Reviews</h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add a Review
</button>

</div>
<!-- table-striped -->
    <table class="table table-hover table-bordered ">
        <thead>

        <tr>
            <!-- <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Rating</th>
            <th>Description</th>
            <th>Update</th>
            <th>Delete</th> -->
        </tr>
        </thead>
        <tbody>

            <?php

                $query = "select * from `reviews` ";
                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }else{
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        
                        ?>

            <tr>
                <td class="upper-td"><?php echo $row['id']; ?></td>
                <td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>, <?php echo $row['age']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['rating']; ?>/5 </td>
                <td><?php echo $row['description']; ?></td>
                <td class="lower-td"><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                <a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>

                        <?php
                        $i++;
                        if($i >= 4){
                            $i=0;
                            ?>
                            </tbody>
                            <tbody>
                            <?php
                        }
                    }
                }

            ?>
        </tbody>
    </table>

    <?php

        if(isset($_GET['message'])){
            echo '<h6 style="text-align:center; color:red">'.$_GET['message']."</h6>";
        }

        if(isset($_GET['insert_msg'])){
            echo '<h6 style="text-align:center; color:green">'.$_GET['insert_msg']."</h6>";
        }

        if(isset($_GET['update_msg'])){
            echo '<h6 style="text-align:center; color:red">'.$_GET['update_msg']."</h6>";
        }

        if(isset($_GET['delete_msg'])){
            echo '<h6 style="text-align:center; color:red">'.$_GET['delete_msg']."</h6>";
        }

    ?>

    <!-- Modal -->
<form action="insert_data.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Review</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
            <div class="form-group">
                <label for="f_name">First Name</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="l_name">Last Name</label>
                <input type="text" name="l_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" name="rating" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_review" value="ADD">
      </div>
    </div>
  </div>
</div>
 </form>  
   
    <?php include('footer.php') ?>
