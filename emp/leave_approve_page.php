
<?php include_once 'includes/session.php'; ?>
<?php include_once 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Leave Application Details
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Leave</li>
                <li class="active">Pending For Your Approval</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
                if(isset($_SESSION['error'])){
                echo "
                    <div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-warning'></i> Error!</h4>
                    ".$_SESSION['error']."
                    </div>
                ";
                unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                echo "
                    <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Success!</h4>
                    ".$_SESSION['success']."
                    </div>
                ";
                unset($_SESSION['success']);
                }
            ?>

            <div class="row" >

            <div class="col-xs-12">
            <div class="box">
            <div class="box-body" style="overflow-x: auto;">

                <?php
                    $session_emp_id = $_SESSION['emp_id'];
                    $session_leave_id = 0;
                    if(isset($_SESSION['leave_id'])){
                        $session_leave_id = $_SESSION['leave_id'];
                    }

                    $sql = "SELECT * FROM leaveapp 
                    LEFT JOIN position ON position.id = leaveapp.position_id
                    LEFT JOIN department ON department.id = leaveapp.department_id
                    LEFT JOIN company_division ON company_division.id = leaveapp.company_div
                    LEFT JOIN leave_type ON leave_type.id = leaveapp.leave_type_id
                    WHERE leaveapp.id='$session_leave_id' ";
                    
                    $query = $conn->query($sql);
                    if($query->num_rows < 1){
                        $_SESSION['error'] = 'Can not find leave application';
                    }else{
                        $row = $query->fetch_assoc();
                        $employee_name  = $row['employee_name'];
                        $employee_email = $row['employee_email'];
                        $position       = $row['description'];
                        $dept           = $row['department_name'];
                        $company_div    = $row['div_name'];
                        $leave_type     = $row['leave_description'];
                        $leave_purpose  = $row['leave_purpose'];
                        $leave_address  = $row['leave_address'];
                        $contact        = $row['contact'];
                        $alt_person_id  = $row['alt_person_id']; 
                        $supervisor_id  = $row['supervisor_id'];
                        $dept_head_id   = $row['dept_head_id'];
                        $hr_id          = $row['hr_id'];
                        $leave_from     = date('Y-m-d', strtotime($row['leave_from']));
                        $leave_to       = date('Y-m-d', strtotime($row['leave_to']));  
                    }

                    function getAllEmployee(){
                        $allemployee  = array();
                        $sql = "SELECT id, firstname, lastname FROM employees ORDER BY firstname ASC";
                        $query = $conn->query($sql);

                        if($query->num_rows < 1){
                            $_SESSION['error'] = 'Can not find employee';
                        }else{
                            while($row = $query->fetch_assoc()){
                                array_push($allemployee, array($row['id'], ($row['firstname'] . ' ' . $row['lastname'])));
                            }
                        }
                        
                        return $allemployee;
                    }
        
                ?>

                <form id="leaveform_approve" action="leave_approve_server.php" onSubmit="return validateLeaveForm();" method="POST" >
                    <!-- company division radio/checkbox section -->
                    <div class="container">
                        <div class="row" style="margin-top: 5px; margin-left: 5px">
                            <p><b>Company Division: </b><?php echo "$company_div"; ?> </p>
                        </div>
                    </div>
                    
                    <div class="container" style="margin-top: 5px;">
                        <!-- employee name/designation/department section -->
                        <div class="row" >
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
                        
                        <div class="row"  >
                            <div class="col-sm-6">
                                <input class=" form-control rounded-0 border border-left-0 " type="text" id="employee_name" name="employee_name" 
                                <?php echo "value='$employee_name'"; ?> 
                                readonly>
                            </div>
                            <div class="col-sm-3 ">
                                <input class="form-control rounded-0 border " type="text" id="employee_designation" name="employee_designation" 
                                <?php echo "value='$position'"; ?>
                                readonly>
                            </div>  
                            <div class="col-sm-3 ">
                                <input class="form-control rounded-0 border border-right-0 " type="text" id="employee_dept" name="employee_dept" 
                                <?php echo "value='$dept'"; ?>
                                readonly>
                            </div>
                        </div>                
                        
                        <br>
                        <div class="row" >
                            <!-- period/purpose/address/contact/duties section -->
                            <div class="col-sm-8">

                                <!-- Leave Period -->
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-3">
                                        <label class="control-label">Period of Leave: <span id="leave_period" class="label label-primary">days</span></label>
                                    </div>

                                    <div class="col-sm-7">   
                                        <div class='input-group date leave_form_datetime' >
                                            <input type='text' class="form-control" id="dateinput_from" name="dateinput_from" placeholder="From" 
                                            <?php echo "value='$leave_from'"; ?> required>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>

                                        <div class='input-group date leave_form_datetime' >
                                            <input type='text' class="form-control" id="dateinput_to" name="dateinput_to" placeholder="To" 
                                            <?php echo "value='$leave_to'"; ?> required>
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
                                        <select class="form-control" id="leavetype_select" name="leavetype_select" readonly>
                                            <option <?php echo "value='$leave_type'"; ?> selected hidden ><?php echo "$leave_type"; ?></option>
                                        </select>
                                    </div>
                                </div>

                                <!-- purpose of leave -->
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-3"> 
                                        <label class="control-label">Purpose of Leave: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="leave_purpose" name="leave_purpose" class="form-control" 
                                        <?php echo "value='$leave_purpose'"; ?> readonly>
                                    </div>
                                </div>

                                <!-- Address on leave -->
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-3">
                                        <label class="control-label">Address on Leave: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="leave_address" name="leave_address" class="form-control" 
                                        <?php echo "value='$leave_address'"; ?> readonly >
                                    </div>
                                </div>

                                <!-- Contact -->
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-3">
                                        <label class="control-label">Contact: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" id="employee_contact" name="employee_contact" class="form-control" 
                                        <?php echo "value='$contact'"; ?> readonly>
                                    </div>
                                </div>

                                <!-- Duties will be carried out by -->
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-3">
                                        <label class="control-label">Alternative person: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="alternate_person" name="alternate_person" readonly>
                                            <?php
                                                $alt_person = "";
                                                $sql = "SELECT firstname, lastname FROM employees WHERE id='$alt_person_id' ";
                                                $query = $conn->query($sql);
                                                if($query->num_rows > 0){
                                                    $row = $query->fetch_assoc();
                                                    $alt_person = $row['firstname'] . " " . $row['lastname'];
                                                }
                                            ?>
                                            
                                            <option <?php echo "value='$alt_person_id'"; ?> selected hidden ><?php echo "$alt_person"; ?></option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- supervisor select -->
                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-3">
                                        <label class="control-label">Supervisor: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="supervisor_select" name="supervisor_select" readonly>
                                            <?php
                                                $supervisor = "";
                                                $sql = "SELECT firstname, lastname FROM employees WHERE id='$supervisor_id' ";
                                                $query = $conn->query($sql);
                                                if($query->num_rows > 0){
                                                    $row = $query->fetch_assoc();
                                                    $supervisor = $row['firstname'] . " " . $row['lastname'];
                                                }
                                            ?>
                                            
                                            <option <?php echo "value='$supervisor_id'"; ?> selected hidden ><?php echo "$supervisor"; ?></option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- dept head select -->
                                <div class="row" style="margin-top: 5px; margin-bottom: 5px;">
                                    <div class="col-sm-3">
                                        <label for="hod_select" class=" control-label">Department Head: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <?php                                            
                                            if(($dept_head_id != 0 && $dept_head_id==$session_emp_id) || ($hr_id != 0 && $hr_id==$session_emp_id)){
                                                // select option 
                                                echo "<select class='form-control' id='hod_select' name='hod_select' readonly>";

                                                // show dept head name 
                                                $sql = "SELECT id, firstname, lastname FROM employees WHERE id='$dept_head_id' ";
                                                $query = $conn->query($sql);
                                                
                                                if($query->num_rows < 1){
                                                    $_SESSION['error'] = 'Can not find employee';
                                                }else{
                                                    $row = $query->fetch_assoc();    
                                                    echo "<option value='".$row['id']."' selected hidden>".$row['firstname'] . ' ' . $row['lastname']."</option>";
                                                } 

                                            }else{
                                                // select option 
                                                echo "<select class='form-control' id='hod_select' name='hod_select'>";                                            
                                                echo "<option value='' selected hidden >Select Department Head</option>";

                                                $allemployee  = array();
                                                $sql = "SELECT id, firstname, lastname FROM employees ORDER BY firstname ASC";
                                                $query = $conn->query($sql);

                                                if($query->num_rows < 1){
                                                    $_SESSION['error'] = 'Can not find employee';
                                                }else{
                                                    while($row = $query->fetch_assoc()){
                                                        array_push($allemployee, array($row['id'], ($row['firstname'] . ' ' . $row['lastname'])));
                                                    }
                                                }

                                                for ($i=0; $i<count($allemployee); $i++){
                                                    $id = $allemployee[$i][0];
                                                    $name = $allemployee[$i][1];
                                                    echo "<option value='$id'>$name</option>";
                                                }
                                            }

                                            echo "</select>";
                                        ?>
                                        
                                    </div>
                                </div>

                                <!-- HR Manager Select -->
                                <?php
                                if(($dept_head_id != 0 && $dept_head_id==$session_emp_id) || ($hr_id != 0 && $hr_id==$session_emp_id)){
                                ?>
                                <div class="row" style="margin-top: 5px; margin-bottom: 5px;">
                                    <div class="col-sm-3">
                                        <label for="hr_select" class=" control-label">HR Manager: </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <?php                                            
                                            if($hr_id != 0 && $hr_id==$session_emp_id){
                                                // select option 
                                                echo "<select class='form-control' id='hr_select' name='hr_select' readonly>";

                                                // show dept head name 
                                                $sql = "SELECT id, firstname, lastname FROM employees WHERE id='$hr_id' ";
                                                $query = $conn->query($sql);
                                                
                                                if($query->num_rows < 1){
                                                    $_SESSION['error'] = 'Can not find employee';
                                                }else{
                                                    $row = $query->fetch_assoc();    
                                                    echo "<option value='".$row['id']."' selected hidden>".$row['firstname'] . ' ' . $row['lastname']."</option>";
                                                } 

                                            }else{
                                                // select option 
                                                echo "<select class='form-control' id='hr_select' name='hr_select'>";                                            
                                                echo "<option value='' selected hidden >Select HR Manager</option>";

                                                $allemployee  = array();
                                                $sql = "SELECT id, firstname, lastname FROM employees ORDER BY firstname ASC";
                                                $query = $conn->query($sql);

                                                if($query->num_rows < 1){
                                                    $_SESSION['error'] = 'Can not find employee';
                                                }else{
                                                    while($row = $query->fetch_assoc()){
                                                        array_push($allemployee, array($row['id'], ($row['firstname'] . ' ' . $row['lastname'])));
                                                    }
                                                }
                                                for ($i=0; $i<count($allemployee); $i++){
                                                    $id = $allemployee[$i][0];
                                                    $name = $allemployee[$i][1];
                                                    echo "<option value='$id'>$name</option>";
                                                }
                                            }

                                            echo "</select>";
                                        ?>
                                        
                                    </div>
                                </div>

                                <?php
                                }
                                ?>
                            

                            </div>

                            <!-- Leave Balance Table Section -->
                            <div class="col-sm-4" style="margin-top: 5px; margin-bottom: 5px;">
                                <div class="row bg-primary text-center" style="border: 1px solid black; border-bottom: 0px">
                                    <label class="control-label" style="font-size:12px;"><b>Leave (No. of days)</b></label>
                                </div>

                                <div class="row" style="overflow-x: auto;">
                                    <table class="table table-sm text-center" id="table_leave_balance" style="font-size:12px; border: 1px solid black;">	
                                        <thead>
                                            <tr>
                                                <th scope="col" style='font-size:12px; border: 1px solid black;'>#</th>
                                                <?php
                                                    // Table head
                                                    $applicant_id = 0;
                                                    $employee_type = 0;

                                                    $sql = "SELECT id, employee_type FROM employees WHERE email='$employee_email'" ;
                                                    $query = $conn->query($sql);
                                                    if($query->num_rows < 1){
                                                        $_SESSION['error'] = 'Can not find applicant employee-id';
                                                    }else{
                                                        $row  = $query->fetch_assoc();
                                                        $applicant_id = $row['id'];
                                                        $employee_type = $row['employee_type'];
                                                    }

                                                    if($employee_type != 0){
                                                        $sql = "SELECT *, leave_allocation.id as leave_id FROM leave_allocation 
                                                        LEFT JOIN employee_type ON employee_type.id = leave_allocation.emp_type_id
                                                        LEFT JOIN leave_type ON leave_type.id = leave_allocation.leave_type_id
                                                        WHERE leave_allocation.emp_type_id = '$employee_type' ORDER BY leave_allocation.leave_type_id ASC";
                                            
                                                        $query = $conn->query($sql);
                                                        while($row  = $query->fetch_assoc()){
                                                            echo "
                                                                <th style='font-size:12px; border: 1px solid black;'>".$row['leave_description']."</th>     
                                                            ";
                                                        }
                                                    }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <th scope="row" style='font-size:12px; border: 1px solid black;'>Total</th>
                                            <?php
                                                // Total leave row
                                                if($employee_type != 0){
                                                    $sql = "SELECT *, leave_allocation.id as leave_id FROM leave_allocation 
                                                    LEFT JOIN employee_type ON employee_type.id = leave_allocation.emp_type_id
                                                    LEFT JOIN leave_type ON leave_type.id = leave_allocation.leave_type_id
                                                    WHERE leave_allocation.emp_type_id = '$employee_type' ORDER BY leave_allocation.leave_type_id ASC";
                                        
                                                    $query = $conn->query($sql);
                                                    while($row  = $query->fetch_assoc()){
                                                        echo "
                                                            <td style='font-size:12px; border: 1px solid black;'>". $row['quantity'] ."</td>        
                                                        ";
                                                    }
                                                }
                                            ?>
                                            </tr>
                                            <tr>
                                            <th scope="row" style='font-size:12px; border: 1px solid black;'>Remaining</th>
                                            <?php
                                                // Remaining leave row 
                                                if($employee_type != 0){
                                                    $sql = "SELECT *, leave_allocation.id as leave_id FROM leave_allocation 
                                                    LEFT JOIN employee_type ON employee_type.id = leave_allocation.emp_type_id
                                                    LEFT JOIN leave_type ON leave_type.id = leave_allocation.leave_type_id
                                                    WHERE leave_allocation.emp_type_id = '$employee_type' ORDER BY leave_allocation.leave_type_id ASC";
                                        
                                                    $query = $conn->query($sql);
                                                    $leave_type_id  = array();
                                                    $total_leave    = array();
                                                    $remaining_leave = array();
                                                    while($row  = $query->fetch_assoc()){
                                                        array_push($leave_type_id, $row['leave_type_id']);
                                                        array_push($total_leave, $row['quantity']);
                                                    }

                                                    $leave_spent = 0;
                                                    $i = 0;
                                                    foreach($leave_type_id as $value){
                                                        $sql = "SELECT leave_spent FROM remaining_leave WHERE employee_id='$applicant_id' AND leave_type_id='$value'";
                                                        $query = $conn->query($sql);

                                                        if($query->num_rows < 1){
                                                            $leave_spent = 0;
                                                        }else{
                                                            $row = $query->fetch_assoc();
                                                            $leave_spent = $row['leave_spent'];
                                                        }

                                                        array_push($remaining_leave, ($total_leave[$i++] - $leave_spent));
                                                    }
                                                    
                                                    foreach($remaining_leave as $value){
                                                        echo "
                                                            <td style='font-size:12px; border: 1px solid black;'>". $value ."</td>        
                                                        ";
                                                    }
                                                }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>    

                        <br>
                        <!-- signature of supervisor section -->
                        <div class="col-sm-4" >
                            <div class="row">
                                <input type="text" id="forwarder_signature" name="forwarder_signature" class="form-control">
                            </div>
                            <div class="row">
                                <label class="control-label" style="margin-top: 5px">Signature of the Forwarder </label>
                            </div>
                        </div>

                        <br><br>
                        <!-- form submit section -->
                        <div class="form group text-right" style=" margin-bottom: 10px;">
                            <button type="button" class="btn btn-success" id="forward_button" name="forward_button">Forward</button>
                            <button type="button" class="btn btn-danger" id="reject_button" name="reject_button">Reject</button>
                            <input type="reset"  class="btn btn-warning" id="reset_button"  name="reset_button">
                        </div> 

                        <!-- Forward Modal -->
                        <div class="modal fade" id="forward_modal" role="dialog" >
                            <div class="modal-dialog modal-md modal-dialog-centered"  >
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title"><b>Confirm?</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="forward_modal_text" >
                                        <b>Make sure you want to forward</b>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-info" id="submit_forward" name="submit_forward">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="reject_modal" role="dialog" >
                            <div class="modal-dialog modal-md modal-dialog-centered"  >
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title"><b>Confirm?</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <p id="reject_modal_text">
                                        Make sure you want to reject
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-info" id="submit_reject" name="submit_reject">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            </div> 
            </div>
            </div>

        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

