<?php

use App\Core\Controller;
use App\Models\Services\StudentService;
use App\Core\Auth;

class AuthController extends Controller
{
    private $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $student = $this->studentService->login($email, $password);
            if ($student) {
                $_SESSION['student'] = $student;
                $this->redirect('/student/dashboard');
                exit;
            }

            $this->view('student/login', ['error' => 'Email ou mot de passe incorrect']);
            return;
        }

        $this->view('student/login');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->studentService->register($name, $email, $password);
            $this->redirect('/login');
        }

        $this->view('student/register');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
