<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$shape = $_POST['shape'];
		$price = $_POST['price'];

		try{
			$stmt = $conn->prepare("UPDATE customize_table_shape SET table_shape=:table_shape, price=:price WHERE id=:id");
			$stmt->execute(['table_shape'=>$shape, 'price'=>$price, 'id'=>$id]);
			$_SESSION['success'] = 'Table shape and Price updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Table shape and Price form first';
	}

	header('location: table.php');

?>