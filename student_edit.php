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
  <title>Edit Student</title>
</head>
<body>
  
  <div class="container col-md-6" style="border-style: groove;margin-top:5%;">

    <div class="row" style="text-align:center;background-color:#6699ff;">

      <h3>Edit details</h3>

    </div>

    <div class="row mt-3">

    <?php
        if(isset($_GET['id'])){

        $student_id = $_GET['id'];

        $student = new student;
        $result = $student->edit($student_id);

        if($result){

       
    ?>

      <form action="student.php" method="post">

      <input type="hidden" name="studentid" value="<?= $result['code']?>">

        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" class="form-control" placeholder="First name" name="firstname" value="<?= $result['first_name']?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" class="form-control" placeholder="Last name" name="lastname" value="<?= $result['last_name']?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">DOB</label>
          <input type="date" class="form-control" name="dob" value="<?= $result['dob']?>" required>
        </div>

     
         <button type="submit" class="btn btn-primary mb-3 d-grid gap-2 col-6 mx-auto" name="editdata">Update</button>

      </form>

    <?php
      }
     else{
        echo "data not found";
      }
     }

?>

    </div>

  </div>

</body>
</html>