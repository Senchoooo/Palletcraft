<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$pallet = $_POST['pallet'];
		$palleta = $_POST['palleta'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];
		$date = date('Y-m-d h:i:sa');

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO products (category_id, name, description, slug, price, p_quantity, pallet_quantity, photo) VALUES (:category, :name, :description, :slug, :price, :p_quantity, :pallet_quantity, :photo)");
				$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'p_quantity'=>$quantity, 'pallet_quantity'=>$pallet, 'photo'=>$new_filename]);

					$stmt = $conn->prepare("UPDATE stock_list LEFT JOIN products ON stock_list.quantity=products.pallet_quantity SET quantity = quantity - :quantity WHERE stock_list.id = 1;");
						  $stmt->bindParam(':quantity', $pallet, PDO::PARAM_INT);
						  $stmt->execute();

						  $stmt = $conn->prepare("INSERT INTO stockout_history (materials_name, stockout_quantity, source, status, date_stockout) VALUES (:materials_name, :stockout_quantity, :source, :status, :date_stockout)");
			$stmt->execute(['materials_name'=>$palleta, 'stockout_quantity'=>$pallet, 'source'=>$name, 'status'=>'Stock Out', 'date_stockout'=>$date ]);

				$_SESSION['success'] = 'Product added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>