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
                <h3 class="card-title">Manage Complain</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>User Name</th>
                    <th>Shop Name</th>
                    <th>Complain Title</th>
                    <th>Complain Description</th>
                    <th>Date</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT complain.id, complain.UserId, complain.shop_id, complain.title ,
                          complain.description, complain.date,
                          collection_shop.ShopName , tbl_user.name
                          FROM complain 
                          INNER JOIN tbl_user ON complain.UserId = tbl_user.user_id
                          INNER JOIN collection_shop ON collection_shop.shop_id = complain.shop_id";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['ShopName']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_complain.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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