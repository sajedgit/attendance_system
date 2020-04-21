<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Leave</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="leave_alloc_add.php">
          		  
				<div class="form-group">
                    <label for="add_employee_type" class="col-sm-3 control-label">Employee Type</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="add_employee_type" id="add_employee_type" required>
                        <option value="" selected>- Select -</option>
                        <?php
                            $sql = "SELECT * FROM employee_type ";
                            $query = $conn->query($sql);
                            while($prow = $query->fetch_assoc()){
                                echo "
                                <option value='".$prow['id']."'>".$prow['type_description']."</option>
                                ";
                            }
                        ?>
                      </select>
                    </div>
                </div>

				<div class="form-group">
                    <label for="add_leave_type" class="col-sm-3 control-label">Leave Type</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="add_leave_type" id="add_leave_type" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT * FROM leave_type ";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['leave_description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

				<div class="form-group">
                    <label for="add_quantity" class="col-sm-3 control-label">Leave Quantity</label>
                    <div class="col-sm-9">
						<input type="number" class="form-control" id="add_quantity" name="add_quantity" required>
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

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Leave</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="leave_alloc_edit.php">
				<input type="hidden" class="leave_id" name="id">
				<div class="form-group">
                    <label for="edit_employee_type" class="col-sm-3 control-label">Employee Type</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="edit_employee_type" id="edit_employee_type" required>
					  	<option selected id="employee_type_val"></option>
                        <?php
                          $sql = "SELECT * FROM employee_type ";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['type_description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

				<div class="form-group">
                    <label for="edit_leave_type" class="col-sm-3 control-label">Leave Type</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="edit_leave_type" id="edit_leave_type" required>
					  	<option selected id="leave_type_val"></option>
                        <?php
                          $sql = "SELECT * FROM leave_type ";
                          $query = $conn->query($sql);
                          while($prow = $query->fetch_assoc()){
                            echo "
                              <option value='".$prow['id']."'>".$prow['leave_description']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>

				<div class="form-group">
                    <label for="edit_quantity" class="col-sm-3 control-label">Leave Quantity</label>
                    <div class="col-sm-9">
						<input type="number" class="form-control" id="edit_quantity" name="edit_quantity" required>
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
            	<h4 class="modal-title"><b>Delete</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="leave_alloc_delete.php">
					<input type="hidden" class="leave_id" name="id">
            		<div class="text-center">
	                	<p>DELETE LEAVE</p>
	                	<h2 id="del_leave_alloc" class="bold"></h2>
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


     