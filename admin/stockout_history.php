<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock-Out History
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Inventory</li>
        <li class="active">Stock out History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Materials Name</th>
                  
                  <th>Quantity</th>
                  <th>Detail</th>
                 
                 <th>Status</th>
                  <th>Date Stockin</th>
                  <!-- <th>Full Details</th> -->
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                

                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT *, stockout_history.customid AS stockid FROM stockout_history LEFT JOIN customization_order ON customization_order.id=stockout_history.customid");
                      $stmt->execute();
                      foreach($stmt as $row){

                      $output['date'] = date('M d, Y', strtotime($row['date_stockout']));
                        
                        echo "
                          <tr>
                            <td>".$row['materials_name']."</td>
                            <td>".$row['stockout_quantity']."</td>
                            <td>".$row['source']."</td>
                            <td>".$row['status']."</td>
                            <td>".date('M d, Y', strtotime($row['date_stockout']))."</td>
                           
                            
                           
                        ";
                      }


                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
                <!--  <td><button class='btn btn-sm btn-flat btn-info stockout' data-id='".$row['stockid']."'><i class='fa fa-search'></i> View</button></td> -->
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/stockin_modal.php'; ?>
    <?php include '../includes/profile_modal.php'; ?>
    


</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit1', function(e){
    e.preventDefault();
    $('#edit1').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

 $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});


$(function(){
  $(document).on('click', '.stockout', function(e){
    e.preventDefault();
    $('#inventory').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'inventory_transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#inventorydate').html(response.inventorydate);
       
        $('#inventoryid').val(response.inventoryid);
        $('#stockid').html(response.stock);
        $('#inventorylist').prepend(response.inventorylist);
        $('#total').html(response.total);
      }
    });
  });

  $("#inventory").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'inventory_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.stockid').val(response.id);
      $('#edit_name').val(response.name);
      $('#edit_stock').val(response.name);
      $('#edit_quantity').val(response.name);
      $('#edit_number').val(response.name);
      $('.stockname').html(response.name);
    }
  });
}
</script>
</body>
</html>
