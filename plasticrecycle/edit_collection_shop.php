<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php 
$id = $_GET['id'];
$sql = ("SELECT * from collection_shop WHERE shop_id='$id'");
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])){
    $sql1 = ("UPDATE collection_shop SET ShopName = '".$_POST["ShopName"]."', PersonName = '".$_POST["PersonName"]."',ContactNo = '".$_POST["ContactNo"]."', Area = '".$_POST["Area"]."',City = '".$_POST["City"]."', EmailId = '".$_POST["EmailId"]."', Password = '".$_POST["Password"]."', latitude = '".$_POST["latitude"]."', longitude = '".$_POST["longitude"]."' WHERE shop_id='$id' ");
    $result = mysqli_query($conn,$sql1); 
    echo '<script type="text/javascript">location.replace("collection_shop.php");</script>';
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
                <h3 class="card-title">Edit Collection Shop</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Shop Name</label>
                        <input type="text" class="form-control" id="ShopName" name="ShopName" value="<?php echo $row['ShopName'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Person Name</label>
                        <input type="text" class="form-control" id="PersonName" name="PersonName" value="<?php echo $row['PersonName'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Contact No</label>
                        <input type="text" class="form-control" id="ContactNo" name="ContactNo" value="<?php echo $row['ContactNo'] ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Area Name</label>
                    <select class="form-control" name="Area" id="Area">
                            <?php
                             $s_id= $row['Area']; 
                              $sql = "SELECT * FROM area where area_id = '$s_id'";
                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){ 
                                    while($y = mysqli_fetch_array($result)){ 
                                      ?>
                                <option value="<?php echo $y['area_id'] ?>"<?php if ($row['Area'] == $y['area_id']) {
                                                                                    echo "selected";
                                                                                } ?>> <?php echo $y['area_name']; ?></option>
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
                             <?php
                              $sql = "SELECT * FROM area";
                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){ 
                                    while($s = mysqli_fetch_array($result)){ 
                                      ?>
                                <option value="<?php echo $s['area_id'] ?>"> <?php echo $s['area_name']?></option>
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
                            </select>
                            
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">City Name</label>
                    <select class="form-control" name="City" id="City">
                            <?php
                             $s_id= $row['City']; 
                              $sql = "SELECT * FROM city where city_id = '$s_id'";
                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){ 
                                    while($y = mysqli_fetch_array($result)){ 
                                      ?>
                                <option value="<?php echo $y['city_id'] ?>"<?php if ($row['City'] == $y['city_id']) {
                                                                                    echo "selected";
                                                                                } ?>> <?php echo $y['city_name']; ?></option>
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
                             <?php
                              $sql = "SELECT * FROM city";
                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){ 
                                    while($s = mysqli_fetch_array($result)){ 
                                      ?>
                                <option value="<?php echo $s['city_id'] ?>"> <?php echo $s['city_name']?></option>
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
                            </select>
                            
                  </div>
                  </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $row['latitude'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $row['longitude'] ?>" required>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email ID</label>
                        <input type="email" class="form-control" id="EmailId" name="EmailId" value="<?php echo $row['EmailId'] ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" class="form-control" id="Password" name="Password" value="<?php echo $row['Password'] ?>" required>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Update</button>
                  <a type="button" href="collection_shop.php" class="btn btn-danger">Cancle</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </section>
        </div>
    </div>
 </div>

<?PHP include('footer.php'); ?>