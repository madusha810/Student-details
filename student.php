<?php
include_once('db.php');
include_once('studentcontroller.php');

$db = new database;
$connection = $db->dbconnection();
$student = new student;



if(isset($_POST['insertdata'])){

    $data = [
        'firstname' => mysqli_real_escape_string($connection,$_POST['firstname']),
        'lastname' => mysqli_real_escape_string($connection,$_POST['lastname']),
        'dob' => mysqli_real_escape_string($connection,$_POST['dob']),
    ];

    
    $student->adddata($data);


}

if(isset($_POST['editdata'])){


    $id = $_POST['studentid'];
    $data = [
        'firstname' => mysqli_real_escape_string($connection,$_POST['firstname']),
        'lastname' => mysqli_real_escape_string($connection,$_POST['lastname']),
        'dob' => mysqli_real_escape_string($connection,$_POST['dob']),
    ];

    
    $student->updatedata($data,$id);


}

if(isset($_POST['deletedata'])){

    $id = $_POST['deletedata'];

    
    $student->deletedata($id);
}

?>