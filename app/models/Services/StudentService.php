<?php
namespace App\Models\Services;

use App\Models\Repositories\StudentRepository;

class StudentService
{
    private $rep_std;

    public function __construct()
    {
        $this->rep_std = new StudentRepository();
    }

    public function register($name, $email, $password)
    {
        $exist = $this->rep_std->getByEmail($email);
        if ($exist) {
            echo "deja exist";
        }
         return $this->rep_std->create([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public function login($email, $password)
    {
        $student = $this->rep_std->getByEmail($email);
        if (!$student) return false;
        
        if (!password_verify($password, $student['password'])) {
            return false;
        }

        return $student;
    }
}