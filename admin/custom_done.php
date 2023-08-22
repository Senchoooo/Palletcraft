<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('customlistdone'=>'');

	$stmt = $conn->prepare("SELECT * FROM customize_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['customizedone'] = $row['confirmation'];
		$output['customid'] = $row['id'];
		$output['customreceivedone'] = $row['ordertype'];
		$output['customreceivedone2'] = $row['deliveryaddress'];
		$output['plantstanddatedone'] = date('Y-m-d - h:i:sa', strtotime($row['order_date']));
		$output['plantstanddatedone1'] = date('Y-m-d - h:i:sa', strtotime($row['order_received1']));
		
		
		$output['customlistdone'] .= "
			<tr class='prepend_items'>
			<td>".$row['name']."</td>
				<td>".$row['layer']."</td>
				<td>".$row['flatform_quantity']."</td>
				<td>".$row['color']."</td>
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
