<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from contact_us WHERE Contact_Id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("contactus.php");</script>';
?>