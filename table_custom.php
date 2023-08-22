<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
      

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
   
    <div class="content-wrapper" style="background-color: #ebe9e8;">
      <div class="container" >

        <!-- Main content -->
        <section class="content" >
        
          <div class="row">
            
            <h3 style="font-family:verdana;" class="pull-left"><b>Table Customization</b></h3>
               <div class="form-group">
               
            <hr class="border-dark">
            <h3 class="text-center"><b>Table Shape</b></h3>

                    
              <div class="col-sm-6">
                    
                   
                      
             <div id="selected-shape"></div>
               
                <img id="selected-photo" />


                

           
             </div>
          </div>
               <div class="col-sm-6">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
               
               <form method = "POST" action="table_color.php">
                  <h2>Choices</h2>


                   <label>Select Shape</label>
                  
                  <select name="table" id="table" style="width:50%;" class="form-control form-control-sm rounded-0" onchange="changeddl3(this)" required >
                    <option value="" disabled selected>Select table Shape</option>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM customize_table_shape");
                      $stmt->execute();
                      foreach($stmt as $row){
                        $photo = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
                          
                      ?>
                       
                        
        <option value="<?php echo $row['price']; ?>" data-shape="<?php echo $row['table_shape']; ?>" data-photo="<?php echo $photo; ?>">
                        <?php echo $row['table_shape'] . " - " . $row['price']; ?>
                      </option>

                          
                        
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
                  <input type=hidden name=shape id=shape />




              
                  
                 
                

                
              <!--  

                <label>Color</label>

                  
                 <select name="color_price" id="color_price" style="width:50%;" class="form-control form-control-sm rounded-0" onchange="changeddl1(this)" required >
                    <option value="" disabled selected>Select Color</option>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM customize_ps_color");
                      $stmt->execute();
                      foreach($stmt as $row){
                          
                      ?>
                        <option value="<?php echo $row['price']; ?>" data-othervalue1="<?php echo $row['color'] ?>" ><?php echo $row['color']; ?></option>
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
                <input type=hidden name=othervalue1 id=othervalue1 />

                <br>
                      <label>Quantity</label>
                        <div class="input-group col-sm-5">
                          
                          <span class="input-group-btn">
                            <button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
                          </span>
                          <input type="number" name="quantity" id="quantity" class="form-control input-lg" min="1" max="30" value="1">
                          <span class="input-group-btn">
                              <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
                              </button>
                          </span>
                          
                          <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id"> -->
            

                
                     <!--  </div> -->
                      
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
  $('#table').change(function() {
    var selectedOption = $(this).find('option:selected');
    var shape = selectedOption.attr('data-shape');
    
    var photo = selectedOption.attr('data-photo');
    $('#selected-shape').text(shape);
    
    $('#selected-photo').attr('src', photo);
  });
});
</script>
<script>
$('#table').change(function () {
var shape=$(this).find('option:selected').attr('data-shape');

$('#shape').val(shape);

});
</script>



<script>
$('#flatform_quantity_price').change(function () {
var someothervalue=$(this).find('option:selected').attr('data-someothervalue');

$('#someothervalue').val(someothervalue);

});
</script>
<script>
$('#color_price').change(function () {
var othervalue1=$(this).find('option:selected').attr('data-othervalue1');

$('#othervalue1').val(othervalue1);

});
</script>



  <script>

    function changeddl3($this){
if($this.value>0){ 
$('.table').text('table: '+$('#table option:selected').text());
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