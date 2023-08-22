<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php 
   $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

  $conn = $pdo->open();
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales</li>
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
             <!-- <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="report_print.php">
                  <div class="input-group"> -->
                    <!-- <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div> -->
                  <!--   <input type="date" class="form-control pull-right col-sm-8" id="" name="date_range"> -->
                     <!-- <input type="date" class="form-control form-control-sm rounded-0" id="reservation" name="date_range" value="<?= $today ?>" required="required"> -->

                  <!-- </div> -->
                  <!--  <div class="form-group">
                                    <button class="btn btn-sm btn-flat btn-primary bg-gradient-primary"><i class="fa fa-filter"></i> Filter</button>
                                </div> -->
                <!--   <button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
                </form>
              </div>
            </div> -->
            <div class="box-header with-border">
             <!--  <div class="pull-right">
                   <form class="form-inline">
                  <div class="form-group">
                    <label>Category: </label>
                    <select class="form-control input-sm" id="select_category">
                      <option value="0">ALL</option>
                      <?php
                        $conn = $pdo->open();

                        $stmt = $conn->prepare("SELECT * FROM sales");
                        $stmt->execute();

                        foreach($stmt as $crow){
                         
                          echo "
                            <option value='".$crow['order_status']."' ".$selected.">".$crow['order_status']."</option>
                          ";
                        }

                        $pdo->close();
                      ?>
                    </select>
                  </div>
                </form>
              
              </div> -->
            </div>
            <div class="box-body">
             <table class="table table-bordered" id="example1">
                    <thead>
                      
                      
                      <th>Date</th>
                      <th>Buyer Name</th>
                      <th>Transaction#</th>
                      <th>Amount</th>
                     
                      
                    </thead>
                    <tbody>
                    <?php
                      $conn = $pdo->open();
                     try{
                       $stmt = $conn->prepare("SELECT *,  sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id  ORDER BY sales_date DESC");
                        
                      $stmt->execute();
                      foreach($stmt as $row){
                      $name = $row['firstname'].' '.$row['lastname'];
                    }

                      $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id  WHERE sales_date=:sales_date");
                $stmt->execute(['sales_date'=>$today]);
                      foreach($stmt as $row){
                        
                      
                

                $total = 0;
                
                  
                  $subtotal = $row['price']*$row['quantity'];
                  $total += $subtotal;
                 
                          echo "
                            <tr>
                                

                              <td>".date('M d, Y', strtotime($row['sales_date']))."</td>
                              <td>".$name."</td>
                              <td>".$row['confirmation']."</td>
                              <td>&#8369; ".number_format($total, 2)."</td>

                           

                              
                               
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
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/order_modal.php'; ?>
    <?php include '../includes/profile_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
  //Date picker
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
<script>
  $(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
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
  function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'order_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.salesid').val(response.id);
      $('#update').val(response.name);
      $('.salesname').html(response.name);
      $('.salesid').val(response.salesid);
    }
  });
}
$(function(){
  $(document).on('click', '.transact', function(e){
    e.preventDefault();
    $('#transaction').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#date').html(response.date);
        $('#date1').html(response.dateDelivered);
        $('#ordertype').html(response.ordertype);
        $('#deliveryaddress').html(response.deliveryaddress);
        $('#salesid').val(response.salesid);
        $('#transid').html(response.transaction);
        $('#detail').prepend(response.list);
        $('#total').html(response.total);
      }
    });
  });

  $("#transaction").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});

</script>
</body>
</html>
