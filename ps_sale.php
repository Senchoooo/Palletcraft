<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$customname = $_POST['customname'];
		$confirmation = $_POST['confirmation'];
		$detail = $_POST['detail'];
		$color = $_POST['color'];
		$ordertype = $_POST['ordertype'];
		$province = $_POST['province'];
		$town = $_POST['town'];
		$barangay = $_POST['barangay'];
		$quantity = $_POST['quantity'];
		$total = $_POST['total'];
		$downpayment = $_POST['downpayment'];
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d h:i:sa');
		$date1 = date('Y-m-d h:i:sa');
		$date2 = date('Y-m-d h:i:sa');
		

		$conn = $pdo->open();

		try{
				$stmt = $conn->prepare("INSERT INTO customization_order (user_id, name, confirmation, detail, color, ordertype, province, town, barangay, quantity, total_price, downpayment, dateDelivered1, order_received1, order_status, order_date) VALUES (:user_id, :name, :confirmation, :detail, :color, :ordertype, :province, :town, :barangay, :quantity, :total_price, :downpayment, :dateDelivered1, :order_received1, :order_status, :order_date)");
				$stmt->execute(['user_id'=>$user['id'], 'name'=>$customname, 'confirmation'=>$confirmation, 'detail'=>$detail,  'color'=>$color, 'ordertype'=>$ordertype, 'province'=>$province, 'town'=>$town,'barangay'=>$barangay, 'quantity'=>$quantity, 'total_price'=>$total,'downpayment'=>$downpayment, 'dateDelivered1'=>$date1,'order_received1'=>$date2, 'order_status'=>'pending', 'order_date'=>$date]);
				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
		catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	
	header('location: custom_ps_history.php');
	
?>