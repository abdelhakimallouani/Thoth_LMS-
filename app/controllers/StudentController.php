<?php

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Services\StudentService;
use App\Models\Services\CourseService;

class StudentController extends Controller{
    private $studentService;
    private $courseService;

    public function __construct()
    {
        $this->studentService = new StudentService();
        $this->courseService = new CourseService();
    }

    public function dashboard()
    {
        $student = Auth::user();
        $courses = $this->courseService->getAllCourses();
        $this->view('student/dashboard', ['student' => $student, 'courses' => $courses]);
    }
}