<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php 
$id = $_GET['id'];
$sql = ("SELECT * from tbl_user WHERE user_id ='$id'");
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])){
    $sql1 = ("UPDATE tbl_user SET name = '".$_POST["name"]."', mobile = '".$_POST["mobile"]."',email = '".$_POST["email"]."', password = '".$_POST["password"]."' WHERE user_id='$id' ");
    $result = mysqli_query($conn,$sql1); 
    echo '<script type="text/javascript">location.replace("users.php");</script>';
}  
?>
<div class="content-wrapper">
<br><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Barcode</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Contact No</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email ID</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password'] ?>" required>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a type="button" href="users.php" class="btn btn-danger">Cancle</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
 </div>

<?PHP include('footer.php'); ?>