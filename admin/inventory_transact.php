<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('inventorylist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customization_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['stock'] = $row['confirmation'];
		$output['inventoryid'] = $row['id'];
		
		$output['inventorydate'] = date('Y-m-d - h:i:sa', strtotime($row['order_date']));
		
		
		$output['inventorylist'] .= "
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
