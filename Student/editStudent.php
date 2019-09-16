<?php
include_once "../database/databaseStudent.php";
include_once 'Student.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['name']) && isset($_POST['date']) && isset($_POST['address']) && isset($_POST['phone']) ){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $studentDB = new databaseStudent();
        $db = $studentDB->updateStudent($id,$name,$date,$address,$phone);
        header('location: DisplayStudent.php');
    }else{
        $id = $_GET['id'];
        $studentDB = new databaseStudent();
        $student = $studentDB ->findById($id);
        echo "khong duoc de trong";
    }
}else{
    $id = $_GET['id'];
    $studentDB = new databaseStudent();
    $student = $studentDB -> findById($id);
    if(is_string($student)){
        echo $student;
        echo '<a href="DisplayStudent.php"> Tro ve</a>';
        die();
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
    <h2>Edit Student</h2>
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name= "id" disabled value="<?php echo $id?>"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name = 'name' placeholder="<?php echo $name?>"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="text" name = 'date'  placeholder="<?php echo $date?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name = 'address'  placeholder="<?php echo $address?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name = 'phone'  placeholder="<?php echo $phone?>"></td>
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
