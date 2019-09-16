<?php
include_once '../database/databaseStudent.php';
include_once 'Student.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (!empty($_POST['name']) && !empty($_POST['date']) && !empty($_POST['address']) && !empty($_POST['phone'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $date=$_POST['date'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $student = new student($id, $name, $date, $address, $phone);
        $studentDB = new databaseStudent();
        $studentDB ->createStudent($student);
        header('location: DisplayStudent.php',true);
        echo " them thanh cong";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <h2>Add new student</h2>
    <table>
        <tr>
            <td>ID: </td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>Name: </td>
            <td><input name="name"> </td>
        </tr>
        <tr>
            <td>Date: </td>
            <td><input type="text" name="date"></td>
        </tr>
        <tr>
            <td>Addess: </td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Phone: </td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Submit</button></td>
        </tr>

    </table>
    <a href="DisplayStudent.php">Back</a>
</form>
</body>
</html>
