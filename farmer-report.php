<?php
include('core/dash-header2.php');?>
<div class="container-fluid py-4">

      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Suppliers' Supply report</h6>
              <div class="d-flex flex-direction-row" style="float: right;"><button type="button" class="btn btn-sm mx-2 text-danger" id="pdf" onclick="toPdf()">Export PDF</button><button type="button" class="btn btn-sm text-success" id="excel">Export Excel</button></div>
            </div>
            <div class="card-body p-3">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped" data-toggle="data-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Batch No.</th>
                        <th>Date Registered</th>
                        <th>Kgs</th>
                        <th>Status</th>
                        <th>Quantity Approved</th>
                        <th>Quantity Cancelled</th>
                        <th>Balance Left</th>
                        <th>Other Info</th>
                        <th>Unit Price (Ksh)</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $phone = $_SESSION['supplier_number'];
                        $user = mysqli_query($con,"SELECT * FROM suppliers WHERE supplierphone = '$phone'");
                        $row=mysqli_fetch_array($user);

                        //fetch patchment
                        $supplier_id = $row['id'];
                        $parchment = mysqli_query($con,"SELECT * FROM parchment WHERE supplier = '$supplier_id'");
                        $order = 0;
                        while($row2=mysqli_fetch_array($parchment)){
                            $order++;
                            $parch_id = $row2['id'];
                            $processing = mysqli_query($con,"SELECT * FROM processing WHERE parch_id = '$parch_id'");
                            $approved = 0;
                            $cancelled = 0;
                            while($row3=mysqli_fetch_array($processing)){
                                if($row3['status'] == 'approved'){
                                    $approved += $row3['quantity'];
                                }
                                else if($row3['status'] == 'cancelled'){
                                    $cancelled += $row3['quantity'];
                                }
                            }?>
                            <tr>
                                <td><?php echo $order?></td>
                                <td><?php echo $row2['batchnumber']?></td>
                                <td><?php echo date('d-m-Y', strtotime($row2['created_at']))?></td>
                                <td><?php echo $row2['quantity'].' Kgs'?></td>
                                <td>
                                    <?php
                                    if($row2['remaining'] == 0 && $approved == $row2['quantity']){?>
                                        <span class="badge bg-success px-2 py-1 rounded-pill">Fully Approved</span>
                                    <?php
                                    }
                                    else if($approved == 0 && $canceled == 0 && $row2['remaining'] == $row2['quantity']){?>
                                        <span class="badge bg-secondary px-2 py-1 rounded-pill ">Waiting Processing</span>
                                    <?php
                                    }
                                    else if($approved != 0 && $row2['remaining'] > 0 && $row2['remaining'] < $row2['quantity'] && $approved > 0){?>
                                        <span class="badge bg-warning px-2 py-1 rounded-pill ">Partially Approved</span>
                                    <?php
                                    }
                                    else if($cancelled == $row2['quantity']){?>
                                        <span class="badge bg-danger px-2 py-1 rounded-pill ">Cancelled</span>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $approved.' Kgs'?></td>
                                <td><?php echo $cancelled.' Kgs'?></td>
                                <td><?php echo $row2['remaining']?></td>
                                <td><?php echo $row3['otherinfo']?></td>
                                <td><?php echo number_format($row2['unitprice'], 2, '.', ',')?></td>
                                <td><?php echo number_format($row2['unitprice'] * $approved, 2, '.', ',');?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="js/saveAsExcel.js"></script>
<script>
    $(document).ready(function(){
        $('#excel').on('click', function(){
            saveAsExcel("myTable", "Supplies");
        })

        function toPdf() {
            var doc = new jsPDF();

            // Add header
            doc.setFontSize(12);
            doc.setFont("helvetica", "bold");
            doc.text('My Supplies', 14, 6);

            // Add footer
            var pageCount = doc.internal.getNumberOfPages();
            for (var i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFont("helvetica", "normal");
                doc.text("Page " + i + " of " + pageCount, 20, doc.internal.pageSize.height - 10);
                doc.setFontSize(10);
                doc.setFont("helvetica", "italic");
                doc.text('©coffee Management Sytem', 50, doc.internal.pageSize.height - 10);
            }


            // Export table to PDF
            doc.autoTable({
                html: '#myTable',
                theme: 'grid',
                margin: { top: 20 },
                headStyles: { fillColor: [0, 51, 102], textColor: 255, fontSize: 12 },
                bodyStyles: { textColor: 0, fontSize: 10 },
                didDrawPage: function (data) {
                    // Add additional styling or content on each page if needed
                }
            });

            doc.save("Supplies");
        }
    })
</script>

<?php include('core/dash-footer.php'); ?>