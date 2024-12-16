<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from tbl_barcodes WHERE id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("barcodes.php");</script>';
?>