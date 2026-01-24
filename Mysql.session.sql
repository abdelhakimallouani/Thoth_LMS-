USE thoth;
CREATE TABLE students (
    id_student INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


SELECT * FROM students;

CREATE TABLE courses (
    id_course INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT
);

SELECT * FROM courses;



CREATE TABLE enrollments (
    id_enrollment INT AUTO_INCREMENT PRIMARY KEY,
    id_student INT NOT NULL,
    id_course INT NOT NULL,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_student) REFERENCES students(id_student) ON DELETE CASCADE,
    FOREIGN KEY (id_course) REFERENCES courses(id_course) ON DELETE CASCADE
);

SELECT * FROM enrollments;

DELETE FROM enrollments WHERE id_enrollment = 3;