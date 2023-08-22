<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$color = $_POST['color'];
		$price = $_POST['price'];

		try{
			$stmt = $conn->prepare("UPDATE table_color SET color=:color, price=:price WHERE id=:id");
			$stmt->execute(['color'=>$color, 'price'=>$price, 'id'=>$id]);
			$_SESSION['success'] = 'Color and Price updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Color and Price form first';
	}

	header('location: table_color.php');

?>