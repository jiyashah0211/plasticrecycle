<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from tbl_history WHERE id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("history.php");</script>';
?>