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
	        
	        		<div style="overflow-x:auto ;"  class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Customization History</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table style="overflow-x:auto ;"  class="table table-bordered" id="example1">
	        					<thead>
	        						
	        						
	        						<th style="width:15%">Date</th>
	        						<th style="width:15%">Transaction#</th>
	        						
	        						<th style="width:15%">Status</th>
	        						<th style="width:15%">Full Details</th>
	        						
	        					</thead>
	        					<tbody>
	        					<?php
	        						$conn = $pdo->open();

	        						try{
	        							$stmt = $conn->prepare("SELECT * FROM customization_order WHERE user_id=:user_id ORDER BY order_date DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        									
	        									// $status = ($row['status']=='1') ? '<span class="label label-danger">peding</span>' : '<span class="label label-danger"></span>';

	        									// $status1 = ($row['status']=='2') ? '<span class="label label-success">Approved</span>' : '<span class="label label-danger"></span>';
	        									// $status2 = ($row['status']=='3') ? '<span class="label label-success">Out for Delivery</span>' : '<span class="label label-danger"></span>';
	        									// $status3 = ($row['status']=='4') ? '<span class="label label-success">Received</span>' : '<span class="label label-danger"></span>';
	        								
	        								echo "
	        									<tr>
	        										  

	        										<td style='width:10%'>".date('M d, Y', strtotime($row['order_date']))."</td>
	        										<td style='width:10%'>".$row['confirmation']."</td>
	        										
	        								<td style='width:9%'><span class='label label-success'>".$row['order_status']."</span></td>

	        										<td style='width:9%'><button class='btn btn-sm btn-flat btn-info custom' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        										 
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
	        <!-- 	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div> -->
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
  $(document).on('click', '.custom', function(e){
    e.preventDefault();
    $('#customerps').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'custom_transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#customedate').html(response.customedate);
        $('#custom').html(response.custom);
        $('#customerorderlist').prepend(response.customerorderlist);
        $('#totalprice').html(response.totalprice);
      }
    });
  });

  $("#customerps").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
</body>
</html>