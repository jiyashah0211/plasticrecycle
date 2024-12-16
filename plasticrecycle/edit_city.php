<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php 
$id = $_GET['id'];
$sql = ("SELECT * from city WHERE city_id='$id'");
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])){
    $sql1 = ("UPDATE city SET city_name = '".$_POST["city_name"]."' WHERE city_id='$id' ");
    $result = mysqli_query($conn,$sql1); 
    echo '<script type="text/javascript">location.replace("city.php");</script>';
}  
?>
<div class="content-wrapper">
<br><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">City Name</label>
                        <input type="text" class="form-control" id="city_name" name="city_name" value="<?php echo $row['city_name'] ?>" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a type="button" href="city.php" class="btn btn-danger">Cancle</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
</section>
        </div>
    </div>
 </div>

<?PHP include('footer.php'); ?>