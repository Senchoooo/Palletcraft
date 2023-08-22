<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$Chair = $_POST['Chair'];
		$confirmation = $_POST['confirmation'];
		$shape = $_POST['shape'];
		// $someothervalue = $_POST['someothervalue'];
		$othervalue1 = $_POST['othervalue1'];
		$ordertype = $_POST['ordertype'];
		$deliveryaddress = $_POST['deliveryaddress'];
		$quantity = $_POST['quantity'];
		$total = $_POST['total'];
		$downpayment = $_POST['downpayment'];
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d h:i:sa');
		$date1 = date('Y-m-d h:i:sa');
		$date2 = date('Y-m-d h:i:sa');
		

		$conn = $pdo->open();

		try{
				$stmt = $conn->prepare("INSERT INTO customize_chair_order (user_id, name, confirmation, chair_shape, chair_color, ordertype, deliveryaddress, quantity, total_price, downpayment, dateDelivered2, order_received2, status, order_date2) VALUES (:user_id, :name, :confirmation, :chair_shape, :chair_color, :ordertype, :deliveryaddress,
				:quantity, :total_price, :downpayment, :dateDelivered2, :order_received2, :status, :order_date2)");
				$stmt->execute(['user_id'=>$user['id'], 'name'=>$Chair, 'confirmation'=>$confirmation, 'chair_shape'=>$shape,  'chair_color'=>$othervalue1, 'ordertype'=>$ordertype, 'deliveryaddress'=>$deliveryaddress, 'quantity'=>$quantity,  'total_price'=>$total, 'downpayment'=>$downpayment, 'dateDelivered2'=>$date1,'order_received2'=>$date2, 'status'=>1, 'order_date2'=>$date]);
				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
		catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	
	header('location: custom_chair_history.php');
	
?>