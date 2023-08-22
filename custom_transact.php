<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('customerorderlist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customization_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['custom'] = $row['confirmation'];
		$output['customedate'] = date('M d, Y', strtotime($row['order_date']));
		
		$output['customerorderlist'] .= "
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
	
	$output['totalprice'] = '<b>&#8369;" . $row["total_price"] . "<b>';
	$pdo->close();
	echo json_encode($output);

?>
