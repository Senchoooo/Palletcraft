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
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
	        			</div>
	        			<div   class="box-body">
	        				<table style="overflow-x:auto ;"  class="table table-bordered" id="example1">
	        					<thead style="width: 50%;">
	        						
	        						
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
	        							$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        								$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
	        								$stmt2->execute(['id'=>$row['id']]);
	        								$total = 0;
	        								foreach($stmt2 as $row2){
	        									$subtotal = $row2['price']*$row2['quantity'];
	        									$total += $subtotal;
	        									// 		$status = ($row['status']=='1') ? '<span class="label label-danger">peding</span>' : '<span class="label label-danger"></span>';

	        									// $status1 = ($row['status']=='2') ? '<span class="label label-success">Approved</span>' : '<span class="label label-danger"></span>';
	        									// $status2 = ($row['status']=='3') ? '<span class="label label-success">Out for Delivery</span>' : '<span class="label label-danger"></span>';
	        									// $status3 = ($row['status']=='4') ? '<span class="label label-success">Received</span>' : '<span class="label label-danger"></span>';
	        								}
	        								echo "
	        									<tr>
	        										  

	        										<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
	        										<td>".$row['confirmation']."</td>
	        										<td>&#8369; ".number_format($total, 2)."</td>
	        										<td><span class='label label-success'>".$row['order_status']."</span></td>

	        										<td><button class='btn btn-sm btn-flat btn-info customer' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        										 
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
	$(document).on('click', '.customer', function(e){
		e.preventDefault();
		$('#customer').modal('show');
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'transaction.php',
			data: {id:id},
			dataType: 'json',
			success:function(response){
				$('#customerdate').html(response.customerdate);
				$('#customertransid').html(response.customer);
				$('#customerdetail').prepend(response.customerlist);
				$('#customertotal').html(response.total);
			}
		});
	});

	$("#customer").on("hidden.bs.modal", function () {
	    $('.prepend_items').remove();
	});
});
</script>
</body>
</html>