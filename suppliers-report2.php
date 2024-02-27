<?php 
include('core/dash-header.php');
$period = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['time']));?>

<div class="container-fluid py-4">

      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Suppliers' Supply report</h6>
            </div>
            <div class="card-body p-3">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped" data-toggle="data-table">
                    <thead>
                    <tr>
                        <th>Supplier Name</th>
                        <th>Date</th>
                        <th>Kgs</th>
                        <th>Status</th>
                        <th>Resume</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>