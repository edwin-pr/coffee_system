<?php
include('core/dash-header2.php');?>
<div class="container-fluid py-4">

      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Production Progress</h6>
            </div>
            <div class="card-body p-3">
                <canvas id="areaChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    })
</script>

<?php include('core/dash-footer.php'); ?>