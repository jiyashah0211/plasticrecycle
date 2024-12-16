<?PHP include('header.php'); ?>
<?PHP include('dbconfig.php'); ?>

<div class="content-wrapper">
<br><br>
    <!-- Main content -->

       
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Shop wise collection</h3>
              </div>
			  
              <!-- /.card-header -->
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Shop Name</th>
                    <th>Total Amount Paid</th>
				            <th>Total Items Collected</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $sql = "SELECT collection_shop.shop_id,collection_shop.ShopName
                            FROM collection_shop ";
                      if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){ 
                          $i=1;
                          while($row = mysqli_fetch_array($result)){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['ShopName']; ?></td>
                   <td><?php 

                    $shop_id = $row['shop_id'];
                    $sql2 = " SELECT SUM(tbl_history.Amount), COUNT(tbl_history.barcode_id) FROM tbl_history WHERE shop_id = $shop_id;";
                            
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_array($result2);
                            
                            echo $row2['SUM(tbl_history.Amount)']; ?>
                  </td>

                   <td><?php echo $row2['COUNT(tbl_history.barcode_id)']; ?></td>
                   <td><a type='button' rel='tooltip' class='btn btn-info btn-round' href='shop_record.php?id=<?php echo $row['shop_id']?>&name=<?php echo $row['ShopName']; ?>'>View</a></td>
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