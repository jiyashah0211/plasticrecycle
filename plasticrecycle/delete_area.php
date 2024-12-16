<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from area WHERE area_id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("area.php");</script>';
?>