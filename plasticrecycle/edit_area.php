<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php 
$id = $_GET['id'];
$sql = ("SELECT * from area WHERE area_id='$id'");
$result = mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);

if(isset($_POST['submit'])){
    $sql1 = ("UPDATE area SET area_name = '".$_POST["area_name"]."', city_id = '".$_POST["city_id"]."' WHERE area_id='$id' ");
    $result = mysqli_query($conn,$sql1); 
    echo '<script type="text/javascript">location.replace("area.php");</script>';
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
                <h3 class="card-title">Edit Area</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Area Name</label>
                        <input type="text" class="form-control" id="area_name" name="area_name" value="<?php echo $row['area_name'] ?>" required>
                    </div>
                    <div class="form-group ">
                    <label for="exampleInputEmail1">State Name</label>
                    <select class="form-control" name="city_id" id="city_id">
                            <?php
                             $s_id= $row['city_id']; 
                              $sql = "SELECT city_id,city_name FROM city where city_id = '$s_id'";
                              if($result = mysqli_query($conn, $sql)){
                                  if(mysqli_num_rows($result) > 0){ 
                                    while($y = mysqli_fetch_array($result)){ 
                                      ?>
                                <option value="<?php echo $y['city_id'] ?>"<?php if ($row['city_id'] == $y['city_id']) {
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
                              $sql = "SELECT city_id,city_name FROM city";
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
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-info">Submit</button>
                  <a type="button" href="area.php" class="btn btn-danger">Cancle</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
</section>
        </div>
    </div>
 </div>
<?PHP include('footer.php'); ?>