<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, stock_list.id AS stockid, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id LEFT JOIN stock_list ON stock_list.id=products.pallet_quantity WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();


		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
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
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>

	        		</div>
	        			<div>
	        				<a type="button" class='btn btn-primary btn-md' href="category.php?category=<?php echo $product['cat_slug']; ?>">Go Back</a>
	        				
		            			<h1></h1>

		            		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            	
		            		<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" width="70%" class="zoom" data-magnify-src="images/large-<?php echo $product['photo']; ?>">
		            		<br><br>
		            	
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?php echo $product['prodname']; ?></h1>
		            		<h3><b>&#8369; <?php echo number_format($product['price'], 2); ?></b></h3>
		            		<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>
		            		<h5><b>Stock Available:</b>  <?php echo $product['p_quantity']; ?></h5>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            		<input type="hidden" value="pallet" name="palletwood">
		            		<input type="hidden" value="<?php echo $product['pallet_quantity']; ?>" name="pallet">

		            			<form class="form-inline" id="productForm">
		            			<div class="form-group">
			            			 <label>Quantity:</label>
                          <div class="input-group col-sm-9">
                          	<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">

						
                          <span class="input-group-btn">
                              <button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
                            </span>
                            	  <input type="number" name="quantity" id="quantity" class="form-control input-lg" min="1" max="30" value="1">
                         
                            <span class="input-group-btn">
                                <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
                                </button>
                          </span>
                        </div>
                        <br>
                        <br>
                        <?php
	        			if($product['p_quantity'] == 0){
	        				echo "
	        				<h4><p style='color:red'>Out of Stock!</p></h4>
	        				";
	        			}
	        			else{
	        				echo "
	        					
	        					 <button type='submit' style='background-color: green;' class='btn btn-primary btn-lg'><i class='fa fa-shopping-cart'></i> Add to Cart</button>
	        				";
	        			}
	        		?>
							        
			            		</div>
		            		</form>
		            		
		            		

		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
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

</body>
</html>