<?php
include_once "../DBconnect.php";

class databaseBook
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

    public function createBook($ma_sach, $ten_sach, $ten_tac_gia, $nha_xuat_ban, $gia, $ma_the_loai)
    {
        $this->data = $this->conn->prepare("INSERT INTO sach (ma_sach, ten_sach, ten_tac_gia, nha_xuat_ban,gia, ma_the_loai) VALUE (:ma_sach, :ten_sach,:ten_tac_gia,:nha_xuat_ban,:gia,:ma_the_loai)");
        $this->data->bindParam(":ma_sach", $ma_sach);
        $this->data->bindParam(":ten_sach", $ten_sach);
        $this->data->bindParam(":ten_tac_gia", $ten_tac_gia);
        $this->data->bindParam(":nha_xuat_ban", $nha_xuat_ban);
        $this->data->bindParam(":gia", $gia);
        $this->data->bindParam(":ma_the_loai", $ma_the_loai);
        $this->data->execute();
    }

    public function updateBook($ma_sach, $ten_sach, $ten_tac_gia, $nha_xuat_ban, $gia, $ma_the_loai)
    {
        $sql = "UPDATE `sach` SET `ma_sach`='$ma_sach, `ten_sach`='$ten_sach', `ten_tac_gia`='$ten_tac_gia',`nha_xuat_ban`='$nha_xuat_ban',`gia`='$gia',`ma_the_loai`='$ma_the_loai'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function deleteBook($ma_sach)
    {
        $sql = "DELETE FROM `sach` WHERE `ma_sach`='$ma_sach'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}