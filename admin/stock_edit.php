<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$name = $_POST['name'];
		
		$date = date('Y-m-d');

		try{
			$stmt = $conn->prepare("UPDATE stock_list SET quantity=quantity+:quantity WHERE id=:id");
			$stmt->execute(['quantity'=>$quantity, 'id'=>$id]);
			
			$stmt = $conn->prepare("INSERT INTO stockin_history (name, stock_quantity, status, date_stockin) VALUES (:name, :stock_quantity, :status, :date_stockin)");
			$stmt->execute(['name'=>$name, 'stock_quantity'=>$quantity, 'status'=>'Stock In', 'date_stockin'=>$date ]);
				

			
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