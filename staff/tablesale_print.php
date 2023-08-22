<?php
	include 'includes/session.php';

	function generateRow($from, $to, $conn){
		$contents = '';
	 	
		$stmt = $conn->prepare("SELECT *, customize_table_order.id AS customid FROM customize_table_order LEFT JOIN users ON users.id=customize_table_order.user_id WHERE order_date1 BETWEEN '$from' AND '$to' AND customize_table_order.status = 4 ORDER BY order_date1 DESC");
		$stmt->execute();
		$total = 0;
		foreach($stmt as $row){
			 // $status = ($row['status']) ? '<span class="label label-success">Pending</span>' : '<span class="label label-danger">N/A</span>';
    //                     $pending = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
			$price = ($row['total_price']);
			$downpayment = ($row['downpayment']);
			$balance = $price - $downpayment;
			$total += $price;
			
		
			$contents .= '
			<tr>
				<td align="center">'.date('M d, Y', strtotime($row['order_date1'])).'</td>
				<td align="center">'.$row['firstname'].' '.$row['lastname'].'</td>
				<td align="center">'.$row['confirmation'].'</td>
				
                            <td align="center">'.$row['table_shape'].'</td>
                            <td align="center">'.$row['table_color'].'</td>
                            
                            <td align="center">'.$row['quantity'].'</td>
                            <td align="right"><b> &#8369;'.number_format($downpayment, 2).'</b></td>
                            <td align="right"><b> &#8369;'.number_format($balance, 2).'</b></td>
                          
				<td align="right"><b>&#8369; '.number_format($price, 2).'</b></td>
			</tr>
			';
		}

		$contents .= '

			<tr>
				<td colspan="8" align="right"><b>Total:</b></td>
				<td align="right"><b>&#8369; '.number_format($total, 2).'</b></td>
			</tr>
		';
		return $contents;
	}

	if(isset($_POST['print'])){
		$ex = explode(' - ', $_POST['date_range']);
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$from_title = date('M d, Y', strtotime($ex[0]));
		$to_title = date('M d, Y', strtotime($ex[1]));

		$conn = $pdo->open();

		require_once('../tcpdf/tcpdf.php');  
	    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $pdf->SetCreator(PDF_CREATOR);  
	    $pdf->SetTitle('Sales Report: '.$from_title.' - '.$to_title);  
	    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	    $pdf->SetDefaultMonospacedFont('dejavusans');  
	    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	    $pdf->SetMargins(5, '15', PDF_MARGIN_RIGHT);  
	    $pdf->setPrintHeader(false);  
	    $pdf->setPrintFooter(false);  
	    $pdf->SetAutoPageBreak(TRUE, 9);  
	    $pdf->SetFont('dejavusans', '', 10);  
	    $pdf->AddPage();  
	    $content = '';  
	    $content .= '
	      	<h2 align="center">Pallet Craft</h2>
	      	<h4 align="center">TABLE CUSTOMIZATION PENDING REPORT</h4>
	      	<h4 align="center">'.$from_title." - ".$to_title.'</h4>
	      	<table border="1" cellspacing="0" cellpadding="4">  
	           <tr>  
	        <th width="13%" align="center"><b>Date</b></th>
	                <th width="14%" align="center"><b>Buyer Name</b></th>
					<th width="12%" align="center"><b>Transaction#</b></th>
					<th width="9%" align="center"><b>Shape</b></th>
					<th width="9%" align="center"><b>Color</b></th>
					<th width="10%" align="center"><b>quantity</b></th>
					<th width="14%" align="center"><b>Downpayment</b></th>
					<th width="11%" align="center"><b>Balance</b></th>
					<th width="11%" align="center"><b>Amount</b></th>   
	           </tr>  
	      ';  
	    $content .= generateRow($from, $to, $conn);
	     
	    $content .= '</table>';  
	    
	    
    	
    	$pdf->writeHTML($content);
    	

    	
	    $pdf->Output('sales.pdf', 'I');

	    $pdo->close();

	}
	else{
		$_SESSION['error'] = 'Need date range to provide sales print';
		header('location: custom_chair_sale1.php');
	}
?>