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

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper" style="background-color: #ebe9e8;">
	    <div class="container" >

	      <!-- Main content -->
	      <section class="content" >
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1><strong>PAYMENTS AND RETURN POLICIES</strong></h1>
	        		
	        	
<br>
						<h3><strong>PURCHASE AND PAYMENTS</strong></h3>
							<br>
							
						<p>3. Pallet Crafts supports one or more of the following payment methods in each country it operates:
							<br>
<strong><h5>(i)         G-cash</h5></strong>
Customers must pay at least 30% of the purchased items using the G-cash payment method.
 <br>
 <h5><strong>(ii)         Cash on Delivery (COD)</strong></h5>

<p>

Pallet Crafts provides COD services. Buyers may pay the 30% down payments directly upon receipt of the purchased item and the remaining upon receiving the item.  </p>
						<h3><strong>CANCELLATION,RETURN, AND REDUND</strong></h3>
						<br> 
						<p>Pallet Crafts does not allow the cancellation, return and refund process because the materials used are not refundable. </p>
						

	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>