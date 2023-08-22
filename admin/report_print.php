<?php
	include 'includes/session.php';
   $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
	function generateRow($today, $conn){
		$contents = '';
	 	
		   $stmt = $conn->prepare("SELECT *,  sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id  ORDER BY sales_date DESC");
                        
                      $stmt->execute();
                      foreach($stmt as $row){
                      $name = $row['firstname'].' '.$row['lastname'];
                    }
		$total = 0;
		foreach($stmt as $row){
			
                      $stmt = $conn->prepare("SELECT * FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id  WHERE sales_date=:sales_date");
                $stmt->execute(['sales_date'=>$today]);
			$amount = 0;
			foreach($stmt as $details){
				// $status = ($row['status']) ? '<span class="label label-success">Delivered</span>' : '<span class="label label-danger">N/A</span>';
    //                     $done = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="'.$row['id'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
				$subtotal = $details['price']*$details['quantity'];
				
				
		
			$total += $subtotal;
			$contents .= '
			<tr>
				<td>'.date('M d, Y', strtotime($row['sales_date'])).'</td>
				<td>'.$name.'</td>
				<td>'.$row['confirmation'].'</td>
				<td>'.$details['name'].'</td>
				
				<td align="right">&#8369; '.number_format($subtotal, 2).'</td>
			</tr>
			';
				}
		}

		$contents .= '

			<tr>
				<td colspan="4" align="right"><b>Total</b></td>
				<td align="right"><b>&#8369; '.number_format($total, 2).'</b></td>
			</tr>
		';
		return $contents;
	}

	if(isset($_POST['print'])){
		$ex = explode(' - ', $_POST['date_range']);
		$today = date('Y-m-d', strtotime($ex[0]));
		
		$today = date('M d, Y', strtotime($ex[0]));
		

		$conn = $pdo->open();

		require_once('../tcpdf/tcpdf.php');  
	    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
	    $pdf->SetCreator(PDF_CREATOR);  
	    $pdf->SetTitle('Sales Report: '.$today.' - '.$today);  
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
	      	<h4 align="center">OUT FOR DELIVERY SALES REPORT</h4>
	      	<h4 align="center">'.$today." - ".$today.'</h4>
	      	<table border="1" cellspacing="0" cellpadding="3">  
	           <tr>  
	           		<th width="15%" align="center"><b>Date</b></th>
	                <th width="25%" align="center"><b>Buyer Name</b></th>
	                
					<th width="25%" align="center"><b>Transaction#</b></th>
					<th width="20%" align="center"><b>Product</b></th>
					<th width="15%" align="center"><b>Amount</b></th>  
	           </tr>  
	      ';  
	    $content .= generateRow($today, $conn);  
	    $content .= '</table>';  
	    $pdf->writeHTML($content);  
	    $pdf->Output('sales.pdf', 'I');

	    $pdo->close();

	}
	else{
		$_SESSION['error'] = 'Need date range to provide sales print';
		header('location: sales4.php');
	}
?>