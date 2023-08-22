<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('tablereceivelist'=>'');

	$stmt = $conn->prepare("SELECT * FROM customize_table_order WHERE id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['tablereceivecustom'] = $row['confirmation'];
		$output['tablereceiveid'] = $row['id'];
		$output['tableordertype2'] = $row['ordertype'];
		$output['tabledelivery2'] = $row['deliveryaddress'];
		$output['tablereceivedate'] = date('Y-m-d - h:i:sa', strtotime($row['order_date1']));
		$output['tablereceivedate1'] = date('Y-m-d - h:i:sa', strtotime($row['order_received3']));
		
		$output['tablereceivelist'] .= "
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
