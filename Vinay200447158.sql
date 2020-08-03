CREATE DATABASE IF NOT EXISTS Vinay200447158;
USE Vinay200447158;
DROP TABLE IF EXISTS skills;
CREATE TABLE skills (
user_id int PRIMARY KEY AUTO_INCREMENT,
user_first_name varchar(100) NOT NULL,
user_last_name varchar (100) NOT NULL,
user_email varchar (100) NOT NULL,
location varchar(100) NOT NULL,
social_media varchar(100) NOT NULL,
skills varchar(100) NOT NULL,
photo varchar(200) NOT NULL
);
DROP TABLE IF EXISTS users;
CREATE TABLE users (
id int PRIMARY KEY AUTO_INCREMENT,
username Varchar(50) NOT NULL,
password Varchar(255) NOT NULL
);
SHOW TABLES;
DESC skills;
DESC users;
