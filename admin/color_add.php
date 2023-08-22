
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$color = $_POST['color'];
		$price = $_POST['price'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customize_ps_color WHERE color=:color");
		$stmt->execute(['color'=>$color]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Color shape already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO customize_ps_color (color, price) VALUES (:color, :price)");
				$stmt->execute(['color'=>$color, 'price'=>$price]);
				$_SESSION['success'] = 'Color added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Color form first';
	}

	header('location: color.php');

?>