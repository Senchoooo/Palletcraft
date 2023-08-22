
<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Layer and Price</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="plantstand_add.php">
                <div class="form-group">
                    <label for="layer" class="col-sm-3 control-label">Layer</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="layer" name="layer" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-3 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
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
              <form class="form-horizontal" method="POST" action="layer_photo_update.php" enctype="multipart/form-data">
                <input type="hidden" class="customid" name="id">
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
              <h4 class="modal-title"><b>Edit Category</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="plantstand_edit.php">
                <input type="hidden" class="customid" name="id">
                  <div class="form-group">
                    <label for="edit_layer" class="col-sm-3 control-label">Layer</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_layer" name="layer" required>
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
              <form class="form-horizontal" method="POST" action="plantstand_delete.php">
                <input type="hidden" class="customid" name="id">
                <div class="text-center">
                    <p>DELETE LAYER AND PRICE?</p>
                    <h2 class="bold customname"></h2>
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
