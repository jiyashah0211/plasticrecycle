<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

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
                <h3 class="card-title">User Inquiry</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT *
                          FROM contact_us ";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Contact']; ?></td>
                    <td><?php echo $row['Message']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_contactus.php?id=<?php echo $row['Contact_Id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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