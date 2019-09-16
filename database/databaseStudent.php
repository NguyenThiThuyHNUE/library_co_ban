<?php
include_once "../DBconnect.php";
include_once "../Student/Student.php";

class databaseStudent
{
    public $PDO;
    public $data;
    public $conn;

    public function __construct()
    {
        $this->PDO = new DBconnect();
        //$this->PDO->connect();
        $this->conn = $this->PDO->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM `student`';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $arr = [];

        foreach ($data as $item) {

            $name = $item['name_student'];
            $date = $item['date'];
            $address = $item['address'];
            $phone = $item['phone'];
            $id = $item['id_student'];
            $student = new student($id,$name, $date, $address,$phone);
            array_push($arr, $student);
//            var_dump($student);
        }

        return $arr;


    }

    public function createStudent($obj)
    {
        $this->data = $this->conn->prepare("INSERT INTO student ( name_student, date, address, phone) VALUE ( :name_student,:date,:address,:phone)");
        $this->data->bindParam(":name_student", $obj->name);
        $this->data->bindParam(":date", $obj->date);
        $this->data->bindParam(":address", $obj->address);
        $this->data->bindParam(":phone", $obj->phone);
        $this->data->execute();
    }

    public function updateStudent($id,$name, $date, $address, $phone)
    {

        $sql = "UPDATE `student` "
               ."SET  `name_student`='$name', `date`='$date',`address`='$address',`phone`='$phone'"
               ." WHERE `id_student`='$id'";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
         return $sql;
    }

    public function deleteStudent($id_student)
    {
        $sql = "DELETE FROM `student` WHERE `id_student`='$id_student'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function findById($id){
        $sql = "SELECT * FROM student WHERE id_student = '$id'";
        $stmt = $this ->conn ->prepare($sql);
        $stmt -> execute();
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt -> fetch();
        if($data){
            $id = $data['id'];
            $name = $data['name'];
            $date = $data['date'];
            $address = $data['address'];
            $phone =$data['phone'];
            $student=new student($id, $name, $date, $address, $phone );

            //var_dump($student);
            return $student;
        }else{
            return " Id khong ton tai";
        }

    }


}
//$databasestudent=new databaseStudent();
//$databasestudent->updateStudent("23","thuy",'2019-10-11','ha noi','9889898');
//$databasestudent->getAll();
