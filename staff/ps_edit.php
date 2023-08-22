<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = $_POST['status'];
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d h:i:sa');
		$date1 = date('Y-m-d h:i:sa');

		
		try{
		$stmt = $conn->prepare("SELECT * FROM customization_order WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();

		
			$stmt = $conn->prepare("UPDATE customization_order SET dateDelivered1=:dateDelivered1, order_status=:order_status WHERE id=:id");
			$stmt->execute(['dateDelivered1'=>$date,'order_status'=>$status, 'id'=>$id]);
			$_SESSION['success'] = 'Status updated successfully';
		
		

		
		
	}
	catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Update Status form first';
	}

	header('location: custom_sale.php');

?>