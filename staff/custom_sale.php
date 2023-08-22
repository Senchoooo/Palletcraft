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
        Pending Plant Stand Sale History
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
                 <div class="box-header with-border">
              <div class="pull-right">
                <form method="POST" class="form-inline" action="pending_print.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
                  </div>
                  <button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
                </form>
              </div>
            </div>
            <div class="box-header with-border">
              <div class="pull-right">
              
              </div>
            </div>
            <div class="box-body">
             <table class="table table-bordered" id="example1">
                    <thead>
                      
                      
                      <th>Date</th>
                      <th>Buyer Name</th>
                      <th>Transaction#</th>
                      <th>Item Name</th>
                      <th>Status</th>
                      
                      <th>Action</th>
                      
                    </thead>
                    <tbody>
                    <?php
                      $conn = $pdo->open();
                     

                      try{
                        $stmt = $conn->prepare("SELECT *, customization_order.id AS customid FROM customization_order LEFT JOIN users ON users.id=customization_order.user_id WHERE customization_order.ordertype = 'pickup' ORDER BY order_date DESC");
                      $stmt->execute();
                        $total = 0;




                        foreach($stmt as $row){
                          
                        //   $status = ($row['status']) ? '<span class="label label-danger">Pending</span>' : '<span class="label label-danger">N/A</span>';
                        // $pending = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        

                          

                          echo "
                            <tr>
                                

                              <td>".date('M d, Y', strtotime($row['order_date']))."</td>
                              <td>".$row['firstname'].' '.$row['lastname']."</td>
                              <td>".$row['confirmation']."</td>
                                
                              
                               <td>".$row['name']."</td>
                             

                           <td><span class='label label-success'>".$row['order_status']."</span></td>
                              <td><button class='btn btn-sm btn-flat btn-info custom' data-id='".$row['customid']."'><i class='fa fa-search'></i> View</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['customid']."'><i class='fa fa-trash'></i> Delete</button></td>
                               
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
    <?php include 'includes/plantstand_order_modal.php'; ?>
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
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
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
    url: 'customize_order_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.customid').val(response.id);
      $('.ordertype').val(response.ordertype);
      $('#update').val(response.name);
      $('.customname').html(response.name);
      
    }
  });
}
$(function(){
  $(document).on('click', '.custom', function(e){
    e.preventDefault();
    $('#customize').modal('show');
    var id = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'custom_transact.php',
      data: {id:id},
      dataType: 'json',
      success:function(response){
        $('#plantstanddate').html(response.plantstanddate);
        $('#customtype').html(response.customtype);
        $('#customaddress').html(response.customaddress);
        $('#customid').val(response.customid);
        $('#customizeid').html(response.customize);
        $('#customlist').prepend(response.customlist);
        $('#total').html(response.total);
      }
    });
  });

  $("#customize").on("hidden.bs.modal", function () {
      $('.prepend_items').remove();
  });
});

</script>
</body>
</html>
