<?php
	include 'includes/session.php';


	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		
		$description = $_POST['description'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE system_info SET description=:description WHERE id=:id");
			$stmt->execute([ 'description'=>$description, 'id'=>$id]);
			$_SESSION['success'] = 'Information updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Information form first';
	}

	header('location: info.php');

?>