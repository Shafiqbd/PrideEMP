<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Report</title>
</head>
<body>

    <?php 
        require('dbcon.php');
        //select all
            
            $sql = "select * from employee order by id ASC";
            $result = mysqli_query($db_con, $sql);

   
    //delete
        if(isset($_GET['delete'])){
            $id =  $_GET['delete'];
            $delete_query = "delete from employee where id=$id";
            $del_result =mysqli_query($db_con, $delete_query);
        
        }
       

        mysqli_close($db_con);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address </th>
                            <th scope="col">Employee Id </th>
                            <th scope="col">Mobile Number </th>
                            <th scope="col">Email </th>
                            <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php
                                while($value = mysqli_fetch_array($result)){?>
                                 <tr>
                                    <th><?php echo $value['id']; ?></th>
                                    <td><?php echo $value['firstName']; ?></td>
                                    <td><?php echo $value['lastName']; ?></td>
                                    <td class ="max-td-width"><?php echo $value['address']; ?></td>
                                    <td><?php echo $value['empId']; ?></td>
                                    <td><?php echo $value['number']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td>
                                        <a href="index.php?update=<?php echo $value['id'];?>" class="btn btn-info"> Edit</a>
                                        <a href="report.php?delete=<?php echo $value['id'];?>" class="btn btn-danger" > Delete</a>
                                    </td>
                                    </tr>  
                                <?php }?>           
                    </tbody>                          
                </table>
            </div>                 
        </div>
        <div class="row">
            <div class="col">
                <a href="index.php"><h2 class = "text-right">Insert Data</h2></a>
            </div> 
        </div>
    </div>
</body>
</html>