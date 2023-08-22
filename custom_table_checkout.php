<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 <script>
					function text(x) {
						if (x == 0) document.getElementById("mycode").style.display = "block";
						else document.getElementById("mycode").style.display = "none";
						return;
					}
				</script>
<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "101913406029570");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	

	<?php include 'includes/navbar.php'; ?>


	<form method="POST" action="ps_sale.php">

	<?php
		

	
		
	function createRandomPassword() {
					$chars = "abcdefghijkmnopqrstuvwxyz023456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation = createRandomPassword1();
				
					function createRandomPassword1() {
					$chars = "ABCDEFGHIJKLNOPQRSTUVWXYZ1234567";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation1 = createRandomPassword1();
				
				
		?>

	 
	  <div class="content-wrapper" style="background-color: #ebe9e8;">
	    <div class="container" >

	      <!-- Main content -->
	      <section class="content" >
	        <div class="row">
	        	<div class="col-sm-6">
	        				<a type="button" class='btn btn-primary btn-md' href="table_custom.php">Go Back</a>
	        			<div>
	        				<div class="card-body"></div>
            <h3 class="text-center"><b>Checkout</b></h3>
            <hr class="border-dark">
	        				
	        				
		            			<h1></h1>

		            		</div>
	        		<label for="table">Table</label>
	        		<input type="text" id="customname" name="customname" style="width:50%;" class="form-control form-control-sm rounded-0" value="Table" readonly>
	        		<label for="confirmation">Transaction No.</label>
                 <input type="confirmation" id="confirmation" name="confirmation" style="width:50%;" class="form-control form-control-sm rounded-0" value=<?php echo $confirmation; ?> readonly>

				

			

  <?php
    if(isset($_POST['submit'])){
    $conn = $pdo->open();
    		$detail = $_POST['detail'];
    		$color = $_POST['color'];
        $table = $_POST['table'];
        $color_price = $_POST['color_price'];
        $quantity = $_POST ['quantity']
        ?>
               <?php

  $total = $table+$color_price;
 $subtotal = $total*$quantity;
  $downpayment = ($total * 0.3)  ;
  ?>
<?php 
    }
    $pdo->close();
?>
        <label>Detail</label>
          <input type="text" id="detail" name="detail" style="width:50%;" class="form-control form-control-sm rounded-0" value=<?php echo $detail; ?> readonly>
        
        <label>Color:</label>
       <input type="text" id="color" name="color" style="width:50%;" class="form-control form-control-sm rounded-0" value=<?php echo $color; ?> readonly>
       
       <label>Quantity</label>
									 <input type="text" id="quantity" name="quantity" style="width:50%;" class="form-control form-control-sm rounded-0" value=<?php echo $quantity; ?> readonly>
       

<br>
                 <br>
	        	</div>
	        	 	<div class="col-sm-6">
	        		<br>
	        		    <br> 
	        		    <br> 	 
	        		    <br> 
	        		    <br> 
                        
                   <!--  	<h3><b>Order type:</b></h3>

				  <div class="col-2" style="text-align:center;">
					<div class="input-group">
						 <div class="form-group col mb-0"> -->
                    <!--  <h3 class="text-center"><b>Order type</b></h3> -->
                   <!--  </div>
						<div class="p-t-10">

							<label  class="form-check-label">
								<input style="display: none;" type="radio" name="ordertype" class="form-control form-control-sm rounded-0" value="delivery" onclick="text(0)" checked />
								<span  class="form-control form-control-sm rounded-0" style="border: px solid; width: 100%;  height: 25px; font-size: 9pt; overflow: hidden; text-align: center;">Delivery</span>
							</label>
							<label  class="form-check-label">
								<input style="display: none;" type="radio" name="ordertype" class="form-control form-control-sm rounded-0" value="pickup" onclick="text(1)" />
								<span  class="form-control form-control-sm rounded-0" style="border: 1px solid #ccc; width: 70px; height: 25px;  overflow: hidden;  text-align: center; font-size: 9pt;  top: 50%; margin-top: -7.5px;">Pick Up</span>
								
							</label>
							
						</div>
						
					</div>
					
				</div>
				  
				  	<div  id="mycode">
				  		
<select name="province" id="province" style="width:40%;" class="form-control form-control-sm rounded-0">
    <option value="" disabled selected="selected">Select Province</option>
  </select>
 <br>
<select name="town" id="town" style="width:40%;" class="form-control form-control-sm rounded-0">
    <option value="" disabled selected="selected">Select Town</option>
  </select>
<br>
<select name="barangay" id="barangay" style="width:40%;" class="form-control form-control-sm rounded-0">
    <option value="" disabled selected="selected">Select Barangay</option>
  </select> -->

   
			  		
				  	
                           		<input type="hidden" name="total" id="total" value=<?php echo $subtotal; ?> readonly> 
													<h5><b>Total: &#8369; <?= number_format($subtotal,2) ?></b></h5>
													<input type="hidden" name="downpayment" id="downpayment" value=<?php echo $downpayment; ?> readonly> 
													  <h5><b>30% of the Total amount: &#8369; <?= number_format($subtotal*0.3,2) ?></b></h5>
                       <div class="alert alert-warning">
                          Note: Pallet Crafts does not allow the cancellation, return, and refund process because the materials used are not refundable. For paying at least 30% of the total amount the Payment is through Gcash, you can send the receipt or Screenshot through Messenger. Thank you!  
                          
                          <div style="padding-bottom: 20px;">
                          	 <img style="" class="pull-left"  src="images/gcash.png" width="100" height="60">
                          	<h4 style="padding-top: 20px;">09458171954</h4>
                         
                          </div>
                          
            		</div>
            		<a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
	        		<!-- <button type="submit" name="submit" style="background-color: green;" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i> Confirm Order</button> -->
	        	</div>
	        	</div>
	        </div>
	      </section>
	      </form>
	      
	     
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/checkout_modal2.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script -->
        <script type="text/javascript">
            
            var my_handlers = {

           

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
               
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#province').ph_locations('fetch_list');
            });
        </script>

</body>
</html>