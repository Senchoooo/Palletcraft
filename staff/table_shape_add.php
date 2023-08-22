
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$shape = $_POST['shape'];
		$price = $_POST['price'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customize_table_shape WHERE table_shape=:table_shape");
		$stmt->execute(['table_shape'=>$table_shape]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Table shape already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO customize_table_shape (table_shape, price) VALUES (:table_shape, :price)");
				$stmt->execute(['table_shape'=>$shape, 'price'=>$price]);
				$_SESSION['success'] = 'Table shape added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Table shape form first';
	}

	header('location: table.php');

?>