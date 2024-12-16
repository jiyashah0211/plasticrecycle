<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php
    if(isset($_POST['submit']))
      {
        $sql = "INSERT INTO city (city_name) VALUES ('".$_POST["city_name"]."')"; 

   $result = mysqli_query($conn,$sql); 
   echo '<script type="text/javascript">location.replace("city.php");</script>';
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">City Name</label>
                        <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Enter State Name" required>
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
                <h3 class="card-title">Manage City</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>City Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM city";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['city_name']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-info btn-round' href='edit_city.php?id=<?php echo $row['city_id']; ?>'>Edit</a></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_city.php?id=<?php echo $row['city_id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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