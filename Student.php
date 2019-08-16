<?php


class Student
{
    public $id;
    public $name;
    public $phone;
    public $email;

    public function __construct($name, $phone, $email)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

}