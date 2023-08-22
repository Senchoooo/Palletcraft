<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">
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

	        			<div class="box-body">
	        				<div class="col-sm-3">

	        					<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
	        				</div>
	        				
	        				<div class="col-sm-9">

	        					<div class="row">
	        						<div class="col-sm-6">
	        							<h4><strong>Name:</strong> <?php echo $user['firstname'].' '.$user['lastname']; ?></h4>
	        							<h4><strong>Email:</strong> <?php echo $user['email']; ?></h4>
	        							<h4><strong>Gender:</strong> <?php echo $user['gender']; ?></h4>
	        							<h4><strong>Date of Birth:</strong> <?php echo $user['date_of_birth']; ?></h4>
	        							<h4><strong>Contact Info:</strong> <?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
	        							<h4><strong>Address:</strong> <?php echo (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h4>
	        							
	        							<h4><strong>Member Since:</strong> <?php echo date('M d, Y', strtotime($user['created_on'])); ?></h4>
	        						</div>
	        							<span class="pull-right">
	        									<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
	        								</span>
	        						<div class="col-sm-9">
	        							<h5>
	        								
	        							</h5>
	        							<h5></h5>
	        							<h5></h5>
	        							<h5></h5>
	        							<h5></h5>
	        							<h5></h5>
	        							
	        							
	        							<h5></h5>
	        							
	        						</div>
	        					</div>
	        				</div>
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