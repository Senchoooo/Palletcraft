<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['sale4'] = $row['confirmation'];
		$output['ordertype2'] = $row['ordertype'];
		$output['deliveryaddress2'] = $row['deliveryaddress'];
		$output['date4'] = date('Y-m-d - h:i:sa', strtotime($row['sales_date']));
		$output['dateDelivery2'] = date('Y-m-d - h:i:sa', strtotime($row['dateDelivered']));
		$subtotal = $row['price']*$row['quantity'];
		$output['salesdelivered'] = $row['sales_id'];

		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>&#8369; ".number_format($row['price'], 2)."</td>
				<td>".$row['quantity']."</td>
				<td>".$row['ordertype']."</td>
				<td>&#8369; ".number_format($subtotal, 2)."</td>
				

				


			</tr>
		";
	}
	
	$output['total'] = '<b>&#8369; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>
