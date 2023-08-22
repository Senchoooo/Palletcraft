
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$layer = $_POST['layer'];
		$price = $_POST['price'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customize_ps_layer WHERE layer=:layer");
		$stmt->execute(['layer'=>$layer]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Layer already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO customize_ps_layer (layer, price) VALUES (:layer, :price)");
				$stmt->execute(['layer'=>$layer, 'price'=>$price]);
				$_SESSION['success'] = 'Layer and price added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Layer and price form first';
	}

	header('location: customization.php');

?>