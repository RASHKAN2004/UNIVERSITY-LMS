CREATE DATABASE university_lms;
USE university_lms;
CREATE TABLE students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE courses(
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100),
    course_code VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO courses
(course_name,course_code,description)
VALUES
('Database Management System','ICT201',
'Learn SQL and Database Concepts'),
('Web Development','ICT202',
'HTML CSS JavaScript PHP'),
('Operating System','ICT203',
'Process Management and Memory Management');
CREATE TABLE notes(
    note_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    file_name VARCHAR(255),
    uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO notes
(title,file_name)
VALUES
('Database Introduction',
'db_intro.pdf'),
('HTML Basics',
'html_notes.pdf'),
('Operating System Concepts',
'os_notes.pdf');

CREATE TABLE assignments(

    assignment_id INT AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(100),

    description TEXT,

    file_name VARCHAR(255),

    due_date DATE,

    uploaded_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
INSERT INTO assignments

(title,description,file_name,due_date)

VALUES


(
'Database Assignment 01',
'Create ER Diagram',
'db_assignment.pdf',
'2026-08-01'
),


(
'Web Development Project',
'Create PHP Website',
'web_project.pdf',
'2026-08-15'
);