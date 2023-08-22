<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('chairreceivelist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customize_chair_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['chairreceive'] = $row['confirmation'];
		$output['chairreceiveid'] = $row['id'];
		$output['chairtype2'] = $row['ordertype'];
		$output['chairaddress2'] = $row['deliveryaddress'];
		$output['chairreceivedate'] = date('Y-m-d - h:i:sa', strtotime($row['order_date2']));
		$output['chairreceivedate1'] = date('Y-m-d - h:i:sa', strtotime($row['order_received2']));
		
		$output['chairreceivelist'] .= "
			<tr class='prepend_items'>
			<td>".$row['name']."</td>
				<td>".$row['chair_shape']."</td>
				
				<td>".$row['chair_color']."</td>
				<td>".$row['quantity']."</td>
				<td>&#8369;" . $row["downpayment"] . "</td>
				<td>&#8369;" . $row["total_price"] . "</td>
				
				<td>&#8369;" . $row["total_price"] . "</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>&#8369;" . $row["total_price"] .<b>';
	$pdo->close();
	echo json_encode($output);

?>
