<?php
$firstName = 'Arto';
$lastName = 'Hietanen';
$email = 'arto.hietanen@tkk.fi';
$diet = 'fish';
$sauna = true;

$sql = "insert into employee (firstName, lastName, email, diet, sauna) values ('".$firstName."', '".$lastName."', '".$email."', '".$diet."', '".$sauna."');";

echo $sql;
