<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM customize_chair_shape WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Shape  deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Shape  to delete first';
	}

	header('location: shape.php');
	
?>