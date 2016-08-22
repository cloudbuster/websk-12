<?php

/* Create database and table if they do not exist */
/* This script is included in mainTemplate.php */

CREATE DATABASE IF NOT EXISTS angularApp;
USE angularApp;

CREATE TABLE IF NOT EXISTS angularApp.Attendees
  (
    ID int auto_increment,
    firstName varchar(20),
    lastName varchar(20),
    email varchar(20),
    diet varchar (10),
    sauna boolean,
    PRIMARY KEY (ID)

  ) ENGINE INNODB;
