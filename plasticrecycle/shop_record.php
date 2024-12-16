<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php');
$id = $_GET['id'];
$shop_name = $_GET['name'];  ?>

<div class="content-wrapper">
<br><br>
    <!-- Main content -->

       
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">All Record of <?php echo $shop_name ?></h3>
              </div>
			  
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>User Name</th>
					         <th>Barcode ID</th>
					         <th>Product Name</th>
                    <th>Amount</th>
					
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT * FROM tbl_history INNER JOIN tbl_barcodes ON tbl_history.barcode_id = tbl_barcodes.id WHERE tbl_history.shop_id = $id";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php 
                            $userid= $row['user_id']; 
                          
							$sql2 = " SELECT name FROM tbl_user WHERE user_id = '$userid'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_array($result2);
                            echo $row2['name']; ?>
							
							
                    </td>
					
                    <td><?php echo $row['barcode_id']; ?></td>
					           <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td><?php echo $row['date']; ?></td>
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