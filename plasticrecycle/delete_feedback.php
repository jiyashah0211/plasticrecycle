<?php include('dbconfig.php'); ?>
<?php 
$id = $_GET['id'];
$sql = ("DELETE from feedback WHERE FeedbackId='$id'");
$result = mysqli_query($conn,$sql); 
echo '<script type="text/javascript">location.replace("feedback.php");</script>';
?>