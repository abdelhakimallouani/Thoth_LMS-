<?php 

namespace App\Models;

use App\Core\Modal;

class Student extends Modal
{
    protected $table = 'students';
    protected $primaryKey = 'id_student';


    public function findByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function authenticate($email, $password)
    {
        $student = $this->findByEmail($email);
        if ($student && password_verify($password, $student['password'])) {
            return $student;
        }
    }
}

