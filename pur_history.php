<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
		<table style=" background-color: #fff;">
  <tr>
    <th>Date</th>
    <th>Buyer Name</th>
    <th>Transaction #</th>
    <th>Ammount</th>
    <th>Full Details</th>
  </tr>
  <tr>
    <td>August 5, 2022</td>
    <td>Maria Anders</td>
    <td>PAY-1RT494832H294925RLLZ7TZA</td>
    <td>$999.9</td>
     <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
  </tr>
  <tr>
    <td>August 5, 2022</td>
    <td>Francisco Chang</td>
    <td>PAY-1RT494832H294925RLLZ7TZA</td>
    <td>$999.9</td>
     <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
  </tr>
  <tr>
    <td>August 5, 2022</td>
    <td>Roland Mendel</td>
    <td>PAY-1RT494832H294925RLLZ7TZA</td>
    <td>$999.9</td>
     <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
  </tr>
  <tr>
    <td>August 5, 2022</td>
    <td>Helen Bennett</td>
    <td>PAY-1RT494832H294925RLLZ7TZA</td>
    <td>$999.9</td>
     <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
  </tr>
  <tr>
    <td>August 5, 2022</td>
    <td>Yoshi Tannamuri</td>
    <td>PAY-1RT494832H294925RLLZ7TZA</td>
    <td>$999.9</td>
     <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
  </tr>
  <tr>
    <td>August 5, 2022</td>
    <td>Giovanni Rovelli</td>
    <td>PAY-1RT494832H294925RLLZ7TZA</td>
    <td>$999.9</td>
     <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['salesid']."'><i class='fa fa-search'></i> View</button></td>
  </tr>
</table>
			
	  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>