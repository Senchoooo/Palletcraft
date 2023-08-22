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
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Table Customization History</b></h4>
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
	        							$stmt = $conn->prepare("SELECT * FROM customize_table_order WHERE user_id=:user_id ORDER BY order_date1 DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);
	        							foreach($stmt as $row){
	        									
	        									$status = ($row['status']=='1') ? '<span class="label label-danger">peding</span>' : '<span class="label label-danger"></span>';

	        									$status1 = ($row['status']=='2') ? '<span class="label label-success">Approved</span>' : '<span class="label label-danger"></span>';
	        									$status2 = ($row['status']=='3') ? '<span class="label label-success">Out for Delivery</span>' : '<span class="label label-danger"></span>';
	        									$status3 = ($row['status']=='4') ? '<span class="label label-success">Received</span>' : '<span class="label label-danger"></span>';
	        								
	        								echo "
	        									<tr>
	        										  

	        										<td>".date('M d, Y', strtotime($row['order_date1']))."</td>
	        										<td>".$row['confirmation']."</td>
	        										<td>&#8369;" . $row["total_price"] . "</td>
	        										<td>
	        										".$status."
	        										".$status1."
	        										".$status2."
	        										".$status3."

	        										</td>

	        										<td><button class='btn btn-sm btn-flat btn-info tablecustom' data-id='".$row['id']."'><i class='fa fa-search'></i> View</button></td>
	        										 
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
  $(document).on('click', '.tablecustom', function(e){
    e.preventDefault();
    $('#tablecustomerdone').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'table_transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#tablecustomerreceivedate').html(response.tablecustomerreceivedate);
        $('#tablereceivedate1').html(response.tablereceivedate1);
        $('#tablereceivecustomer').html(response.tablereceivecustomer);
        $('#tablecustomerreceivelist').prepend(response.tablecustomerreceivelist);
        $('#total').html(response.total);
      }
    });
  });

  $("#tablecustomerdone").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});
</script>
</body>
</html>