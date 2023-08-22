<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Quantity...</b></h4>
            </div>
             <div class="modal-body">
              <form class="form-horizontal" method="POST" action="product_quantity_edit.php">
                <input type="hidden" class="prodid" name="id">
             
            

                <div class="form-group">
                    <label for="quantity" class="col-sm-3 control-label">Quantity</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="quantity" name="quantity">
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
