<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php
    if(isset($_POST['submit']))
      {
        $sql = "INSERT INTO tbl_barcodes (barcode_id, name, price, discount, is_deleted) VALUES ('".$_POST["barcode_id"]."','".$_POST["pname"]."','".$_POST["price"]."','".$_POST["discount"]."','".$_POST["is_deleted"]."')"; 
       $result = mysqli_query($conn,$sql); 
   echo '<script type="text/javascript">location.replace("barcodes.php");</script>';
        }
  else
  {
    echo 'Error';
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
                <h3 class="card-title">Add Barcode</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Barcode Id</label>
                        <input type="text" class="form-control" id="barcode_id" name="barcode_id" placeholder="Enter Barcode Id" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="pname" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Price </label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                    </div>
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Discount</label>
                        <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount" required>
                        <input type="hidden" class="form-control" id="is_deleted" name="is_deleted" value="0" >
                    </div>
                </div>
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
 </div>
</section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Manage Barcodes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Barcode Id</th>
                    <th>Product Name</th>
                    <th>Price(in Pound)</th>
                    <th>Discount</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM tbl_barcodes";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['barcode_id']; ?></td>
				        <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['discount']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-info btn-round' href='edit_barcodes.php?id=<?php echo $row['id']; ?>'>Edit</a></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_barcodes.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
                  </tr>
                  <?php 
                                      }
                                      // Free result set
                                      mysqli_free_result($result);
                                  } else{
                                      echo "No records found";
                                  }
                              } else{
                                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                              }
                              ?>
                </table>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
 </div>

        
</div>

<?PHP include('footer.php'); ?>