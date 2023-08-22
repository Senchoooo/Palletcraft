<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$stock_id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$name = $_POST['name'];
		$reason = $_POST['reason'];
		$date = date('Y-m-d');

$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stock_list WHERE id=:id");
$stmt->execute(['id'=>$stock_id]);
$row = $stmt->fetch();
if($row['numrows'] !== 0){
  if ($quantity <= 0) {
    $_SESSION['error'] = 'The quantity to be deducted must be greater than 0';
  } elseif ($quantity > $row['quantity']) {
       $_SESSION['error'] = 'The quantity of the Raw materials pallet to be deducted is greater than the current stock quantity, Add stock first';
  } else {
    $new_quantity = $row['quantity'] - $quantity;
    $stmt = $conn->prepare("UPDATE stock_list SET quantity=:new_quantity WHERE id=:id");
    if ($stmt->execute(['new_quantity'=>$new_quantity, 'id'=>$stock_id])) {
    	$stmt = $conn->prepare("INSERT INTO stockout_history (materials_name, stockout_quantity, source, status, date_stockout) VALUES (:materials_name, :stockout_quantity, :source, :status, :date_stockout)");
			$stmt->execute(['materials_name'=>$name, 'stockout_quantity'=>$quantity, 'source'=>$reason, 'status'=>'Stock Out', 'date_stockout'=>$date ]);
				

			
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
		$_SESSION['error'] = 'Fill up edit inventory form first';
	}

	header('location: inventory.php');

?>