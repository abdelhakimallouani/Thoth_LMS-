<?php

namespace App\Models\Repositories;

use App\Core\Modal;

class CourseRepository extends Modal
{
    protected $table = 'courses';

    public function getAllCourses()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_course = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}