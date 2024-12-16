<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from collection_shop WHERE shop_id='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("collection_shop.php");</script>';
?>