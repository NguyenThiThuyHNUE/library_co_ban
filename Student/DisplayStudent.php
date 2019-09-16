<?php
include_once "../database/databaseStudent.php";
include_once "Student.php";
$studentDB = new databaseStudent();
$students=$studentDB->getAll();
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
    <table>
        <tr>
            <td> Ma sinh vien</td>
            <td>Ten sinh vien</td>
            <td>Ngay sinh</td>
            <td>Dia chi</td>
            <td>So dien thoai</td>
        </tr>
        <?php foreach ($students as $key => $student) { ?>

            <tr>
                <td><?php echo $student->getID(); ?></td>
                <td><?php echo $student->getName(); ?></td>
                <td><?php echo $student->getDate(); ?></td>
                <td><?php echo $student->getAdress(); ?></td>
                <td><?php echo $student->getPhone(); ?></td>
                <td><span><a href="deleteStudent.php?id=<?php echo $student->getID(); ?>"> Delete</a></span></td>
                <td><span><a href="editStudent.php?id=<?php echo $student->getID(); ?>"> Update</a></span></td>
            </tr>
            <?php
        }
        ?>
    </table>
<a href="addStudent.php">Add new student</a>
</body>
</html>
