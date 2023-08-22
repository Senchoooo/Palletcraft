<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('tabledeliverlist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customize_table_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['tabledelivercustom'] = $row['confirmation'];
		$output['tabledeliverid'] = $row['id'];
		$output['tableordertype1'] = $row['ordertype'];
		$output['tabledelivery1'] = $row['deliveryaddress'];
		$output['tabledeliverdate'] = date('Y-m-d - h:i:sa', strtotime($row['order_date1']));
		$output['tabledeliverdate1'] = date('Y-m-d - h:i:sa', strtotime($row['dateDelivered3']));
		
		$output['tabledeliverlist'] .= "
			<tr class='prepend_items'>
			<td>".$row['name']."</td>
				<td>".$row['table_shape']."</td>
				<td>".$row['table_color']."</td>
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
