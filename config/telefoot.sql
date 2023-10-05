create database telefoot;

use telefoot;

create table users (
  id smallint primary key auto_increment,
  firstname varchar(50),
  lastname varchar(50),
  email varchar(255),
  password VARCHAR(255)
);

CREATE TABLE password_reset (
  id SMALLINT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255),
  token VARCHAR(100)
);