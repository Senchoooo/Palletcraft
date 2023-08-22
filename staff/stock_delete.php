<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$name = $_POST['name'];
		$date = date('Y-m-d');

		try{
			$stmt = $conn->prepare("UPDATE stock_list SET quantity=quantity-:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$quantity, 'id'=>$id]);
			
			$stmt = $conn->prepare("INSERT INTO stockout_history (name, quantity, status, date_stockout) VALUES (:name, :quantity, :status, :date_stockout)");
			$stmt->execute(['name'=>$name, 'quantity'=>$quantity, 'status'=>'Stock Out', 'date_stockout'=>$date ]);
				

			
			$_SESSION['success'] = 'inventory updated successfully';
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