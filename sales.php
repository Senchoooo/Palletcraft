<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$confirmation = $_POST['confirmation'];
		$id = $_GET['id'];
		$ordertype = $_POST['ordertype'];
			$province = $_POST['province'];
			$city = $_POST['city'];
			$barangay = $_POST['barangay'];
		$p_quantity = $_GET['p_quantity'];
		$palletwood = $_POST['palletwood'];
		$pallettotal = $_POST['pallettotal'];
		date_default_timezone_set("Asia/Manila");
		$date = date('Y-m-d h:i:sa');
		$date1 = date('Y-m-d h:i:sa');
		$date2 = date('Y-m-d h:i:sa');

		$conn = $pdo->open();

		try{
			
			$stmt = $conn->prepare("INSERT INTO sales (user_id, confirmation, ordertype, province, city, barangay, dateDelivered, order_received, order_status, sales_date) VALUES (:user_id, :confirmation, :ordertype, :province, :city, :barangay, :dateDelivered, :order_received, :order_status,  :sales_date)");
			$stmt->execute(['user_id'=>$user['id'], 'confirmation'=>$confirmation, 'ordertype'=>$ordertype, 
				'province'=>$province, 'city'=>$city, 'barangay'=>$barangay, 'dateDelivered'=>$date1, 'order_received'=>$date2, 'order_status'=>'pending',  'sales_date'=>$date]);
			$salesid = $conn->lastInsertId();

			$stmt = $conn->prepare("UPDATE stock_list LEFT JOIN products ON stock_list.quantity=products.pallet_quantity SET quantity = quantity - :quantity WHERE stock_list.id = 1;");
						  $stmt->bindParam(':quantity', $pallettotal, PDO::PARAM_INT);
						  $stmt->execute();

						  $stmt = $conn->prepare("INSERT INTO stockout_history (name, stockout_quantity, source, status, date_stockout) VALUES (:name, :stockout_quantity, :source, :status, :date_stockout)");
			$stmt->execute(['name'=>$palletwood, 'stockout_quantity'=>$pallettotal, 'source'=>$confirmation, 'status'=>'Stock Out', 'date_stockout'=>$date ]);

			try{
				$stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				foreach($stmt as $row){

					$id = $row['product_id'];
					$qty = $row['quantity'];
					$pallet_quantity = $row['pallet_quantity'];
					$stmt = $conn->prepare("UPDATE products SET p_quantity = p_quantity - :p_quantity WHERE id=:id;");
					$stmt->execute(['p_quantity'=>$qty, 'id'=>$id]);

					
						  
	
					$stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
					$stmt->execute(['sales_id'=>$salesid, 'product_id'=>$row['product_id'], 'quantity'=>$row['quantity']]);

					
				}



				$stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
				$stmt->execute(['user_id'=>$user['id']]);

				$_SESSION['success'] = 'Transaction successful. Thank you.';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	
	header('location: order_transact.php');
	
?>