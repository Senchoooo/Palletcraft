<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
	

		$conn = $pdo->open();

	
		
			$filename = $_FILES['photo']['name'];
			$now = date('Y-m-d');
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
			}
			try{
				$stmt = $conn->prepare("INSERT INTO carousel (photo) VALUES (:photo)");
				$stmt->execute(['photo'=>$filename]);
				$_SESSION['success'] = 'Photo added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Add photo first';
	}

	header('location: carousel.php');

?>