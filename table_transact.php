<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('tablecustomerreceivelist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customize_table_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['tablereceivecustomer'] = $row['confirmation'];
		$output['tablecustomerreceivedate'] = date('Y-m-d - h:i:sa', strtotime($row['order_date1']));

		
		$output['tablecustomerreceivelist'] .= "
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
