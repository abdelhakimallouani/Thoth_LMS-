<?php

namespace App\Models\Entities;

class Student{
    private $id_student;
    private $name;  
    private $email;
    private $password;

    public function __construct($id_student, $name, $email, $password)
    {
        $this->id_student = $id_student;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id_student;
    }   
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
}