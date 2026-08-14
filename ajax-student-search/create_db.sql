/*
================================
Author: Joshua Rogers

Purpose:
This SQL script creates the assignment database,
creates the student table, inserts test records,
creates the joshuaweb database user, and assigns
database privileges.
================================
*/

DROP DATABASE IF EXISTS joshua_rogers_assignment_db;

CREATE DATABASE joshua_rogers_assignment_db;

USE joshua_rogers_assignment_db;

-- Create the student table
CREATE TABLE student (
    studentID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    GPA DECIMAL(4,2) NOT NULL,
    PRIMARY KEY (studentID)
);

-- Insert test records into the student table
INSERT INTO student (name, email, GPA) VALUES
('PO BLACK', 'poblack@gmail.com', 3.51),
('SHIFU HOFFMAN', 'shifuhoffman@gmail.com', 2.52),
('TIGRESS JOLIE', 'tigressjolie@gmail.com', 3.63),
('JENNIFER YUH', 'jenniferyuh@gmail.com', 1.44),
('OX STORMING', 'oxstorming@gmail.com', 3.95),
('MONKEY CHAN', 'monkeychan@gmail.com', 4.00),
('VIPER LIU', 'viperliu@gmail.com', 2.37),
('MANTIS ROGEN', 'mantisrogen@gmail.com', 3.29),
('CRANE CROSS', 'cranecross@gmail.com', 3.72),
('OOGWAY KIM', 'oogway@gmail.com', 1.53),
('PING HONG', 'pinghong@gmail.com', 2.52);

-- Create a local application database user
DROP USER IF EXISTS 'joshuaweb'@'localhost';

CREATE USER 'joshuaweb'@'localhost'
IDENTIFIED BY 'joshuachocolate';

-- Assign the required database privileges
GRANT SELECT, INSERT, UPDATE, DELETE
ON joshua_rogers_assignment_db.*
TO 'joshuaweb'@'localhost';

-- Reload user accounts and permissions
FLUSH PRIVILEGES;
