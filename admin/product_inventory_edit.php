<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$prodid = $_POST['id'];
		$stockid = $_POST['stockid'];
		$name = $_POST['name'];
		$slug = slugify($name);
		
		$prd_quantity = $_POST['prd_quantity'];
		$pallet = $_POST['pallet'];
		$palleta = $_POST['palleta'];
		date_default_timezone_set("Asia/Manila");
		$datestock = date('Y-m-d h:i:sa');

		$conn = $pdo->open();
		  $stmt = $conn->prepare("UPDATE products SET p_quantity=p_quantity+:p_quantity, pallet_quantity=pallet_quantity+:pallet_quantity WHERE id=:id");
			$stmt->execute([ 'p_quantity'=>$prd_quantity,
			'pallet_quantity'=>$pallet, 'id'=>$prodid]);
$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stock_list WHERE id=:id");
$stmt->execute(['id'=>$stockid]);
$row = $stmt->fetch();
if($row['numrows'] !== 0){
  if ($pallet <= 0) {
    $_SESSION['error'] = 'The quantity to be deducted must be greater than 0';
  } elseif ($pallet > $row['quantity']) {
    $_SESSION['error'] = 'The quantity of the Raw materials pallet to be deducted is greater than the current stock quantity, Add stock first';
  } else {
    $new_quantity = $row['quantity'] - $pallet;
  
    $stmt = $conn->prepare("UPDATE stock_list SET quantity=:new_quantity WHERE id=:id");
    if ($stmt->execute(['new_quantity'=>$new_quantity, 'id'=>$stockid])) {
    	$stmt = $conn->prepare("INSERT INTO stockout_history (materials_name, stockout_quantity, source, status, date_stockout) VALUES (:materials_name, :stockout_quantity, :source, :status, :date_stockout)");
			$stmt->execute(['materials_name'=>$palleta, 'stockout_quantity'=>$pallet, 'source'=>$name, 'status'=>'Stock Out', 'date_stockout'=>$datestock ]);
			

			
			$_SESSION['success'] = 'inventory updated successfully';
      // Update successful
    } else {
      $_SESSION['error'] = 'An error occurred while updating the stock quantity';
    }
  }
} else {
  $_SESSION['error'] = 'The stock item with the specified ID was not found';
}
		
		try{
		
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products_inventory.php');

?>