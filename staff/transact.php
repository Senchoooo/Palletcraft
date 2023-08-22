<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		
		$output['transaction'] = $row['confirmation'];
		$output['salesid'] = $row['sales_id'];
		$output['ordertype'] = $row['ordertype'];
		$output['deliveryaddress'] = $row['province'].' '.$row['town'].' '.$row['barangay'];
		$output['date'] = date('Y-m-d - h:i:sa', strtotime($row['sales_date']));
		$output['dateDelivered'] = date('Y-m-d - h:i:sa', strtotime($row['dateDelivered']));
		$subtotal = $row['price']*$row['quantity'];

		
		$total += $subtotal;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>&#8369; ".number_format($row['price'], 2)."</td>
				<td>".$row['quantity']."</td>
				
				
				<td>&#8369; ".number_format($subtotal, 2)."</td>
				

				


			</tr>
		";
	}
	
	$output['total'] = '<b>&#8369; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>
