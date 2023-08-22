<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Chair Height</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="chair_height_add.php">
                <div class="form-group">
                    <label for="height" class="col-sm-3 control-label">Chair Height</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="height" name="height" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname">Update Photo</span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="chair_height_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="heightid" name="id">
                <div class="form-group">
                    <label for="edit_photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="edit_photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> 

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Height and price</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="chair_height_edit.php">
                <input type="hidden" class="heightid" name="id">
                  <div class="form-group">
                    <label for="edit_height" class="col-sm-3 control-label">Chair Height</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_height" name="height" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_price" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_price" name="price">
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
              <form class="form-horizontal" method="POST" action="chair_height_delete.php">
                <input type="hidden" class="heightid" name="id">
                <div class="text-center">
                  <p>DELETE HEIGHT?</p>
                    <h2 class="bold heightname"></h2>
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
