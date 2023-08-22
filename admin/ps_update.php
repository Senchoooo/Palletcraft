<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$customid = $_POST['customid'];
		$stockid = $_POST['stockid'];

		$status = $_POST['status'];
		$pallet = $_POST['pallet'];
		$pquantity = $_POST['pquantity'];
		$source = $_POST['source'];
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d h:i:sa');
		$date1 = date('Y-m-d h:i:sa');

$stmt = $conn->prepare("UPDATE customization_order SET order_received1=:order_received1, order_status=:order_status WHERE id=:id");
			$stmt->execute(['order_received1'=>$date,'order_status'=>$status, 'id'=>$customid]);
$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stock_list WHERE id=:id");
$stmt->execute(['id'=>$stockid]);
$row = $stmt->fetch();
if($row['numrows'] !== 0){
  if ($pquantity <= 0) {
    $_SESSION['error'] = 'The quantity to be deducted must be greater than 0';
  } elseif ($pquantity > $row['quantity']) {
       $_SESSION['error'] = 'The quantity of the Raw materials pallet to be deducted is greater than the current stock quantity, Add stock first';
  } else {
    $new_quantity = $row['quantity'] - $pquantity;
    $stmt = $conn->prepare("UPDATE stock_list SET quantity=:new_quantity WHERE id=:id");
    if ($stmt->execute(['new_quantity'=>$new_quantity, 'id'=>$stockid])) {
    	$stmt = $conn->prepare("INSERT INTO stockout_history (materials_name, stockout_quantity, source, status, date_stockout) VALUES (:materials_name, :stockout_quantity, :source, :status, :date_stockout)");
			$stmt->execute(['materials_name'=>$pallet, 'stockout_quantity'=>$pquantity, 'source'=>$source, 'status'=>'Stock Out', 'date_stockout'=>$date ]);
				

			
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
		$_SESSION['error'] = 'Fill up Update Status form first';
	}

	header('location: custom_sale1.php');

?>