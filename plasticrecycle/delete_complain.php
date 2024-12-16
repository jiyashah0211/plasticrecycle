<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from complain WHERE id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("complain.php");</script>';
?>