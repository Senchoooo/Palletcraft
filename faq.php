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
	        		<h1><strong>FAQ</strong></h1>
	        		<br>
	        		
	        		<div>
	        		<button  style="
    top:50%;
    background-color:white;
    color: #fff;
    border:none; 
    border-radius:10px; 
    padding:15px;
    min-height:30px; 
    min-width: 800px;"><a href="faq_item.php">Q: How to find a item?</a></button>
    </div>
	        		<br>
	        		
	        		<div>
	        		
	        		<button  style="
    top:50%;
    background-color:white;
    color: #fff;
    border:none; 
    border-radius:10px; 
    padding:15px;
    min-height:30px; 
    min-width: 800px;" ><a href="#">Q: How to use the Customization?</a></button>
    </div>
	        		<br>
	        		<div>
	        		<button style="
    top:50%;
    background-color:white;
    color: #fff;
    border:none; 
    border-radius:10px; 
    padding:15px;
    min-height:30px; 
    min-width: 800px;"><a href="return.php">Q: I Decided to cancel my order, Can I get a refund?</a></button>
</div>
	        		<br>
	        		<br>
	        		<br>
	        		<br>
	        		<br>
	        		<br>
	        		<div>
	        		<button  style=" 
    top:70%;
    background-color:white;
    color: #fff;
    border:none; 
    border-radius:10px; 
    padding:15px;
    min-height:30px; 
    min-width: 800px;"><a href="terms.php">Terms of Service</a></button>
    </div>

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