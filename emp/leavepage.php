
<?php include_once 'includes/session.php'; ?>
<?php include_once 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="container">
        <h3 class="text-center bounce"><strong>Leave Application Form</strong></h3>
        <div id="leave-app-employee-section">
            <form id="leaveform" action="leaveapp.php" onSubmit="return validateLeaveForm();" method="POST" style="border: 2px solid black">
                <!-- company division radio/checkbox section -->
                <div class="container">
                    <div class="row" style="margin-top: 5px; margin-left: 5px">
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="1" checked><b>SIL</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="2"><b>TB</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="3"><b>MT</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="4"><b>SB</b>
                        </label>
                    </div>
                </div>
                
                <div class="container" style="margin-top: 5px;">
                    <!-- employee name/designation/department section -->
                    <div class="row" style="margin-right: 15px">
                        <div class="col-sm-6 text-center bg-light border border-bottom-0 border-left-0">
                            <label class="control-label"><b>NAME OF THE EMPLOYEE</b></label>
                        </div>
                        <div class="col-sm-3 text-center bg-light border border-bottom-0">
                            <label class="control-label"><b>DESIGNATION</b></label>
                        </div>
                        <div class="col-sm-3 text-center bg-light border border-bottom-0 border-right-0">
                            <label class="control-label"><b>DEPARTMENT</b></label>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-right: 15px">
                        <?php
                            $employee_id = $_SESSION['emp_id'];
                            $employee_name = "";
                            $position_id = "";
                            $department_id = "";
                            $position = "";
                            $dept = "";
                            $sql = "SELECT * FROM employees WHERE id = '$employee_id'";
                            $query = $conn->query($sql);
                    
                            if($query->num_rows < 1){
                                $_SESSION['error'] = 'Can not find user';
                            }else{
                                $row = $query->fetch_assoc();
                                $employee_name = $row['firstname'] . ' ' . $row['lastname'];
                                $position_id = $row['position_id'];
                                $department_id = $row['department_id'];  
                            }

                            $sql = "SELECT * FROM position WHERE id = '$position_id' ";
                            $query = $conn->query($sql);
                    
                            if($query->num_rows < 1){
                                $_SESSION['error'] = 'Can not find user';
                            }else{
                                $row = $query->fetch_assoc();
                                $position = $row['description'];
                            }

                            $sql = "SELECT * FROM department WHERE id = '$department_id' ";
                            $query = $conn->query($sql);
                    
                            if($query->num_rows < 1){
                                $_SESSION['error'] = 'Can not find user';
                            }else{
                                $row = $query->fetch_assoc();
                                $dept = $row['department_name'];
                            }

                            $allemployee  = array();
                            $sql = "SELECT * FROM employees";
                            $query = $conn->query($sql);
                    
                            if($query->num_rows < 1){
                                $_SESSION['error'] = 'Can not find user';
                            }else{
                                while($row = $query->fetch_assoc()){
                                    array_push($allemployee, array($row['id'], ($row['firstname'] . ' ' . $row['lastname'])));
                                }
                            }                        
                        ?>

                        <div class="col-sm-6">
                            <input class=" form-control rounded-0 border border-left-0 " type="text" id="employee_name" name="employee_name" 
                            <?php echo "value='$employee_name'"; ?> 
                            >
                        </div>
                        <div class="col-sm-3 ">
                            <input class="form-control rounded-0 border " type="text" id="employee_designation" name="employee_designation" 
                            <?php echo "value='$position'"; ?>
                            >
                        </div>  
                        <div class="col-sm-3 ">
                            <input class="form-control rounded-0 border border-right-0 " type="text" id="employee_dept" name="employee_dept" 
                            <?php echo "value='$dept'"; ?>
                            >
                        </div>
                    </div>                
                    
                    <br>
                    <div class="row" style="margin-right: 30px">
                        <!-- period/purpose/address/contact/duties section -->
                        <div class="col-sm-8">
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Period of Leave: <span id="leave_period" class="label label-primary">days</span></label>
                                </div>

                                <div class="col-sm-7">    
                                    <div class='input-group date leave_form_datetime' >
                                        <input type='text' class="form-control" id="dateinput_from" name="dateinput_from" placeholder="From" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>

                                    <div class='input-group date leave_form_datetime' >
                                        <input type='text' class="form-control" id="dateinput_to" name="dateinput_to" placeholder="To" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                
                                </div>
                            </div>

                            <!-- Leave type select -->
                            <div class="row" style="margin-top: 5px;">
                                <div class="col-sm-3">
                                    <label for="leavetype_select" class="control-label">Leave Type: </label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control" id="leavetype_select" name="leavetype_select" required>
                                        <option value="" selected hidden >Select Leave Type</option>
                                        <option value='Casual'>Casual</option>
                                        <option value='Sick'>Sick</option>
                                        <option value='Earned'>Earned</option>
                                        <option value='Maternity'>Maternity</option>
                                        <option value='Others'>Others</option>
                                    </select>
                                </div>
                            </div>

                            <!-- purpose of leave -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3"> 
                                    <label class="control-label">Purpose of Leave: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="leave_purpose" name="leave_purpose" class="form-control" required>
                                </div>
                            </div>

                            <!-- Address on leave -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Address on Leave: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="leave_address" name="leave_address" class="form-control" required>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Contact: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="employee_contact" name="employee_contact" class="form-control" required>
                                </div>
                            </div>

                            <!-- Duties will be carried out by -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Alternative person: </label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control" id="alternate_person" name="alternate_person" required>
                                        <option value="" selected hidden >Select Alternative Person</option>
                                        <?php
                                            for ($i=0; $i<count($allemployee); $i++){
                                                $id = $allemployee[$i][0];
                                                $name = $allemployee[$i][1];
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- supervisor select -->
                            <div class="row" style="margin-top: 5px; margin-bottom: 5px;">
                                <div class="col-sm-3">
                                    <label for="supervisor_select" class=" control-label">Supervisor: </label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control" id="supervisor_select" name="supervisor_select" required>
                                    <option value="" selected hidden >Select Supervisor</option>
                                        <?php
                                            for ($i=0; $i<count($allemployee); $i++){
                                                $id = $allemployee[$i][0];
                                                $name = $allemployee[$i][1];
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- blank column -->
                        <!-- <div class="col-sm-1">

                        </div> -->

                        <!-- Leave Balance Table Section -->
                        <div class="col-sm-4" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="row bg-primary text-center" style="border: 1px solid black; border-bottom: 0px">
                                <label class="control-label" style="font-size:12px;"><b>Leave (No. of days)</b></label>
                            </div>

                            <!-- overflow-x: visible|hidden|scroll|auto|initial|inherit; -->
                            <div class="row" style="overflow-x: auto;">
                                <table class="table  text-center" id="table_leave_balance" style="font-size:12px; border: 1px solid black;">	
                                    <thead>
                                        <tr>
                                            <th style="font-size:12px; border: 1px solid black;">Casual</th>
                                            <th style="font-size:12px; border: 1px solid black;">Sick</th>
                                            <th style="font-size:12px; border: 1px solid black;">Earned</th>
                                            <th style="font-size:12px; border: 1px solid black;">Maternity</th>
                                            <th style="font-size:12px; border: 1px solid black;">Other</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="font-size:12px; border: 1px solid black;">12</td>
                                            <td style="font-size:12px; border: 1px solid black;">12</td>
                                            <td style="font-size:12px; border: 1px solid black;">0</td>
                                            <td style="font-size:12px; border: 1px solid black;">2</td>
                                            <td style="font-size:12px; border: 1px solid black;">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                    </div>    

                    <br>
                    <!-- signature of employee section -->
                    <div class="col-sm-4" style="margin-right: 30px">
                        <div class="row">
                            <input type="text" id="employee_signature" name="employee_signature" class="form-control" required>
                        </div>
                        <div class="row">
                            <label class="control-label" style="margin-top: 5px">Signature of the employee (Applicant) </label>
                        </div>
                    </div>

                    <br><br>
                    <!-- form submit section -->
                    <div class="form group text-right" style="margin-right: 30px; margin-bottom: 10px;">
                        <button type="button" class="btn btn-success" id="submit_button" name="submit_button" data-toggle="modal" data-target="#myModal">Submit</button>
                        <input type="reset"  class="btn btn-warning" id="reset_button"  name="reset_button">
                    </div> 

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog" >
                        <div class="modal-dialog modal-sm modal-dialog-centered"  >
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Make sure you want to submit</h4>
                                </div>
                                <!-- <div class="modal-body">
                                    <h4 class="text">
                                    Are you sure, want to submit?
                                    </h4>
                                </div> -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-info" id="submit_button_modal" name="submit_button_modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </form>
        </div>
        <br>
    </div>


  </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<script>
function validateLeaveForm(){       
    var valid = true;
    if($('#alternate_person').val()==0 || $('#supervisor_select').val()==0 || $('#leavetype_select').val()==0){
        valid = false;
    }
    
    if(!valid){
        alert('Please Fill the form with correct values');
    }
    return valid;
}
</script>

</body>
</html>
