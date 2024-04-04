<?php include('header.php') ?>
<?php include('dbcon.php') ?>

<div class="box1">

<h2>All Reviews</h2>
<button class="btn btn-primary"> Add review</button>

</div>

    <table class="table table-hover table-bordered table-striped">
        <thead>

        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>

            <?php

                $query = "select * from `employee` ";
                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }else{

                    while($row = mysqli_fetch_assoc($result)){
                        ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['description']; ?></td>
            </tr>

                        <?php
                    }
                }

            ?>
        </tbody>
    </table>

    <?php include('footer.php') ?>
