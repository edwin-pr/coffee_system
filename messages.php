<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Messages</h6>
            </div>
            <div class="card-body p-3">
        <?php
        if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
        // authorized to operate
        ?>
                <div  class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>Farmer Name</th>
                           <th>Phone</th>
                           <th>Subject</th>
                           <th>Date</th>
                           <th>Status</th>
                           <th>#</th>
                        </tr>
                     </thead>
                     <tbody>
                            <?php
                            $gt_queries=mysqli_query($con,"SELECT * FROM queries ORDER BY created_at DESC");
                            while ($row=mysqli_fetch_array($gt_queries)) {
                                $farmer_id = $row["farmer_id"];
                                $gt_supplier = mysqli_query($con,"SELECT suppliername, supplierphone FROM suppliers WHERE id = $farmer_id");
                                $farmer = mysqli_fetch_assoc($gt_supplier);
                                ?>
                                <tr>
                                    <td><?php echo(htmlentities($farmer['suppliername'])); ?></td>
                                    <td><?php echo(htmlentities($farmer['supplierphone'])); ?></td>
                                    <td><?php echo(htmlentities($row['subject'])); ?></td>
                                    <td><?php echo(htmlentities(date('d/m/Y', strtotime($row['created_at'])))); ?></td>
                                    <td>
                                        <?php
                                        $query_id = $row['id'];
                                    $gt_replies = mysqli_query($con,"SELECT * FROM replies WHERE query_id = '$query_id'");
                                    $rows = mysqli_num_rows( $gt_replies );
                                    if( $rows > 0) {
                                        echo '<span class="badge badge-link bg-gradient-success">Replied</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="badge badge-link bg-gradient-warning">Not Replied</span>';
                                    }
                                    ?></td>
                                    
                                    <td>
                                        <a  class="btn btn-primary" href="message-details.php?message=<?php echo $row['id'];?>">
                                            <small>
                                                <i class="fa fa-info"></i>
                                            </small>
                                        </a>
                                        <a  class="btn btn-warning" href="message-delete.php?message=<?php echo $row['id'];?>">
                                        <small>
                                            <i class="fa fa-trash"></i>
                                        </small>
                                        </a>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            
                            <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Farmer Name</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
          </div>
        </div>
        

      </div>
     
        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate
  ?>
<?php } ?>
</div>

<?php include('core/dash-footer.php'); ?>