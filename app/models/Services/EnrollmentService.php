<?php

namespace App\Models\Services;

require_once __DIR__ . '/../Repositories/EnrollmentRepository.php';


use App\Models\Repositories\EnrollmentRepository;

class EnrollmentService
{
    private EnrollmentRepository $repo;

    public function __construct()
    {
        $this->repo = new EnrollmentRepository();
    }

    public function enrollStudent($studentId, $courseId)
    {
        if ($this->repo->isEnrolled($studentId, $courseId)) {
            return false; 
        }
        return $this->repo->enroll($studentId, $courseId);
    }

    public function getStudentCourses($studentId)
    {
        return $this->repo->getCoursesByStudent($studentId);
    }

    public function getStudentCourseIds($studentId)
    {
        return $this->repo->getCourseIdsByStudent($studentId);
    }

}
