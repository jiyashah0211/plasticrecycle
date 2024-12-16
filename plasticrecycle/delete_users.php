<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from tbl_user WHERE user_id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("users.php");</script>';
?>