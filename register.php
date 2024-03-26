<?php include_once('core/header.php');
if ($_SESSION['admin']=='1') {
  // code...
  echo "<script>window.location='dashboard.php'</script>";

}
?>
<style>
/* Style radio inputs */
.form-check-input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Style the custom radio button */
.form-check-input[type="radio"] + .form-check-label::before {
    content: '';
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid #999; /* Border color */
    border-radius: 50%; /* Make it round for radio buttons */
    background-color: #000;
    margin-right: 5px;
}

/* Style the custom radio button when checked */
.form-check-input[type="radio"]:checked + .form-check-label::before {
    background-color: #007bff; /* Change background color when checked */
    border-color: #007bff; /* Change border color when checked */
}
.form-cover{
    overflow-y: auto !important;
}
</style>
    <section class="form-01-main">
      <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-sub-main">
              <div class="_main_head_as">
                <a href="#">
                  <img src="assets/images/vector.png">
                </a>
              </div>
              <?php
                if ($error) {
                  // code...
                  echo "<center class='text-warning'>"
                .$error."
                  </center>";
                }
              ?>
              <form action="core/register.php" method="post" id="myForm" style="overflow-y: auto;">
              <?php
              if(isset($_SESSION['error'])){?>
                  <div class="alert alert-danger">
                    <?php echo $_SESSION['error']?>
                  </div>
                  <?php
              }
              ?>
                <div class="form-group">
                  <select name="user_type" id="user_type" class="form-control">
                    <option value="1">Farmer</option>
                    <option value="2">Admin</option>
                  </select>
              </div>
                <div class="form-group">
                  <input id="name" name="name" class="form-control _ge_de_ol" type="text" placeholder="Name" aria-required="true">
              </div>
              <div class="form-group">
                  <input id="phone" name="phone" class="form-control _ge_de_ol" type="tel" placeholder="Phone" aria-required="true">
              </div>
              <div class="form-group">
                  <input id="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Email" aria-required="true">
              </div>
              <div class="form-group">
                  <input id="id" name="id" class="form-control _ge_de_ol" type="number" placeholder="ID Number" aria-required="true">
              </div>
              <div class="form-group">
                  <input id="location" name="location" class="form-control _ge_de_ol" type="text" placeholder="Location" aria-required="true">
              </div>

              <div class="form-group">                                              
                <input id="password" type="password" class="form-control" name="password" placeholder="********">
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-success w-100" id="register">Register</button>
                </div>
                <div class="form-group mt-3">
                <a href="index.php" class="btn btn-primary">Login</a>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#user_type').on('change', function(){
        if($(this).children('option:selected').val() == 1){
            $('#name, #phone, #email, #id, #location').show();
        }
        else{
            $('#phone, #location').hide();
        }
      })

      $('#register').on('click', function(e){
        if($('#user_type').children('option:selected').val() == 1){
          if($('#name, #phone, #email, #id, #location, #password').val() == ''){
            e.preventDefault();
            alert('All fields required!');
          }
        }
        else if($('#user_type').children('option:selected').val() == 2){
          if($('#name, #email, #id, #password').val() == ''){
            e.preventDefault();
            alert('All fields are Required');
          }
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
    });
  </script>
<?php include_once('core/footer.php');?>