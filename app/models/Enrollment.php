<?php

namespace App\Models;

use App\Core\Modal;

class Enrollment extends Modal
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id_enrollment';

    // student create en course 
    public function enrollStudent($studentId, $courseId)
    {
        $data = [
            'student_id' => $studentId,
            'course_id' => $courseId,
            'id_enrollment' => date('Y-m-d H:i:s')
        ];
        return $this->create($data);
    }

    // get all courses of a student

    public function getCoursesByStudent($studentId)
    {
        $sql = "SELECT c.* FROM {$this->table} e 
                JOIN courses c ON e.course_id = c.id_course 
                WHERE e.student_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetchAll();
    }
}
