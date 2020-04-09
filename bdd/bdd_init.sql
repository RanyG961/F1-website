DROP DATABASE f1_website;
CREATE DATABASE f1_website;

USE f1_website;

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    password VARCHAR(255) NOT NULL,
    nickname VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    is_admin ENUM('true', 'false') NOT NULL DEFAULT 'false'
);

CREATE TABLE pilots (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    birthdate DATE,
    twitter VARCHAR(255),
    instagram VARCHAR(255)
);

CREATE TABLE teams (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    engine VARCHAR(255),
    car_name VARCHAR(255),
    date DATE
);

CREATE TABLE pilot_team (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pilot_id INT REFERENCES pilots(id),
    team_id INT REFERENCES teams(id),
    data DATE
);

CREATE TABLE tracks (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    country VARCHAR(255),
    city VARCHAR(255),
    length FLOAT,
    turns INT UNSIGNED
);

CREATE TABLE race (
    
);
