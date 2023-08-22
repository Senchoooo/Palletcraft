<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM customize_ps_layer WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Layer and Price  deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Layer and Price  to delete first';
	}

	header('location: customization.php');
	
?>