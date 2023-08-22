
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$height = $_POST['height'];
		$price = $_POST['price'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM customize_chair_height WHERE height=:height");
		$stmt->execute(['height'=>$height]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Height already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO customize_chair_height (height, price) VALUES (:height, :price)");
				$stmt->execute(['height'=>$height, 'price'=>$price]);
				$_SESSION['success'] = 'Height added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Height form first';
	}

	header('location: height.php');

?>