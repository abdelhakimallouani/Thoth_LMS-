<?php
session_start();

use App\Core\Router;

// Core
require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Core/Controller.php';
require_once __DIR__ . '/../app/Core/Modal.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Core/Router.php';

// Repos
require_once __DIR__ . '/../app/Models/Repositories/StudentRepository.php';
require_once __DIR__ . '/../app/Models/Repositories/CourseRepository.php';

// Serv
require_once __DIR__ . '/../app/Models/Services/StudentService.php';
require_once __DIR__ . '/../app/Models/Services/CourseService.php';

// Contr
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/StudentController.php';


$router = new Router();

$router->get('/', ['AuthController', 'login']);
$router->get('/login', ['AuthController', 'login']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/register', ['AuthController', 'register']);
$router->post('/register', ['AuthController', 'register']);
$router->get('/logout', ['AuthController', 'logout']);

// Routes Student
$router->get('/student/dashboard', ['StudentController', 'dashboard']);
$router->post('/student/dashboard', ['StudentController', 'enroll']);
$router->get('/student/course', ['StudentController', 'courseDetail']);

// Dispatcher
$router->dispatch($_SERVER['REQUEST_URI']);


