<?php
include_once "../DBconnect.php";

class databaseCategory
{
    public $PDO;
    public $data;
    public $conn;

    public function __construct()
    {
        $this->PDO = new DBconnect();
        $this->PDO->connect();
        $this->conn = $this->PDO->connect;
    }

    public function createCategory($ma_the_loai, $ten_the_loai)
    {
        $this->data = $this->conn->prepare("INSERT INTO sach (ma_sach, ten_sach, ten_tac_gia, nha_xuat_ban,gia, ma_the_loai) VALUE (:ma_sach, :ten_sach,:ten_tac_gia,:nha_xuat_ban,:gia,:ma_the_loai)");
        $this->data->bindParam(":ma_the_loai", $ma_the_loai);
        $this->data->bindParam(":ten_the_loai", $ten_the_loai);
        $this->data->execute();
    }

    public function updateCategory($ma_the_loai, $ten_the_loai)
    {
        $sql = "UPDATE `the_loai` SET `ma_the_loai`='$ma_the_loai',`ten_the_loai`=$ten_the_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function deleteCategory($ma_the_loai)
    {
        $sql = "DELETE FROM `the_loai` WHERE `ma_the_loai`='$ma_the_loai'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}