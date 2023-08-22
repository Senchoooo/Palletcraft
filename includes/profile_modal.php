pa<!-- Transaction History -->
<div class="modal fade" id="customer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="customerdate"></span>

                <span class="pull-right">Transaction#: <span id="customertransid"></span></span> 
              </p> 

              <table class="table table-bordered">
                <thead>
                  
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  
                  <th>Subtotal</th>
                 
                   

                </thead>
                <tbody id="customerdetail">
                  <tr>
                    
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><span id="customertotal"></span></td>
                  </tr>

               <!--    <form action="order_edit.php" method="POST" enctype="multipart/form-data">
                     <input type="" name="id" id="salesid" value="<?php echo $row['salesid']?>"/>
                    <th colspan="2" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form> -->
                </tbody>
              </table>
              <!--  <p>
              Delivery Date: <span id="date1"></span>
              </p> -->

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Transaction History -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="date"></span>

                <span class="pull-right">Transaction#: <span id="transid"></span></span> 
              </p> 

              <table class="table table-bordered">
                <thead>
                  
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  
                  <th>Subtotal</th>
                 
                   

                </thead>
                <tbody id="detail">
                  <tr>
                    
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><span id="total"></span></td>
                  </tr>
                  <form action="order_edit.php" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="id" id="salesid" value="<?php echo $row['salesid']?>"/>
                                      <th colspan="2" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="pending" <?php echo isset($meta['status']) && $meta['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                  
                  <option value="delivered" <?php echo isset($meta['status']) && $meta['status'] == 'delivered' ? 'selected' : '' ?>>Completed</option>
                    </select>
                    </span></th>
                    <th>
                 

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Delivered order -->
<div class="modal fade" id="received">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="receiveddate"></span>

                <span class="pull-right">Transaction#: <span id="receivedid"></span></span> 
              </p> 

              <table class="table table-bordered">
                <thead>
                  
                  <th>Product</th>
                  <th width="18%">Price</th>
                  <th>Quantity</th>
                  
                 
                  <th>Subtotal</th>
                 
                   

                </thead>
                <tbody id="receiveddetail">
                  <tr>
                    
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><span id="receivedtotal"></span></td>
                  </tr>

                  <form action="order_update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="salesreceived" value="<?php echo $row['salesid']?>"/>
                    <th colspan="2" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="pending" <?php echo isset($meta['status']) && $meta['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                  <!-- <option value="preparing" <?php echo isset($meta['status']) && $meta['status'] == 'preparing' ? 'selected' : '' ?>>Preparing</option> -->
                  <option value="out for delivery" <?php echo isset($meta['status']) && $meta['status'] == 'out for delivery' ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="completed" <?php echo isset($meta['status']) && $meta['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form>
                </tbody>
              </table>
                 <!--   <p>
              Delivery Date: <span id="dateDelivery"></span>
              </p> -->
               <!--      <p>
              Delivery Address: <span id="deliveryaddress1"></span>
              </p> -->

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Transaction History -->
<div class="modal fade" id="sale4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="date4"></span>

                <span class="pull-right">Transaction#: <span id="saleid"></span></span> 
              </p> 

              <table class="table table-bordered">
                <thead>
                  
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Order Type</th>
                  <th>Subtotal</th>
                 
                   

                </thead>
                <tbody id="saledetail">
                  <tr>
                    
                    <td colspan="4" align="right"><b>Total</b></td>
                    <td><span id="saletotal"></span></td>
                  </tr>

               <!--    <form action="order_edit.php" method="POST" enctype="multipart/form-data">
                     <input type="" name="id" id="salesid" value="<?php echo $row['salesid']?>"/>
                    <th colspan="2" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form> -->
                </tbody>
              </table>
             <p>
              Delivery Date: <span id="dateDelivery2"></span>
              </p>
                    <p>
              Delivery Address: <span id="deliveryaddress2"></span>
              </p>

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

            </div>
        </div>
    </div>
</div>
<!-- plantstand modal -->
<div class="modal fade" id="customize">
    <div class="modal-dialog">
        <div class="modal-content">
            <div  class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="plantstanddate"></span>
                <span class="pull-right">Transaction#: <span id="customizeid"></span></span> 
              </p>
              <table  class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Details</th>
                  <th>color</th>
                  <th>Downpayment</th>
                  <th width="-50%">Price</th>
                  <th>Total</th>

                </thead>
                <tbody id="customlist">
                  
                  <tr>
                    
                   
                  
                  </tr>
                 
              <form action="ps_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="customid" id="customid" value="<?php echo $row['customid'] ?>" />
                    <input type="hidden" name="stockid" id="stockid" value="<?php echo $row['stockid'] ?>" />
                    <th colspan="3" align="right"><b>Status</b></th>

                    <th>
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="pending" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <!-- <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option> -->
                  <option value="completed" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Completed</option>
                    </select>
                    </th>

                </tbody>
              </table>
              <input type="hidden" class="form-control" id="name" name="pallet" value="pallet">
                  <th  align="right"><b>Pallet Used</b></th>
                    <input type="text" class="form-control" id="quantity" name="quantity" required>
                       <th  align="right"><b>Detail</b></th>
                    <input type="text" class="form-control" id="source" name="source" required>

            </div>
            <div class="modal-footer">
               <button onclick="checkInventory()" type="submit" class="btn btn-success btn-flat pull-right" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
<!--                                           <script>
  const stock_list = [
  { name: "pallet", quantity: 0 },
  
];
function checkInventory() {
  for (let i = 0; i < stock_list.length; i++) {
    if (stock_list[i].quantity === 0) {
      alert(`The quantity of ${stock_list[i].name} is already 10 You need to stock in now! `);
    }
  }
}
</script> -->
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- plantstand modal -->
<div class="modal fade" id="customizedeliver">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="plantstanddeliverdate"></span>
                <span class="pull-right">Transaction#: <span id="customizedeliverid"></span></span> 
              <!--      <p>
              Delivery Address: <span id="customdeliverda"></span>
              </p> -->
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Detail</th>
                 
                  <th>color</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="customdeliverlist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                    <form action="ps_update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="customid" id="customid1" value="<?php echo $row['customid'] ?>" />
                    <input type="hidden" name="stockid" id="stockid" value="<?php echo $row['stockid'] ?>" />
                    
                    <th colspan="3" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="pending" <?php echo isset($meta['status']) && $meta['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="preparing" <?php echo isset($meta['status']) && $meta['status'] == 'preparing' ? 'selected' : '' ?>>Preparing</option>
                  <option value="out for delivery" <?php echo isset($meta['status']) && $meta['status'] == 'out for delivery' ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="completed" <?php echo isset($meta['status']) && $meta['status'] == 'completed' ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                    
                    </th>
                  
                </tbody>
              </table>
             
              
              
              <input type="" class="form-control" id="name" name="pallet" value="pallet" readonly>
                  <th  align="right"><b>Pallet Used</b></th>
                    <input type="text" class="form-control" id="quantity" name="pquantity" required>
                       <th  align="right"><b>Detail</b></th>
                    <input type="text" class="form-control" id="source" name="source" required>
              
            </div>
            <div class="modal-footer">
                <button onclick="checkInventory()" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
<!--                                            <script>
  const stock_list = [
  { name: "pallet", quantity: 0 },
  
];
function checkInventory() {
  for (let i = 0; i < stock_list.length; i++) {
    if (stock_list[i].quantity === 0) {
      alert(`The quantity of ${stock_list[i].name} is already 10 You need to stock in now! `);
    }
  }
}
</script> -->
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- plantstand modal -->
<div class="modal fade" id="customdone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="plantstanddatedone"></span>
                <span class="pull-right">Transaction#: <span id="customizedone"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Layer</th>
                  <th>Platform</th>
                  <th>color</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="customlistdone">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
             <!--        <form action="ps_update.php" method="POST" enctype="multipart/form-data">
                    <input type="" name="id" id="customid1" value="<?php echo $row['customid'] ?>" />
                    <th colspan="5" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form> -->
                </tbody>
              </table>
                <p>
              Order Type: <span id="customreceivedone"></span>
              </p>
                 <p>
              Delivery Address: <span id="customreceivedone2"></span>
              </p>
               <p>
              Order Received: <span id="plantstanddatedone1"></span>
              </p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- plantstand modal -->
<div class="modal fade" id="customerps">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="customedate"></span>
                <span class="pull-right">Transaction#: <span id="custom"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Detail</th>
                  <th>color</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Total</th>
                </thead>
                <tbody id="customerorderlist">
                  <tr>
                    
                    
                   <!--  <td colspan="5" align="right"><b>Total</b></td>
                    <td><span id="totalprice"></span></td> -->
                  </tr>
                </tbody>
              </table>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="inventory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="inventorydate"></span>
                <span class="pull-right">Transaction#: <span id="stockid"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Detail</th>
                  <th>color</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Total</th>
                </thead>
                <tbody id="inventorylist">
                  <tr>
                    
                    
                   <!--  <td colspan="5" align="right"><b>Total</b></td>
                    <td><span id="totalprice"></span></td> -->
                  </tr>
                </tbody>
              </table>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- chair modal -->
<div class="modal fade" id="customchair">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="chairdate"></span>
                <span class="pull-right">Transaction#: <span id="chair"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Shape</th>
                  
                  <th>color</th>
                  <th>quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="chairlist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                            <form action="chair_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="chairid" value="<?php echo $row['chairid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form>
                </tbody>
              </table>
              <p>
                 Order Type: <span id="chairtype"></span>
              </p>
                 <p>
              Delivery Address: <span id="chairaddress"></span>
              </p>
             

              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- chair modal -->
<div class="modal fade" id="customchairdeliver">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="chairdeliverdate"></span>
                <span class="pull-right">Transaction#: <span id="chairdeliver"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Shape</th>
                  
                  <th>color</th>
                  <th>quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="chairdeliverlist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                            <form action="chair_update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="chairdeliverid" value="<?php echo $row['chairid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form>
                </tbody>
              </table>
              <p>
                 Order Type: <span id="chairtype1"></span>
              </p>
                 <p>
              Delivery Address: <span id="chairaddress1"></span>
              </p>
                 <p>
              Delivery Date: <span id="chairdeliverdate1"></span>
              </p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- chair modal -->
<div class="modal fade" id="customchairdone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="chairreceivedate"></span>
                <span class="pull-right">Transaction#: <span id="chairreceive"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Shape</th>
                  
                  <th>color</th>
                  <th>quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="chairreceivelist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                   <!--          <form action="chair_update.php" method="POST" enctype="multipart/form-data">
                    <input type="" name="id" id="chairreceiveid" value="<?php echo $row['chairid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form> -->
                </tbody>
              </table>
               <p>
                 Order Type: <span id="chairtype2"></span>
              </p>
                 <p>
              Delivery Address: <span id="chairaddress2"></span>
              </p>
                 <p>
              Order Received: <span id="chairreceivedate1"></span>
              </p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- chair modal -->
<div class="modal fade" id="customerchairdone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="chaircustomreceivedate"></span>
                <span class="pull-right">Transaction#: <span id="chaircustom"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Shape</th>
                  
                  <th>color</th>
                  <th>quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="chaircustomreceivelist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                   <!--          <form action="chair_update.php" method="POST" enctype="multipart/form-data">
                    <input type="" name="id" id="chairreceiveid" value="<?php echo $row['chairid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form> -->
                </tbody>
              </table>
              
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- table modal -->
<div class="modal fade" id="tablecustom">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="tabledate"></span>
                <span class="pull-right">Transaction#: <span id="tablecustomid"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Table Shape</th>
                  <th>color</th>
                  <th>Quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="tablelist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                    <form action="table_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="tableid" value="<?php echo $row['tableid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form>
                </tbody>
              </table>
                <p>
                 Order Type: <span id="tableordertype"></span>
              </p>
                 <p>
              Delivery Address: <span id="tabledelivery"></span>
              </p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- table modal -->
<div class="modal fade" id="tabledeliver">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="tabledeliverdate"></span>
                <span class="pull-right">Transaction#: <span id="tabledelivercustom"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Table Shape</th>
                  <th>color</th>
                  <th>Quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="tabledeliverlist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                    <form action="table_update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="tabledeliverid" value="<?php echo $row['tableid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form>
                </tbody>
              </table>
                <p>
                 Order Type: <span id="tableordertype1"></span>
              </p>
                 <p>
              Delivery Address: <span id="tabledelivery1"></span>
              </p>

               <p>
             Delivery Date: <span id="tabledeliverdate1"></span>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tablereceive">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="tablereceivedate"></span>
                <span class="pull-right">Transaction#: <span id="tablereceivecustom"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Shape</th>
                  
                  <th>color</th>
                  <th>quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="tablereceivelist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                   <!--          <form action="chair_update.php" method="POST" enctype="multipart/form-data">
                    <input type="" name="id" id="tablereceiveid" value="<?php echo $row['chairid'] ?>" />
                    <th colspan="4" align="right"><b>Status</b></th>
                    <th><span id="total">
                      <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
                    </span></th>
                    <th>

                      <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </th>
                  </form> -->
                </tbody>
              </table>
                 <p>
                 Order Type: <span id="tableordertype2"></span>
              </p>
                 <p>
              Delivery Address: <span id="tabledelivery2"></span>
              </p>
                 <p>
              Order Received: <span id="tablereceivedate1"></span>
              </p>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tablecustomerdone">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Transaction Full Details</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="tablecustomerreceivedate"></span>
                <span class="pull-right">Transaction#: <span id="tablereceivecustomer"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  
                  <th>Name</th>
                  <th>Shape</th>
                  
                  <th>color</th>
                  <th>quantity</th>
                  <th>Downpayment</th>
                  <th>Price</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="tablecustomerreceivelist">
                  <tr>
                    
                    
                    <td><span id="total"></span></td>
                  </tr>
                
                </tbody>
              </table>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Edit Profile -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Account</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="profile_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">First name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Last name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>
                  <div style="padding-left: 3.5%;" class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>

                   <select style="width:72%;" name="gender" id="gender" class="form-control"  required>
                  <option  value="male" >Male</option>
                  <option  value="female">Female</option>
                 
                    </select>
                </div>
                  <div class="form-group">
                    <label for="dob" class="col-sm-3 control-label">Date of Birth</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="dob" name="dob" value="<?php echo $user['date_of_birth']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $user['contact_info']; ?>">
                    </div>
                </div>
                   <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <input class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>" required>
                    </div>
                </div>
             
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <hr>
                
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="input current password to save changes" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>