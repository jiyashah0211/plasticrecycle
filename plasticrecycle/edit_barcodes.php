<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php 
$id = $_GET['id'];
$sql = ("SELECT * from tbl_barcodes WHERE id='$id'");
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])){
    echo $sql1 = ("UPDATE tbl_barcodes SET barcode_id = '".$_POST["barcode_id"]."', name = '".$_POST["name"]."',price = '".$_POST["price"]."', discount = '".$_POST["discount"]."' WHERE id= '$id' ");
    $result = mysqli_query($conn,$sql1); 
    echo '<script type="text/javascript">location.replace("barcodes.php");</script>';
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
                        <label for="exampleInputEmail1">Barcode Id</label>
                        <input type="text" class="form-control" id="barcode_id" name="barcode_id" value="<?php echo $row['barcode_id'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Discount</label>
                        <input type="text" class="form-control" id="discount" name="discount" value="<?php echo $row['discount'] ?>" required>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a type="button" href="barcodes.php" class="btn btn-danger">Cancle</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
 </div>

<?PHP include('footer.php'); ?>