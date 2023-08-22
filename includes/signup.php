<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

 // if(isset($_SESSION['captcha'])){
  //  $now = time();
  //  if($now >= $_SESSION['captcha']){
    // unset($_SESSION['captcha']);
  //  }
  //}

?>
<?php include 'includes/header.php'; ?>
<body  class="hold-transition register-page">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
      <h4 class="login-box-msg"><b>Register a new membership</b></h4>
    

    	<form class="form-horizontal" method="POST" action="register.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Password must contain at least one number, One uppercase and one lowercase letter, and atleast 6 or more characters." name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">First name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Last name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="region" class="col-sm-3 control-label">Region</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="region" name="region" required></select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="province" class="col-sm-3 control-label">Province</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="province" name="province" required></select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="city" name="city" required></select>
                    </div>
                </div>
                  <div class="form-group">
                    <label for="barangay" class="col-sm-3 control-label">Barangay</label>

                    <div class="col-sm-9">
                      <select  class="form-control" id="barangay" name="barangay"  required></select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact No.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact No." required>
                    </div>
                </div>
              
           

         <div class="row">
          <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="add"><i class="fa fa-pencil"></i> Sign Up</button>
            </div>
          </div>

            <a href="login.php">I already have a membership</a><br>
            <a href="index.php"><i class="fa fa-home"></i> Home</a>

            </div>
            
              </form>
      <br>
      
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script -->
        <script type="text/javascript">
            
            var my_handlers = {

                fill_provinces:  function(){

                    var region_code = $(this).val();
                    $('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
                    
                },

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
                $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#region').ph_locations('fetch_list');
            });
        </script>


</body>
</html>