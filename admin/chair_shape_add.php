
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$shape = $_POST['shape'];
		$price = $_POST['price'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customize_chair_shape WHERE shape=:shape");
		$stmt->execute(['shape'=>$shape]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Shape already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO customize_chair_shape (shape, price) VALUES (:shape, :price)");
				$stmt->execute(['shape'=>$shape, 'price'=>$price]);
				$_SESSION['success'] = 'Shape added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Shape form first';
	}

	header('location: shape.php');

?>