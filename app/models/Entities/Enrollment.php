<?php

namespace App\Models\Entities;

class Enrollment{
    private $id_enrollment;
    private $student;  
    private $course;
    private $enrollment_date;

    public function __construct($id_enrollment, $student, $course, $enrollment_date)
    {
        $this->id_enrollment = $id_enrollment;
        $this->student = $student;
        $this->course = $course;
        $this->enrollment_date = $enrollment_date;
    }

    public function getId()
    {
        return $this->id_enrollment;
    }   
    public function getStudent()
    {
        return $this->student;
    }
    public function getCourse()
    {
        return $this->course;
    }
    public function getEnrollmentDate()
    {
        return $this->enrollment_date;
    }
}