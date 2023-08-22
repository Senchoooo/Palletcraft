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
        Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Products</li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
             
              <div class="pull-right">
                <form class="form-inline">
                  <div class="form-group">
                   
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
              <tr>
            
                <th> Customer </th>
                  <th> Design </th>
                                <th>Action</th>
              </tr>
            </thead>
               <tbody>
              <?php
             
              $stmt = $conn->prepare("SELECT design_id,CONCAT(firstname,' ',lastname)name,sd.description FROM save_design sd INNER JOIN users u ON u.id=sd.user_id $where ");
              $stmt->execute();
                {
                  echo '<tr class="record">';
                    echo '<td><div align="center">'.$row['name'].'</div></td>';
                      echo '<td><div align="center">'.$row['design_id'].'</div></td>';
                                    echo '<td><div align="center"><a rel="facebox" href="'.$row['description'].'"><i class="fa fa-search fa-lg "></i>View</a></div></td>';

                  echo '</tr>';
                }
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
    <?php include 'includes/products_modal.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>
