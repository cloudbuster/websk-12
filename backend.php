<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Connect and select database (just in case)
$conn = new mysqli('localhost', 'root', 'root', 'websk21');
$conn->select_db('websk21');

// Check wheter there is data coming from front end
if (file_get_contents('php://input')) {

  // Get and reformat json data from front end
  $data = json_decode(file_get_contents('php://input'));

  // Hand over data to variables to be written to database
  // Strip extra characters with mysqli real_escape_string
  // method.
  $firstName = $conn->real_escape_string($data->firstName);
  $lastName = $conn->real_escape_string($data->lastName);
  $email = $conn->real_escape_string($data->email);
  $diet = $conn->real_escape_string($data->diet);
  $sauna = $conn->real_escape_string($data->sauna);

  // Mockup data
  //  $firstName = 'Arto';
  //  $lastName = 'Hietanen';
  //  $email = 'arto.hietanen@tkk.fi';
  //  $diet = 'fish';
  //  $sauna = true;

  // Insert data from variables into websk12.users
  $sql = "insert into users (firstName, lastName, email, diet, sauna) values ('".$firstName."', '".$lastName."', '".$email."', '".$diet."', '".$sauna."');";
  $conn->query($sql);
} 

/* ********************************************************* */
// Get results from SQL SELECT query and hand them to $result
// Slightly modified resolution from w3schools 
// http://www.w3schools.com/angular/angular_sql.asp
$sql = 'select * from websk21.users';
$result = $conn->query($sql);
$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  if ($outp != "") {$outp .= ",";}
  $outp .= '{"id":"'          . $rs["id"]       . '",';
  $outp .= '"firstName":"'   . $rs["firstName"]. '",';
  $outp .= '"lastName":"'     . $rs["lastName"] . '",';
  $outp .= '"email":"'        . $rs["email"]    . '",';
  $outp .= '"diet":"'         . $rs["diet"]     . '",';
  $outp .= '"sauna":"'        . $rs["sauna"]    . '"}'; 
}
$outp ='['.$outp.']';
$conn->close();
echo($outp);
