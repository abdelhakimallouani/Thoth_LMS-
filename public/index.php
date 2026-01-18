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

$router->get('/', [AuthController::class, 'login']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/student/dashboard', [StudentController::class, 'dashboard']);

$router->dispatch($_SERVER['REQUEST_URI']);

// require_once __DIR__ . '/../app/Core/Database.php';

// use App\Core\Database;

// try {
//     $db = Database::getInstance()->getConnection();
//     echo "Database connected successfully";
// } catch (Exception $e) {
//     echo "Database error: " . $e->getMessage();
// }


