<?php

$conn = new mysqli(
    "localhost",
    "root",
    "1234",
    "travel_booking"
);

if($conn->connect_error){
    die("Connection Failed");
}
?>