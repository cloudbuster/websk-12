<?php

// Commented out as there is no need to slow down the app if not necessary.
// Don't worry, the database and table are there. 

// /* credentials defined */
// $servername = 'localhost';
// $username = 'root';
// $password = 'root';
// 
// 
// /* new mysqli object assigned to $connection */
// $connection = new mysqli($servername, $username, $password);
// 
// 
// /* checking whether connection successful or not */
// if ($connection->connect_error){
//   echo ('there was an error in connecting to database. reason: ' . $connection->error);
// }
// 
// 
// /* creating database and table if they do not exist with sql creation sentences */
// $sql = "create database if not exists angularapp;
//         use angularapp;
// 
//         create table if not exists attendees
//         (
//           id int auto_increment,
//           firstname varchar(20),
//           lastname varchar(20),
//           email varchar(20),
//           diet varchar (10),
//           sauna boolean,
//           primary key (id)
//         ) 
//         engine innodb";
// 
// 
// /* checking whether connection and creation of database and table was successful or erronous */
// if ($connection->query($sql) == true){
//   echo ("database and table created successfully.");
// } else {
//   echo ("failed to create database and table. reason: " . $connection->error);
// }
// 
// $connection->close();
// 
?>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1>{{ title }}</h1>
  <p> {{ info }}</p>
  <p>
    <a class="btn btn-lg btn-primary" href="#templateForm" role="button">{{ btnText }} &raquo;</a>
  </p>
</div>
