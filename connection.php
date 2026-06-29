<?php

$conn = mysqli_connect("localhost","root","1234","airline_booking");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>