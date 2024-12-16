<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<?php
    if(isset($_POST['submit']))
      {
        $sql = "INSERT INTO tbl_user (name, mobile, email, password) VALUES ('".$_POST["name"]."','".$_POST["mobile"]."','".$_POST["email"]."','".$_POST["password"]."')"; 

   $result = mysqli_query($conn,$sql); 
   echo '<script type="text/javascript">location.replace("users.php");</script>';
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Contact No</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Contact Number" required>
                    </div>
                    </div>
                  <div class="row">
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email Id</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Id" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
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
                <h3 class="card-title">Manage Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>Email Id</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM tbl_user";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-info btn-round' href='edit_users.php?id=<?php echo $row['user_id']; ?>'>Edit</a></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_users.php?id=<?php echo $row['user_id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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