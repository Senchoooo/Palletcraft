<?php
	include 'includes/session.php';

	function generateRow($from, $to, $conn){
		$contents = '';
	 	
		  $stmt = $conn->prepare("SELECT * FROM stock_list WHERE stock_date BETWEEN '$from' AND '$to' ORDER BY stock_date DESC");
		$stmt->execute();
		$total = 0;
		foreach($stmt as $row){
	
			$contents .= '
			<tr>
				<td>'.date('M d, Y', strtotime($row['stock_date'])).'</td>
				<td>'.$row['name'].'</td>
				<td>'.$row['quantity'].'</td>
				
				
				
			</tr>
			';
				}
		

		
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
	    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
	    $pdf->setPrintHeader(false);  
	    $pdf->setPrintFooter(false);  
	    $pdf->SetAutoPageBreak(TRUE, 10);  
	    $pdf->SetFont('dejavusans', '', 11);  
	    $pdf->AddPage();  
	    $content = '';  
	    $content .= '
	      	<h2 align="center">Pallet Craft</h2>
	      	<h4 align="center">Inventory Report</h4>
	      	<h4 align="center">'.$from_title." - ".$to_title.'</h4>
	      	<table border="1" cellspacing="0" cellpadding="3">  
	           <tr>  
	           		<th width="35%" align="center"><b>Last Date Stock</b></th>
	                <th width="35%" align="center"><b>Materials Name</b></th>
	                
					<th width="30%" align="center"><b>Quantity</b></th>
					
	           </tr>  
	      ';  
	    $content .= generateRow($from, $to, $conn);  
	    $content .= '</table>';  
	    $pdf->writeHTML($content);  
	    $pdf->Output('inventory.pdf', 'I');

	    $pdo->close();

	}
	else{
		$_SESSION['error'] = 'Need date range to provide inventory print';
		header('location: inventory.php');
	}
?>