<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $_POST['id'];
		$filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM receipt WHERE user_id=:user_id ORDER BY date_created DESC");
	        							$stmt->execute(['user_id'=>$user['id']]);

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $row['slug'].'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
		}
		
		try{
			$stmt = $conn->prepare("INSERT INTO receipt  WHERE id=:id");
			$stmt->execute(['photo'=>$new_filename, 'id'=>$id]);
			$_SESSION['success'] = 'Receipt uploaded successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Cannot upload Receipt';
	}

	header('location: profile.php');
?>