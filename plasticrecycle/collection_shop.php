<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php
    if(isset($_POST['submit']))
      {
        $sql = "INSERT INTO collection_shop (ShopName, PersonName, ContactNo, Area, City, EmailId, Password , latitude , longitude) VALUES ('".$_POST["ShopName"]."','".$_POST["PersonName"]."','".$_POST["ContactNo"]."','".$_POST["Area"]."','".$_POST["City"]."','".$_POST["EmailId"]."','".$_POST["Password"]."','".$_POST["latitude"]."','".$_POST["longitude"]."')"; 

   $result = mysqli_query($conn,$sql); 
   echo '<script type="text/javascript">location.replace("collection_shop.php");</script>';
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
                <h3 class="card-title">Add Collection Shop</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Shop Name</label>
                        <input type="text" class="form-control" id="ShopName" name="ShopName" placeholder="Enter Shop Name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Person Name</label>
                        <input type="text" class="form-control" id="PersonName" name="PersonName" placeholder="Enter Person Name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Contact No</label>
                        <input type="text" class="form-control" id="ContactNo" name="ContactNo" placeholder="Enter Contact Number" required>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">City Name</label>
                    <select class="form-control" name="City" id="City">
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
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Area Name</label>
                    <select class="form-control" name="Area" id="Area">
                            <option disabled readonly selected>Select Area</option>
                            <?php
                              $q = "SELECT * FROM area";
                              if($r = mysqli_query($conn, $q)){
                                  if(mysqli_num_rows($r) > 0){ 
                                    while($z = mysqli_fetch_array($r)){ 
                                      ?>
                                <option value="<?php echo $z['area_id'] ?>"> <?php echo $z['area_name']?></option>
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

                  <div class="row">
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter Longitude" required>
                    </div>
                </div>

                  <div class="row">
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" class="form-control" id="EmailId" name="EmailId" placeholder="Enter Email Id" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter Password" required>
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
                <h3 class="card-title">Manage Collection Shop</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Shop Name</th>
                    <th>Person Name</th>
                    <th>Contact No</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Email Id</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM collection_shop INNER JOIN city ON collection_shop.City = city.city_id INNER JOIN area ON collection_shop.Area = area.area_id ";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['ShopName']; ?></td>
                    <td><?php echo $row['PersonName']; ?></td>
                    <td><?php echo $row['ContactNo']; ?></td>
                    <td><?php echo $row['area_name']; ?></td>
                    <td><?php echo $row['city_name']; ?></td>
                    <td><?php echo $row['EmailId']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-info btn-round' href='edit_collection_shop.php?id=<?php echo $row['shop_id']; ?>'>Edit</a></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_collection_shop.php?id=<?php echo $row['shop_id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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