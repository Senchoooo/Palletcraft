<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Materials</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_add.php">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>
                  
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                
                 

                </div>
                  <div class="form-group">
                  <label for="quantity" class="col-sm-1 control-label">Quantity</label>
                  
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="quantity" name="quantity" required>
                  </div>

                  
                </div>

                </div>
           
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button  type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
 
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Stock In...</b></h4>
            </div>
             <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_edit.php">
                <input type="hidden" class="stockid" name="id">
                 <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_name" name="name"  readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="squantity" class="col-sm-3 control-label">Quantity Remaining</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="squantity" name="squantity"  readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_quantity" class="col-sm-3 control-label">quantity</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_quantity" name="quantity">
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


<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Stock Out..</b></h4>
            </div>
               <div class="modal-body">
              <form class="form-horizontal" method="POST" action="stock_delete.php">
                <input type="hidden" class="stockid" name="id">
                 <div class="form-group">
                    <label for="edit_stock" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_stock" name="name" readonly >
                    </div>
                </div>
                 <div class="form-group">
                    <label for="dquantity" class="col-sm-3 control-label">Quantity Remaining</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="dquantity" name="dquantity" readonly >
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_number" class="col-sm-3 control-label">quantity</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_number" name="quantity">
                    </div>
                </div>
                  <div class="form-group">
                    <label for="squantity" class="col-sm-3 control-label">Reasons</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="reason" name="reason" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button onclick="checkInventory()" type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i>Update</button>
<!--                            <script>
  const stock_list = [
  { name: "name", quantity: 0 },

  
];
  function checkInventory() {
  for (let i = 0; i < stock_list.length; i++) {
    if (stock_list[i].quantity === 0) {
      alert(`The quantity of ${stock_list[i].name} is already 0 You need to stock in now! `);
    }
  }
}


</script> -->
              </form>
            </div>
        </div>
    </div>
</div>


