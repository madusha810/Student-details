<?php
include_once('studentcontroller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student List</title>
</head>
<body>

<div class="container mt-3">

<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:white;">Students Details</a>
    
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
       
        <a class="btn btn-primary" href="add_details.php">Add Student</a>
    </div>
    
  </div>
</nav>

<table class="table table-hover">
    <thead>
    <th>code</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Dob</th>
    <th>Edit</th>
    <th>Delete</th>
    </thead>

    <tbody>

    <?php

    $student = new student;
    $result = $student->getdata();

    if($result){

        foreach($result as $rows){
    ?>
        <tr>
            <td><?= $rows['code']?></td>    
            <td><?= $rows['first_name']?></td>    
            <td><?= $rows['last_name']?></td>    
            <td><?= $rows['dob']?></td>  
            <td><a href="student_edit.php?id=<?= $rows['code']?>" class="btn btn-success">Edit</a></td>  
        <form action="student.php" method="post">
            <td><button class="btn btn-danger" name="deletedata" value="<?= $rows['code']?>">Delete</button></td>    
        </form>
        <tr>

     <?php
        }
    }
    else{
    echo "data not found";
    }

    ?>
    
    <tbody>
</table>

</div>

</body>
</html>