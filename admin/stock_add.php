
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$quantity = $_POST['quantity'];
		$filename = $_FILES['photo']['name'];
		$date = date('Y-m-d');

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM stock_list WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Material already exist';
		}
		else{
				if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $name.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'],$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO stock_list (name, quantity, stock_date) VALUES (:name, :quantity, :stock_date)");
				$stmt->execute(['name'=>$name, 'quantity'=>$quantity, 'stock_date'=>$date]);
				$_SESSION['success'] = 'Material added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up Stock form first';
	}

	header('location: inventory.php');

?>