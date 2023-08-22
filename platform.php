<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
      
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <?php include 'includes/navbar.php'; ?>
   
    <div class="content-wrapper" style="background-color: #ebe9e8;">
      <div class="container" >

        <!-- Main content -->
        <section class="content" >
          <a type="button" class='btn btn-primary btn-md' href="ps_custom.php">Go Back</a>
         

          <div class="row">
             <h3 style="font-family:verdana;" class="pull-left"><b> Plant Stand Customization</b></h3>
               <div class="form-group">
               
            <hr class="border-dark">
            <h3 class="text-center"><b>Plant Stand Platform</b></h3>

                    
              <div class="col-sm-6">
                    
                   
         
                      


                
               
                <img id="selected-image" />

           
             </div>
          </div>
               <div class="col-sm-6">
           
               
               <form method="POST" action="ps_color.php">
                  

     <?php
    if(isset($_POST['submit'])){
    $conn = $pdo->open();
        $layer = $_POST['layer'];
        $layer_price = $_POST['layer_price'];
        
        
     }
            $pdo->close();
            ?>
             <label>Details</label>
          <input type="text" id="layer" name="layer" style="width:50%;" class="form-control form-control-sm rounded-0" value=<?php echo $layer; ?> readonly>
          <input type="hidden" name="layer_price" value=<?php echo $layer_price; ?>>
          <br>
          <p><b>Price:</b> <?php echo $layer_price; ?></p>


          <h3>Select Platform Quantity</h3>


                   <div class="divprice" class="price-style"></div>
                      <label>Platform Quantity</label>
                  
                  <select name="flatform_quantity_price" id="flatform_quantity_price" style="width:50%;" class="form-control form-control-sm rounded-0" onchange="changeddl2(this)" required >
                    <option value="" disabled selected>Select Platform</option>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM customize_flatform_quantity where layer = :layer");
                      $stmt->execute(['layer' => $layer]);
                      $layer = $stmt->fetch();

                      foreach($stmt as $row){
                         $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                          
                      ?>
                    <option value="<?php echo $row['price']; ?>" data-platform="<?php echo $row['flatform_quantity'] ?>"data-image="<?php echo $image; ?>" ><?php echo $row['flatform_quantity']; ?></option>

                      <?php
                        
                     
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </select>
                <div class="divprice" class="price-style"></div>
                <input type=hidden name=platform id=platform />


              
                  
                 <br>
                
                   <div> <?php
                if(isset($_SESSION['user'])){
                  echo "
                    <button type='submit' name='submit' class='btn btn-primary btn-md'><i class=''></i>Next</button>
                  ";
                }
                else{
                  echo "
                    <h4>You need to <a href='login.php'>Login</a> to Order.</h4>
                  ";
                }
              ?></div>
              
                      
                    
                   </form>
                 
              
            </div>
        </section>
       
      </div>
    </div>
  
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('#add').click(function(e){
    e.preventDefault();
    var quantity = $('#quantity').val();
    quantity++;
    $('#quantity').val(quantity);
  });
  $('#minus').click(function(e){
    e.preventDefault();
    var quantity = $('#quantity').val();
    if(quantity > 1){
      quantity--;
    }
    $('#quantity').val(quantity);
  });

});
</script>
<script>
$(document).ready(function() {
  $('#flatform_quantity_price').change(function() {
    var selectedOption = $(this).find('option:selected');
    var platform = selectedOption.attr('data-platform');
    
    var image = selectedOption.attr('data-image');
    $('#selected-platform').text(platform);
    
    $('#selected-image').attr('src', image);
  });
});
</script>


<script>
$('#layer_price').change(function () {
var layer=$(this).find('option:selected').attr('data-layer');
$('#layer').val(layer);


});
</script>
<!-- <script>
$(document).ready(function() {
  $('#layer_price').change(function() {
    var selectedOption = $(this).find('option:selected');
    var displayedImage = selectedOption.attr('displayed-image');
    $('#displayed-image').attr('src', displayedImage);
  });
});
</script> -->

<script>
$('#flatform_quantity_price').change(function () {
var platform=$(this).find('option:selected').attr('data-platform');

$('#platform').val(platform);

});
</script>
<script>
$('#color_price').change(function () {
var othervalue1=$(this).find('option:selected').attr('data-othervalue1');

$('#othervalue1').val(othervalue1);

});
</script>



  <script>

    function changeddl($this){
if($this.value>0){ 
$('.divlayer').text('Layer: '+$('#layer_price option:selected').text());
$($this).next('.divprice').text($this.value>0?("Price: " + $this.value + " ₱"):"");

}
 };
  </script>
    <script >
    function changeddl2($this){
if($this.value>0){ 
$('.divflatform').text('Flatform Quantity: '+$('#flatform_quantity_price option:selected').text());
$($this).next('.divprice').text($this.value>0?("Price: " + $this.value + " ₱"):"");

}
 };
</script>
  <script >
    function changeddl1($this){
if($this.value>0){ 
$('.divcolor').text('Color: '+$('#color_price option:selected').text());
$($this).next('.divprice').text($this.value>0?("Price: " + $this.value + " ₱"):"");

}
 };
</script>




</body>
</html>