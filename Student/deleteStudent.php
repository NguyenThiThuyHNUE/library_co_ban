<?php

include_once '../database/databaseStudent.php';
include_once 'Student.php';
if ($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $studentDB = new databaseStudent();
        $studentDB->deleteStudent($id);
    }
    header('location: DisplayStudent.php',true);
}
?>

