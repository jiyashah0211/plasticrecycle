<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<div class="content-wrapper">
<br><br>
    <!-- Main content -->

       
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Manage History</h3>
              </div>
			  
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>User ID</th>
                    <th>User Name</th>
					 <th>Shop Name</th>
                    <th>Barcode ID</th>
					<th>Product Name</th>
                    <th>Amount</th>
					
                    <th>Date</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM tbl_history INNER JOIN tbl_barcodes ON tbl_history.barcode_id = tbl_barcodes.id";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php
                            $userid= $row['user_id']; 
                            //$sql1 = "SELECT * FROM tbl_history INNER JOIN tbl_user ON tbl_history.user_id = tbl_user.user_id WHERE tbl_history.user_id = '$userid'";
							$sql1 = "SELECT name FROM tbl_user WHERE user_id = '$userid'";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_array($result1);
                            echo $row1['name']; ?>
							
							
                    </td>
					 <td><?php 
              $shopid= $row['shop_id']; 
              $sql1 = "SELECT ShopName FROM collection_shop WHERE shop_id = '$shopid'";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_array($result1);
           echo $row1['ShopName']; ?></td>
					
                    <td><?php echo $row['barcode_id']; ?></td>
					<td><?php 
              $productid= $row['barcode_id']; 
              $sql1 = "SELECT  name FROM tbl_barcodes WHERE barcode_id = '$productid'";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_array($result1);
          echo $row1['name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><a type='button' rel='tooltip' class='btn btn-danger btn-round' href='delete_history.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Are You Sure You Want To Delete?');">Delete</a></td>
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