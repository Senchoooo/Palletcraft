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
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		      <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM system_info WHERE id=:id");
                      $stmt->execute(['id'=>1]);
                      foreach($stmt as $row){
                   
                    		echo "
	       					
                  <td>".$row['description']."</td>


	       						";

                    }
                }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar2.php'; ?>
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