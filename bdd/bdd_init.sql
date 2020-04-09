DROP DATABASE f1_website;
CREATE DATABASE f1_website;

USE f1_website;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nickname VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    is_admin ENUM('true', 'false') NOT NULL DEFAULT 'false'
);


