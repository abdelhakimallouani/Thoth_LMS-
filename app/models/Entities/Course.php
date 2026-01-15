<?php

namespace App\Models\Entities;

class course{
    private $id_course;
    private $title;  
    private $description;
    

    public function __construct($id_course, $title, $description)
    {
        $this->id_course = $id_course;
        $this->title = $title;
        $this->description = $description;
       
    }

    public function getId()
    {
        return $this->id_course;
    }   
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    
}                           