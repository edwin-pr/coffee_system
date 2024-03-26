<?php
include('core/dash-header2.php')?>
<style>
  #passwordreset, .alert-success, .alert-danger{
    display: none;
  }
  #passwordreset{
    position: relative;
  }
  .toggle-password{
    position: absolute;
    top: 10%;
    left: 93%;
  }
</style>
<div class="container-fluid py-4">
    <?php
    include ('core/connection.php');
    $f_phone = $_SESSION['supplier_number'];
    $select = "SELECT * FROM suppliers WHERE supplierphone = '$f_phone'";
    $result = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($result);
    ?>
      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Farmer Details</h6>
            </div>
            <div class="card-body p-3 d-flex flex-direction-row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <p id="name">Name: <?php echo ' '.$row['suppliername']?></p>
                  <p id="phone">Phone Number:<?php echo ' '.$row['supplierphone']?></p>
                  <p id="id">ID Number:<?php echo ' '.$row['idnumber']?></p>
                  <button class="btn btn-sm btn-secondary" id="changepassword">Change Password</button>
                  <div class="alert alert-success"></div>
                  <div class="alert alert-danger"></div>
                  <div id="passwordreset" class="form-group">
                    <input type="password" id="password" class="form-control" placeholder="Enter New Password">
                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                    <button class="btn btn-sm btn-success update mt-3" type="submit">Update</button>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <p id="location">Email:<?php echo ' '.$row['supplieremail']?></p>
                  <p id="location">Location:<?php echo ' '.$row['supplierlocation']?></p>
                  <p id="description">Farmer Description:<?php echo ' '.$row['briefinfo']?></p>
                  <p id="date">Date Registered:<?php echo ' '.date('d/m/Y', strtotime($row['created_at']))?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
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
      $('#changepassword').on('click', function(){
        $('#passwordreset').toggle();
      })

      $('.update').on('click', function(){
        if($('#password').val() != ''){
          if($('#password').val().length >= 8){
            var new_password = $('#password').val();
            $.ajax({
              type: "post",
              url: "f_change_password.php",
              data: {n_password: new_password},
              dataType: "text",
              success: function (response) {
                if(response == '1'){
                  $('.alert-success').text('Password Updated Successfully!').show();
                  $('#password').val('');
                  setTimeout(() => {
                    $('.alert-success').hide();
                    $('#passwordreset').hide();
                  }, 4000);
                }
                else if(response == '2'){
                  $('.alert-danger').text('Updated Failed. Contact Admin!').show();
                  $('#password').val('');
                  setTimeout(() => {
                    $('.alert-danger').hide();
                    $('#passwordreset').hide();
                  }, 4000);
                }
              }
            });
          }
          else{
            alert('Password should have minimum of 8 characters!');
          }
        }
        else{
          alert('New Password Required!');
        }
      })

      $('.toggle-password').on('click', function(){
          var passwordField = $('#password');
          var fieldType = passwordField.attr('type');
          
          if (fieldType === 'password') {
              passwordField.attr('type', 'text');
          } else {
              passwordField.attr('type', 'password');
          }
      });
    })
</script>

<?php include('core/dash-footer.php'); ?>