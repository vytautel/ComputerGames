<?php

// sis failas skirtas sukurti ir patalpinti slaptazodi i duombaze. Norint pakeisti slaptazodi, reikia istrinti esama eilute duom bazeje.
// Tada pakeisti nauja slaptazodi, username'a siame faile ir paleisti vykdyti si faila

$connection = new mysqli('localhost', 'root', '', 'computers_shop');

$username1 = 'admin';
$password1 = md5('admin'); //encrypt the password before saving in the database
$rights1 = 'admin';

$username2 = 'employee';
$password2 = md5('employee');
$rights2 = 'employee';

$username3 = 'client';
$password3 = md5('client');
$rights3 = 'client';

//$query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
$sql = "INSERT INTO prisijungimai (username, password, rights) 
VALUES('$username1', '$password1', '$rights1'), 
('$username2', '$password2', '$rights2'),
('$username3', '$password3', '$rights3');";

$connection->query($sql);

$connection->close();
?>
