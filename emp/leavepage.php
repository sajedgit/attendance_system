
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="container">
        <h3 class="text-center"><strong>Leave Application Form</strong></h3>
        <div id="leave-app-employee-section">
            <form action="leaveapp.php" method="POST" style="border: 1px solid black">
                <!-- company division radio/checkbox section -->
                <div class="container">
                    <div class="row" style="margin-top: 5px; margin-left: 5px">
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="SIL" checked><b>SIL</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="TB"><b>TB</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="MT"><b>MT</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="radio_company_div" value="SB"><b>SB</b>
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
                        <div class="col-sm-6">
                            <input class=" form-control rounded-0 border border-left-0 " type="text" id="employee_name" name="employee_name" placeholder="Dhiman Kumar Sarker" >
                        </div>
                        <div class="col-sm-3 ">
                            <input class="form-control rounded-0 border " type="text" id="employee_designation" name="employee_designation" placeholder="Programmer" >
                        </div>
                        <div class="col-sm-3 ">
                            <input class="form-control rounded-0 border border-right-0 " type="text" id="employee_dept" name="employee_dept" placeholder="Software Implementation" >
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
                                    <div class='input-group date leave_form_datetime' data-provide="datepicker">
                                        <input type='text' class="form-control" id="dateinput_from" name="dateinput_from" placeholder="From" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>

                                    <div class='input-group date leave_form_datetime' data-provide="datepicker">
                                        <input type='text' class="form-control" id="dateinput_to" name="dateinput_to" placeholder="To" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                
                                </div>
                            </div>

                            <!-- purpose of leave -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3"> 
                                    <label class="control-label">Purpose of Leave: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="leave_purpose" name="leave_purpose" class="form-control rounded-0 border-left-0 border-right-0 border-top-0" required>
                                </div>
                            </div>

                            <!-- Address on leave -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Address on Leave: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="leave_address" name="leave_address" class="form-control rounded-0 border-left-0 border-right-0 border-top-0" required>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Contact: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="employee_contact" name="employee_contact" class="form-control rounded-0 border-left-0 border-right-0 border-top-0" required>
                                </div>
                            </div>

                            <!-- Duties will be carried out by -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label class="control-label">Duties will be carried out by: </label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="duties_carried_by" name="duties_carried_by" class="form-control rounded-0 border-left-0 border-right-0 border-top-0" required>
                                </div>
                            </div>

                            <!-- supervisor select -->
                            <div class="row" style="margin-top: 5px">
                                <div class="col-sm-3">
                                    <label for="supervisor_select" class=" control-label">Supervisor</label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control rounded-0 border-left-0 border-right-0 border-top-0" id="supervisor_select" name="supervisor_select">
                                        <option>Select Supervisor</option>
                                        <option>shoikot@gmail.com</option>
                                        <option>mainul@gmail.com</option>
                                        <option>masud@gmail.com</option>
                                    </select>
                                </div>
                            </div>

                            <!-- HOD select -->
                            <div class="row" style="margin-top: 5px; margin-bottom: 5px;">
                                <div class="col-sm-3">
                                    <label for="hod_select" class="control-label">Department Head</label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control rounded-0 border-left-0 border-right-0 border-top-0" id="hod_select" name="hod_select">
                                        <option>Select HOD</option>
                                        <option>shahjalal@gmail.com</option>
                                        <option>shoikot@gmail.com</option>
                                        <option>mainul@gmail.com</option>
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
                            <input type="text" id="employee_signature" name="employee_signature" class="form-control rounded-0 border-left-0 border-right-0 border-top-0" required>
                        </div>
                        <div class="row">
                            <label class="control-label" style="margin-top: 5px">Signature of the employee (Applicant) </label>
                        </div>
                    </div>

                    <br><br>
                    <!-- form submit section -->
                    <div class="form group text-right" style="margin-right: 30px; margin-bottom: 10px;">
                        <input type="submit" class="btn btn-success" id="submit_button" name="submit_button">
                        <input type="reset"  class="btn btn-warning" id="reset_button"  name="reset_button">
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

</body>
</html>
