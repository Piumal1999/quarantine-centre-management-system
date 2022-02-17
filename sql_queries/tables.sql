/*
CO226 DATABASE PROJECT
Group 20
Tables.sql
*/

DROP DATABASE IF EXISTS quarantine_centre;
CREATE DATABASE quarantine_centre;
USE quarantine_centre;

CREATE TABLE staff (
  id VARCHAR(8) PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(40) NOT NULL,
  gender VARCHAR(1) NOT NULL,
  date_of_birth DATE,
  contact_no VARCHAR(15),
  address VARCHAR(60),
  type VARCHAR(15) NOT NULL
);

CREATE TABLE app_login (
  username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(255) NOT NULL,
  staff_id VARCHAR(8) NOT NULL,
  FOREIGN KEY (staff_id) REFERENCES staff(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE room (
  id VARCHAR(8) PRIMARY KEY,
  capacity INT NOT NULL,
  cleaned_by VARCHAR(8),
  supported_by VARCHAR(8),
  FOREIGN KEY (cleaned_by) REFERENCES staff(id) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (supported_by) REFERENCES staff(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE client (
  id VARCHAR(8) PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(40) NOT NULL,
  gender VARCHAR(1) NOT NULL,
  date_of_birth DATE,
  contact_no VARCHAR(15),
  address VARCHAR(60),
  vaccination_status VARCHAR(10) NOT NULL,
  dietary_pref VARCHAR(10) NOT NULL,
  assigned_room VARCHAR(8),
  status VARCHAR(12) NOT NULL,
  registered_date DATE,
  departure_date DATE,
  FOREIGN KEY (assigned_room) REFERENCES room(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE equipment (
  id VARCHAR(8) PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  status VARCHAR(20) NOT NULL,
  logged_by VARCHAR(8),
  FOREIGN KEY (logged_by) REFERENCES staff(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE payment (
  payment VARCHAR(8) PRIMARY KEY,
  date DATE NOT NULL,
  amount DECIMAL(7,2) NOT NULL,
  paid_by VARCHAR(8) NOT NULL,
  logged_by VARCHAR(8) NOT NULL,
  FOREIGN KEY (paid_by) REFERENCES client(id) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (logged_by) REFERENCES staff(id) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE test (
  id VARCHAR(8) PRIMARY KEY,
  date DATE NOT NULL,
  type VARCHAR(6) NOT NULL,
  result VARCHAR(10) NOT NULL,
  done_to VARCHAR(8) NOT NULL,
  done_by VARCHAR(8) NOT NULL,
  FOREIGN KEY (done_to) REFERENCES client(id) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (done_by) REFERENCES staff(id) ON UPDATE CASCADE ON DELETE RESTRICT
);