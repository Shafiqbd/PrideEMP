<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>CRUID Operation</title>
  </head>
  <body>
    <?php
        require('dbcon.php');

        $firstName = "";
        $lastName = "";
        $address = "";
        $empId = "";
        $number = "";
        $email = "";
        $update =false;
        $id = 0;

    //insert
        if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $empId = $_POST['empId'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        
        $query = "INSERT INTO employee (firstName, lastName, address, empId, number, email) VALUES ('$firstName',   '$lastName',  '$address',   $empId,   $number,   '$email')";

        if(!mysqli_query($db_con, $query)){
            echo "<br/>"."not insert data"."<br/>";
        }
        else
        {
            echo "<br/>"."insert data"."<br/>";
        }

    }
    //select by id
    if(isset($_GET['update'])){
        $id =  $_GET['update'];
        $update =true;
        
        $select_query = "select * from employee where id=$id";
        $result =mysqli_query($db_con, $select_query);
           
        $row = mysqli_fetch_assoc($result);
            
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $address = $row['address'];
            $empId = $row['empId'];
            $number = $row['number'];
            $email = $row['email'];

    
        
    }
    //update
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $empId = $_POST['empId'];
        $number = $_POST['number'];
        $email = $_POST['email'];

        $update_query = "update employee set firstName='$firstName', lastName='$lastName', address='$address', empId='$empId', number='$number', email='$email' where id=$id";
        $update_result =mysqli_query($db_con, $update_query);

        echo "Update Success";

    
    }
    mysqli_close($db_con);
 
    ?>


    <h1 class="text-center mt-5">Pridesys Employee Management</h1>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="offset-3 col-md-6 offset-3">
                <form action="index.php" method="POST">
                    <input type="hidden" name="id" value ="<?php echo $id ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name: </label>
                        <input type="text" class="form-control" value="<?php echo $firstName; ?>" id="firstName" name="firstName" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name: </label>
                        <input type="text" class="form-control" id="lastName" value="<?php echo $lastName; ?>" name="lastName" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address: </label>
                        <input type="text" class="form-control" id="address" value="<?php echo $address; ?>" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Employee Id: </label>
                        <input type="text" class="form-control" id="empId" value="<?php echo $empId; ?>" name="empId" placeholder="Id">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mobile Number: </label>
                        <input type="text" class="form-control" id="number" value="<?php echo $number; ?>" name="number" placeholder="Number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email: </label>
                        <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email" placeholder="Email">
                    </div>

                    <?php if($update == 1):?>
                        <button type="submit" class="btn btn-info" name="update">Update</button>
                    <?php else: ?>
                    <button type="submit" class="btn btn-info" name="submit">Save</button>
                    <?php endif ?>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">
            <a href="report.php">
                <button type="submit" class="btn btn-primary show_report_btn" name="">Show Report</button></a>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.css"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>