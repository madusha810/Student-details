<?php

include_once('db.php');

class student{
    
    //add data to database
    public function adddata($data){

        $db = new database;
        $connection = $db->dbconnection(); 

        $studentdata = "'" .implode ("','", $data). "'";
       
        $studentquery = "INSERT INTO studentdetails(first_name,last_name,dob) VALUES ($studentdata)";
        $result = $connection->query($studentquery);

        if($result){
            echo ("<script>
            window.alert('student added');
            window.location.href='student_list.php';
            </script>");
        }
        else{echo ("<script>
            window.alert('student not added');
            window.location.href='student_list.php';
            </script>");
        }
    }

    //get data from database
    public function getdata(){

        $db = new database;
        $connection = $db->dbconnection(); 

        $studentquery = "SELECT * FROM studentdetails";
        $result = $connection->query($studentquery);

        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }

    }
    //get specific data from database
    public function edit($student_id){

        $db = new database;
        $connection = $db->dbconnection(); 

        $id = $student_id;
        $studentquery = "SELECT * FROM studentdetails WHERE code = '$id' LIMIT 1";

        $result = $connection->query($studentquery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data ;
        }
        else{
            return false;
        }

    }
    //update data to dabase
    public function updatedata($data,$id){

        $db = new database;
        $connection = $db->dbconnection(); 

        $student_id = $id;
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $dob = $data['dob'];

        $studentquery = "UPDATE studentdetails SET first_name='$firstname',last_name='$lastname',dob='$dob' WHERE code = '$student_id' LIMIT 1";
        $result = $connection->query($studentquery);

        if($result){
            echo ("<script>
            window.alert('data updated');
            window.location.href='student_list.php';
            </script>");
        }
        else{
            echo ("<script>
            window.alert('data not updated');
            window.location.href='student_list.php';
            </script>");
        }

    }
    //delete data from database
    public function deletedata($student_id){

        $db = new database;
        $connection = $db->dbconnection(); 

        $id = $student_id;
        $studentquery = "DELETE FROM studentdetails WHERE code = '$id' LIMIT 1";
        $result = $connection->query($studentquery);

        if($result){
            echo ("<script>
            window.alert('data deleted');
            window.location.href='student_list.php';
            </script>");
        }
        else{
            echo ("<script>
            window.alert('not deleted');
            window.location.href='student_list.php';
            </script>");
        }
    }
}

?>