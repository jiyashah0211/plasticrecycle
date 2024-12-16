<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php
    if(isset($_POST['submit']))
      {
        $sql = "INSERT INTO area (area_name, city_id) VALUES ('".$_POST["area_name"]."','".$_POST["city_id"]."')"; 

   $result = mysqli_query($conn,$sql); 
   echo '<script type="text/javascript">location.replace("area.php");</script>';
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
                <h3 class="card-title">Add Area</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Area Name</label>
                        <input type="text" class="form-control" id="area_name" name="area_name" placeholder="Enter Area Name" required>
                    </div>
                    <div class="form-group ">
                    <label for="exampleInputEmail1">City Name</label>
                    <select class="form-control" name="city_id" id="city_id">
                            <option disabled readonly selected>Select City</option>
                            <?php
                              $q = "SELECT * FROM city";
                              if($r = mysqli_query($conn, $q)){
                                  if(mysqli_num_rows($r) > 0){ 
                                    while($z = mysqli_fetch_array($r)){ 
                                      ?>
                                <option value="<?php echo $z['city_id'] ?>"> <?php echo $z['city_name']?></option>
                                <?php 
                                      }
                                      // Free result set
                                      mysqli_free_result($r);
                                  } else{
                                      echo "No records found";
                                  }
                              } else{
                                  echo "ERROR: Could not able to execute $q. " . mysqli_error($conn);
                              }
                              ?>
                            </select>
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
                <h3 class="card-title">Manage Area</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Area Name</th>
                    <th>City Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM area INNER JOIN city ON area.city_id = city.city_id";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['area_name']; ?></td>
                    <td><?php echo $row['city_name']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-info btn-round' href='edit_area.php?id=<?php echo $row['area_id']; ?>'>Edit</a></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_area.php?id=<?php echo $row['area_id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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