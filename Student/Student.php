<?php


class student
{
    public $id;
    public $name;
    public $date;
    public $address;
    public $phone;

public  function __construct($id,$name, $date, $address, $phone )
{
    $this->id = $id;
    $this->name=$name;
    $this->date=$date;
    $this->address=$address;
    $this->phone=$phone;
}

    public function getID()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function getAdress()
    {
        return $this->address;
    }


    public function getPhone()
    {
        return $this->phone;
    }
}