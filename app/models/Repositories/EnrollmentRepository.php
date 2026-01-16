<?php

namespace App\Models\Repositories;
use App\Core\Modal;

class EnrollmentRepository extends Modal
{
    protected $table = 'enrollments';

    public function getByStudent($studentId)
    {
        $sql = "SELECT c.* FROM courses c
                JOIN enrollments e ON c.id_course = e.id_course                                                                                                              
                WHERE e.id_student = :studentId";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':studentId', $studentId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}