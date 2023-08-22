
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customize_flatform_quantity WHERE flatform_quantity=:flatform_quantity");
		$stmt->execute(['flatform_quantity'=>$flatform_quantity]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Platform already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO customize_flatform_quantity (flatform_quantity, price) VALUES (:flatform_quantity, :price)");
				$stmt->execute(['flatform_quantity'=>$quantity, 'price'=>$price]);
				$_SESSION['success'] = 'Layer and Platform added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Layer and Platform form first';
	}

	header('location: Platform.php');

?>