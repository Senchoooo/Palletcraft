<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


 <?php include 'includes/navbar.php'; ?>

<?php
session_start();
 
if($_SESSION['type']=='Administrator'){ $where =" "; ?>

<?php include('include/admin/header.php');?>
    <section>
    <div class="container">
      <div class="row">
        <?php include('include/admin/sidebar.php');?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php }else {  ?> 
<?php  
 include('include/home/header_c.php'); 
$cid =$_SESSION['id'];
 $where =" WHERE customer_id='$cid'";?>
 
<?php }?>
</head>

                    

          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Save Design</h2>
                        
          
                    <label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" /><br>
       <div class="table-responsive">          

                        <table class="table table-bordered table-responsive">
            <thead>
              <tr>
            
                <th> Customer </th>
                  <th> Design </th>
               <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
             
              $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT design_id,CONCAT(firstname,' ',lastname)name,sd.description FROM save_design sd INNER JOIN users u ON u.id=sd.customer_id $where ");
              while($row = mysqli_fetch_array($result))
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
              </section>
<?php include('include/admin/footer.php'); ?>