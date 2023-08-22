<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Status</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="plantstand_order_edit.php">
                <input type="hidden" class="customid" name="id">
              <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status</label>
                   <div class="col-sm-9">
                  <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                  <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Pending</option>
                  <option value="3" <?php echo isset($meta['status']) && $meta['status'] == 3 ? 'selected' : '' ?>>Out for Delivery</option>
                  <option value="4" <?php echo isset($meta['status']) && $meta['status'] == 4 ? 'selected' : '' ?>>Done and Paid</option>
                    </select>
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
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="plantstand_order_delete.php">
                <input type="hidden" class="customid" name="id">
                <div class="text-center">
                    <p>Are you sure to delete this order permanently?</p>
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="remove">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="plantstand_delivery_del.php">
                <input type="hidden" class="customid" name="id">
                <div class="text-center">
                    <p>Are you sure to delete this order permanently?</p>
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
