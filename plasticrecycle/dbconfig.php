<?php

$conn = mysqli_connect("localhost","root","","plasticwastedb");
if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

?>