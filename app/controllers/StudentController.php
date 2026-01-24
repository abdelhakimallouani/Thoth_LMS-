<?php

require_once __DIR__ . '/../Models/Services/CourseService.php';
require_once __DIR__ . '/../Models/Services/EnrollmentService.php';
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';
require_once __DIR__ . '/../Models/Services/StudentService.php';

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Services\CourseService;
use App\Models\Services\EnrollmentService;

class StudentController extends Controller
{
    private CourseService $courseService;
    private EnrollmentService $enrollmentService;

    public function __construct()
    {
        $this->courseService = new CourseService();
        $this->enrollmentService = new EnrollmentService();
    }

    public function dashboard()
    {
        $student = Auth::user();
        if (!$student) {
            $this->redirect('/login');
        }

        $courses    = $this->courseService->getAllCourses();
        $myCourses  = $this->enrollmentService->getStudentCourses($student['id_student']);

        $this->view('student/dashboard', [
            'student'     => $student,
            'my_courses'  => $myCourses,
            'courses'     => $courses,
        ]);
    }

    public function enroll()
    {
        $student = Auth::user();
        if (!$student) {
            $this->redirect('/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
            $success = $this->enrollmentService->enrollStudent(
                $student['id_student'],
                $_POST['course_id']
            );

            if (!$success) {
                $_SESSION['error'] = "Vous êtes déjà inscrit à ce cours.";
            } else {
                $_SESSION['success'] = "Inscription réussiee au cours.";
            }
        }

        $this->redirect('/student/dashboard');
    }

    public function courseDetail()
    {
        $student = Auth::user();
        if (!$student) {
            $this->redirect('/login');
        }

        $courseId = isset($_GET['id']) ? $_GET['id'] : null;

        $course = $this->courseService->getCourseById($courseId);
        $this->view('student/course', [
            'student' => $student,
            'course'  => $course
        ]);
    }
}
