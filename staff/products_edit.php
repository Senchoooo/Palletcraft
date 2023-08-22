<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$pallet = $_POST['pallet'];
		$description = $_POST['description'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET name=:name, slug=:slug, category_id=:category, price=:price, p_quantity=:p_quantity, pallet_quantity=:pallet_quantity, description=:description WHERE id=:id");
			$stmt->execute(['name'=>$name, 'slug'=>$slug, 'category'=>$category, 'price'=>$price, 'p_quantity'=>$quantity,
			'pallet_quantity'=>$pallet, 'description'=>$description, 'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>