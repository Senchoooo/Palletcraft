<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div style="width: 80%;" class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Quantity</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="product_inventory_edit.php">
                <input type="hidden" class="prodid" name="id">
                 <input type="hidden" class="stockid" name="stockid" value="<?php echo $row['stockid']; ?>">
                <div class="form-group">
                  
                  <label for="edit_name" class="col-sm-1 control-label">Name</label>
                  <div class="col-sm-9">

                    <input type="text" class="form-control" id="edit_name" name="name" readonly>
                     <input type="hidden" class="form-control"  name="palleta" value="Pallet" readonly>
                  </div>

                </div>
                <div class="form-group">
         
                  <label for="edit_quantity" class="col-sm-1 control-label">Quantity</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="prd_quantity">
                  </div>
                </div>
                 <div class="form-group">
                
                  <label for="edit_pallet" class="col-sm-1 control-label">Pallet</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="pallet">
                  </div>
                </div>
          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button onclick="checkInventory()" type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
<!--                                                         <script>
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
              </form>
            </div>
        </div>
    </div>
</div>
