<?php

namespace App\Models\Services;

use App\Models\Repositories\CourseRepository;

class CourseService
{
    private $rep_course;

    public function __construct()
    {
        $this->rep_course = new CourseRepository();
    }

    public function getAllCourses()
    {
        return $this->rep_course->getAllCourses();
    }
}