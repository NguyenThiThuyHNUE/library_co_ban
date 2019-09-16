
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST['submit'])){
        if (!empty($_POST['name']) && (!empty($_POST['pass']))){
            $username=$_POST['name'];
            $pass=$_POST['pass'];
            header('location: trangchu.php');
        }else{
            echo "Vui long khong de trong";
        }
    }
    include_once "database/databasesLogin.php";
    $Database=new databasesLogin();
    $Database->checkLogin($username, $pass);

}



?>
<body>
<form method="post">
    <table>

        <tr>
            <td>Name</td>
            <td><input name="name" type="text"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input name="pass" type="text"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit">Submit</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
