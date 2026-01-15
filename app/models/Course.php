<?php

namespace App\Models;

use App\Core\Modal;

class Course extends Modal
{
    protected $table = 'courses';
    protected $primaryKey = 'id_course';

    public function getAllCourse(){
        return $this->all();
    }

    public function getCourseById($id){
        return $this->find($id);
    }
}