<?php

$servername = 'localhost';
$username = 'root';
$password = 'coderslab';
$basename = 'contactForm';

$conn = new mysqli($servername, $username, $password, $basename);
if ($conn->connect_error) {
    die("Connection failed: $conn->connect_error");
} 
