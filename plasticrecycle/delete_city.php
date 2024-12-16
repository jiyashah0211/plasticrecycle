<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from city WHERE city_id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("city.php");</script>';
?>