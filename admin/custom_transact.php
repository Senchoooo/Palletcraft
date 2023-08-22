<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('customlist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customization_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['customize'] = $row['confirmation'];
		$output['customid'] = $row['id'];
		$output['customtype'] = $row['ordertype'];
		// $output['customaddress'] = $row['deliveryaddress'];
		$output['plantstanddate'] = date('Y-m-d - h:i:sa', strtotime($row['order_date']));
		
		
		$output['customlist'] .= "
			<tr class='prepend_items'>
			<td>".$row['name']."</td>
				<td>".$row['detail']."</td>
				
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
