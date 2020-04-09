DROP DATABASE f1_website;
CREATE DATABASE f1_website;

USE f1_website;

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    password VARCHAR(50) NOT NULL,
    nickname VARCHAR(10) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT FALSE
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
    pilot_number INT UNSIGNED,
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
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    laps INT UNSIGNED,
    date DATE
);

CREATE TABLE race_results (
    race_id INT UNSIGNED REFERENCES race(id),
    pilot_id INT UNSIGNED REFERENCES pilots(id),
    position INT UNSIGNED,
    time TIME(3),
    PRIMARY KEY(race_id, pilot_id)
);

CREATE TABLE qualification (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATE
);

CREATE TABLE quali_results (
    quali_id INT UNSIGNED REFERENCES qualification(id),
    pilot_id INT UNSIGNED REFERENCES pilot(id),
    time TIME(3),
    PRIMARY KEY(quali_id, pilot_id)
);

CREATE TABLE free_practice (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    date DATE
);

CREATE TABLE fp_results (
    fp_id INT UNSIGNED REFERENCES free_practice(id),
    pilot_id INT UNSIGNED REFERENCES pilot(id),
    nb_laps INT UNSIGNED,
    best_time TIME(3),
    PRIMARY KEY(fp_id, pilot_id)
);

CREATE TABLE race_we (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    race_id INT UNSIGNED REFERENCES race(id),
    quali_id INT UNSIGNED REFERENCES qualification(id),
    fp_id INT UNSIGNED REFERENCES free_practice(id)
);

CREATE TABLE prognosis (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED REFERENCES users(id),
    race_id INT UNSIGNED REFERENCES race(id),
    pilot_id INT UNSIGNED REFERENCES pilot(id),
    position INT UNSIGNED
);


