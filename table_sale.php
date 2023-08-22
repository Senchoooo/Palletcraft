<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$table = $_POST['table'];
		$confirmation = $_POST['confirmation'];
		$shape = $_POST['shape'];
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
				$stmt = $conn->prepare("INSERT INTO customize_table_order (user_id, name, confirmation, table_shape, table_color, ordertype, deliveryaddress, quantity, total_price, downpayment, dateDelivered3, order_received3, status, order_date1) VALUES (:user_id, :name, :confirmation, :table_shape, :table_color, :ordertype, :deliveryaddress,
				:quantity, :total_price, :downpayment, :dateDelivered3, :order_received3, :status, :order_date1)");
				$stmt->execute(['user_id'=>$user['id'], 'name'=>$table, 'confirmation'=>$confirmation, 'table_shape'=>$shape, 'table_color'=>$othervalue1, 'ordertype'=>$ordertype, 'deliveryaddress'=>$deliveryaddress, 'quantity'=>$quantity,  'total_price'=>$total,'downpayment'=>$downpayment, 'dateDelivered3'=>$date1,'order_received3'=>$date2, 'status'=>1, 'order_date1'=>$date]);
				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
		catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	
	header('location: custom_table_history.php');
	
?>