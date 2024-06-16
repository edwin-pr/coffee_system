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
              <form action="" method="post" id="myForm">
                <?php
                 if(isset($_SESSION['register'])){?>
                    <div class="alert alert-primary">
                      <?php echo $_SESSION['register']?>
                    </div>
                <?php
                unset($_SESSION['register']);
                 }
                 ?>
                <div class="form-group d-flex flex-direction-row justify-content-evenly">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="user_type" value="admin" id="admin">
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="user_type" value="farmer" id="farmer">
                    <label class="form-check-label" for="farmer">Farmer</label>
                </div>
              </div>

              <div class="form-group">
                  <input id="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Email" required="" aria-required="true">
              </div>

              <div class="form-group">                                              
                <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
              </div>

               <input type="hidden"  name="login">

              <div class="form-group">
                <div class="btn_uy" onclick="login()">
                  <a href="javascript:void();"><span>Login</span></a>
                </div>
                <div class="btn btn-primary">
                  <a href="register.php" class="text-light"><span>Register</span></a>
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
      $('input[type="radio"]').change(function() {
          if ($(this).is(':checked')) {
              var selectedValue = $(this).attr('id');
              if(selectedValue == 'farmer'){
                $('#email').attr({
                    'name': 'email',
                    'type': 'email',
                    'placeholder': 'Email'
                });
                //$('#password').parent().hide();
              }
              else{
                $('#email').attr({
                    'name': 'email',
                    'type': 'text',
                    'placeholder': 'Email'
                });
                //$('#password').parent().show();
              }
          }
      });

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

    function login()
    {
      if ($('input[type="radio"]').is(':checked')) {
        if($('#email').val() != '' && $('#password').val() != ''){
          $('#myForm').submit();
        }
        else{
          alert('All fields are required');
        }
      }
      else{
        alert('Select user type!');
      }
    }
  </script>
<?php include_once('core/footer.php');?>