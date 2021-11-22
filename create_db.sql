DROP DATABASE IF EXISTS create_db;
CREATE DATABASE create_db;
USE create_db;



CREATE TABLE class (
    `class_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `debt` char(4),
    `num` int,
    `section` char(2),
    `name` varchar(45),
    `semester` char(2),
    `year` int
);



CREATE TABLE assignment (
    `grade_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `class_id` int NOT NULL REFERENCES class (class_id),
    `description` varchar(45),
    `pt_possible` int,
    `pt_earn` decimal
    
);




INSERT INTO class (debt, num, section, name, semester, year) 
VALUES 
('INFO', '1620', '1a', 'Intro to Databases', '2', '2021'), 
('INFO', '1325', '4c', 'Software Engineering I', '1', '2021'),
('INFO', '1541', 'WW', 'Java III', '1', '2021');

INSERT INTO assignment (class_id, description, pt_possible, pt_earn)
VALUES
('1', 'Mysql Basics', '20', '19'),
('2', 'Project Management', '15', '15'),
('3', 'Interface Project', '25', '23'),
('3', 'Interest Calculator', '50', '48'),
('2', 'GIT Worksheet', '20', '19'),
('1', 'Database Development Process', '45', '40'), 
('1', 'SCDLC', '25', '25'),
('2', 'Functional Requirements', '20', '20'),
('2', 'Non-functional Requirements', '20', '19'),
('2', 'Case Study 1', '30', '28'),
('3', 'Interface', '25', '25'),
('3', 'Age Calculator', '40', '39'),
('1', 'Midterm','50','45'),
('2', 'Midterm', '50', '50'),
('3', 'Midterm', '50', '40');



CREATE USER 'db_user'@'localhost' 
IDENTIFIED VIA mysql_native_password USING 'pa55word';

GRANT ALL PRIVILEGES ON *.* TO 'db_user'@'localhost' 
REQUIRE NONE WITH GRANT OPTION 
MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0
 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 GRANT ALL PRIVILEGES ON `create_db`.* TO 'db_user'@'localhost'; 