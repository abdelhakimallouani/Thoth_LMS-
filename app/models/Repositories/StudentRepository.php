<?php

namespace App\Models\Repositories;

use App\Core\Modal;

class StudentRepository extends Modal
{
    protected $table = 'students';

    public function getByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}