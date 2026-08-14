/*
Author: Joshua Rogers

Purpose:
This SQL file creates the Assignment 4 & 5 student database,
creates the major and student tables, inserts sample records,
creates a database user, and grants the required privileges.
*/


-- create and select the database
DROP DATABASE IF EXISTS joshua_rogers_student_db;
CREATE DATABASE joshua_rogers_student_db;
USE joshua_rogers_student_db;


-- create the major table
CREATE TABLE major (
  majorID       INT(11)        NOT NULL   AUTO_INCREMENT,
  majorName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (majorID)
);


-- create the student table
CREATE TABLE student (
  studentID     INT(11)        NOT NULL   AUTO_INCREMENT,
  majorID       INT(11)        NOT NULL,
  firstName     VARCHAR(255)   NOT NULL,
  lastName      VARCHAR(255)   NOT NULL,
  gender        CHAR(1)        NOT NULL,
  PRIMARY KEY (studentID),

  -- create the foreign key relationship
  -- one major can have many students
  FOREIGN KEY (majorID) 
	REFERENCES major(majorID)
);


-- insert data into the major table
INSERT INTO major VALUES
(1, 'Computer Information Systems'),
(2, 'Cybersecurity'),
(3, 'Business Management');


-- insert data into the student table
INSERT INTO student VALUES
(1, 1, 'Joshua', 'Rogers', 'M'),
(2, 1, 'Olivia', 'Bennett', 'F'),
(3, 1, 'Marcus', 'Thompson', 'M'),
(4, 2, 'Sophia', 'Martinez', 'F'),
(5, 2, 'Ethan', 'Collins', 'M'),
(6, 2, 'Ava', 'Mitchell', 'F'),
(7, 3, 'Noah', 'Parker', 'M'),
(8, 3, 'Mia', 'Reynolds', 'F'),
(9, 3, 'Lucas', 'Anderson', 'M');


-- create the database user
CREATE USER IF NOT EXISTS joshuarogers1@localhost
IDENTIFIED BY 'joshuaisgreat';


-- grant the required data privileges to the database user
GRANT SELECT, INSERT, UPDATE, DELETE
ON joshua_rogers_student_db.*
TO joshuarogers1@localhost;
