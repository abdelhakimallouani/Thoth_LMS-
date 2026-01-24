<?php

namespace App\Models\Repositories;

use App\Core\Modal;

class EnrollmentRepository extends Modal
{
    public function enroll($studentId, $courseId)
    {
        $sql = "INSERT INTO enrollments (id_student, id_course)
                VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $studentId,
            $courseId
        ]);
    }

    public function getCoursesByStudent($studentId)
    {
        $sql = "SELECT c.*, e.enrollment_date
                FROM courses c
                INNER JOIN enrollments e ON e.id_course = c.id_course
                WHERE e.id_student = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId]);

        return $stmt->fetchAll();
    }

    public function getCourseIdsByStudent($studentId)
    {
        $sql = "SELECT id_course FROM enrollments WHERE id_student = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId]);

        return array_column($stmt->fetchAll(), 'id_course');
    }
    public function isEnrolled( $studentId,  $courseId)
    {
        $sql = "SELECT COUNT(*) as total FROM enrollments 
            WHERE id_student = ? AND id_course = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $studentId,
            $courseId
        ]);

        $result = $stmt->fetch();
        return $result['total'] > 0;
    }
}
