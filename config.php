   <?php

// 	 session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plasticwastedb";

//session_start(); 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) {
    // die("Connection failed: " . mysqli_connect_error());
// echo 'connected';

}
//echo 'connect';

?>