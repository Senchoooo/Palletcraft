<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
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
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Chair Customization History</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered" id="example1">
	        					<thead>
	        						
	        						
	        						<th>Date</th>
	        						<th>Transaction#</th>
	        						<th>Amount</th>
	        						<th>Status</th>
	        						<th>Full Details</th>
	        						
	        					</thead>
	        					<tbody>
	        					<?php
	        						$conn = $pdo->open();

	        						try{
	        							$stmt = $conn->prepare("SELECT * FROM customize_chair_order WHERE user_id=:user_id ORDER BY order_date2 DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        									
	        									$status = ($row['status']=='1') ? '<span class="label label-danger">peding</span>' : '<span class="label label-danger"></span>';

	        									$status1 = ($row['status']=='2') ? '<span class="label label-success">Approved</span>' : '<span class="label label-danger"></span>';
	        									$status2 = ($row['status']=='3') ? '<span class="label label-success">Out for Delivery</span>' : '<span class="label label-danger"></span>';
	        									$status3 = ($row['status']=='4') ? '<span class="label label-success">Received</span>' : '<span class="label label-danger"></span>';
	        								
	        								echo "
	        									<tr>
	        										  

	        										<td>".date('M d, Y', strtotime($row['order_date2']))."</td>
	        										<td>".$row['confirmation']."</td>
	        										<td>&#8369;" . $row["total_price"] . "</td>
	        										<td>
	        										".$status."
	        										".$status1."
	        										".$status2."
	        										".$status3."

	        										</td>

	        										<td><button class='btn btn-sm btn-flat btn-info customchair' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        										 
	        									</tr>
	        								";
	        							}

	        						}
        							catch(PDOException $e){
										echo "There is some problem in connection: " . $e->getMessage();
									}

	        						$pdo->close();
	        					?>
	        					</tbody>
	        				</table>
	        				
	        			</div>
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
  	<?php include 'includes/profile_modal.php'; ?>
  	<?php include 'includes/product_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.customchair', function(e){
    e.preventDefault();
    $('#customerchairdone').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'chair_transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#chaircustomreceivedate').html(response.chaircustomreceivedate);
        $('#chairreceivedate1').html(response.chairreceivedate1);
        $('#chaircustom').html(response.chaircustom);
        $('#chaircustomreceivelist').prepend(response.chaircustomreceivelist);
        $('#total1').html(response.total1);
      }
    });
  });

  $("#customerchairdone").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
</body>
</html>