<script>

$('#forward_button').click(function(){
    var msg = "";
    if(validateLeaveForm()){
        msg = " Make sure you want to forward ";
        $('#forward_modal_text').text(msg).css('color', 'black');
        $('#forward_modal #submit_forward').attr("disabled", false);
    }else{
        msg = 'Warning! Please fill up the required field.';
        $('#forward_modal_text').text(msg).css('color', 'orange');
        $('#forward_modal #submit_forward').attr("disabled", true);
    }
    $('#forward_modal').modal('show');
});

$('#reject_button').click(function(){
    var msg = "";
    if(validateLeaveForm()){
        msg = " Make sure you want to reject ";
        $('#reject_modal_text').text(msg).css('color', 'black');
        $('#reject_modal #submit_reject').attr("disabled", false);
    }else{
        msg = 'Warning! Please fill up the required field.';
        $('#reject_modal_text').text(msg).css('color', 'orange');
        $('#reject_modal #submit_reject').attr("disabled", true);
    }
    $('#reject_modal').modal('show');
});

function validateLeaveForm(){       
    var valid = true;
    if($('#hod_select').val()==""){
        valid = false;
    }
    
    if($('#hr_select').val()==""){
        valid = false;
    }

    if ($('#forwarder_signature').val()=="") {
        valid = false;
    }

    return valid;
}
</script>

</body>
</html>
