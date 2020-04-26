<?php 
        include_once 'includes/session.php';  
        include_once 'includes/conn.php';    
          
        htmlspecialchars($_SERVER["PHP_SELF"]) . "</br></br>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleFormPostRequest($conn);
            header('location: leave_form_response.php');
        }

        function handleFormPostRequest($conn){
            if(isset($_POST['submit_reject']) || isset($_POST['submit_forward'])){
                if(isset($_SESSION['leave_id'])){
                    $leave_id = $_SESSION['leave_id'];
                
                    $rawdate = htmlentities($_POST["dateinput_from"]);
                    $date_from = date('Y-m-d', strtotime($rawdate));

                    $rawdate = htmlentities($_POST["dateinput_to"]);
                    $date_to = date('Y-m-d', strtotime($rawdate)); 

                    $supervisor_id = test_input($_POST['supervisor_select']);
                    $dept_head_id  = test_input($_POST['hod_select']);            
                    $forwarder_emp_id = $_SESSION['emp_id'];

                    $hr_id = 0;
                    if(isset($_POST['hr_select'])){
                        $hr_id = test_input($_POST['hr_select']);
                    }

                    // database query 
                    if(isset($_POST['submit_forward'])){
                        if($forwarder_emp_id==$supervisor_id){
                            $sql = "UPDATE leaveapp SET leave_from='$date_from', leave_to='$date_to', dept_head_id='$dept_head_id',
                            supervisor_approval='APPROVED' WHERE id='$leave_id' ";
                        }elseif($forwarder_emp_id==$dept_head_id){
                            $sql = "UPDATE leaveapp SET leave_from='$date_from', leave_to='$date_to', hr_id='$hr_id', 
                            hod_approval='APPROVED' WHERE id='$leave_id' ";
                        }elseif($forwarder_emp_id==$hr_id){
                            $sql = "UPDATE leaveapp SET leave_from='$date_from', leave_to='$date_to', hr_approval='APPROVED' WHERE id='$leave_id' ";
                        }

                        if ($conn->query($sql) === TRUE) {
                            $_SESSION['success'] = "Request Submitted Successfully.";
                        } else {
                            $_SESSION['error'] = $conn->error;
                        }

                        // update remaining leave 
                        $sql = "SELECT * FROM leaveapp WHERE id='$leave_id' ";
                        $query = $conn->query($sql);
                        if($query->num_rows > 0){
                            $row = $query->fetch_assoc();
                            if($forwarder_emp_id==$hr_id){
                                if($row['supervisor_approval']=='APPROVED' && $row['hod_approval']=='APPROVED' && $row['hr_approval']=='APPROVED'){
                                    $sql = "UPDATE leaveapp SET final_status='APPROVED' WHERE id='$leave_id' ";
                                }else{
                                    $sql = "UPDATE leaveapp SET final_status='REJECTED' WHERE id='$leave_id' ";
                                }

                                $query = $conn->query($sql);
                                if ($conn->query($sql) === TRUE) {
                                    if($row['supervisor_approval']=='APPROVED' && $row['hod_approval']=='APPROVED' && $row['hr_approval']=='APPROVED'){
                                        // add leave spent 
                                        // get employee email, date & leave type id 
                                        $sql = "SELECT * FROM leaveapp WHERE id='$leave_id' ";
                                        $query = $conn->query($sql);
                                        if($query->num_rows > 0){
                                            $row = $query->fetch_assoc();
                                            $email = $row['employee_email'];
                                            $leave_start     = ($row['leave_from']);
                                            $leave_end       = ($row['leave_to']);  
                                            $leave_type_id = $row['leave_type_id'];

                                            $datetime1 = new DateTime($leave_start);
                                            $datetime2 = new DateTime($leave_end);
                                            $difference = $datetime1->diff($datetime2);
                                            $day_difference = $difference->d;
                                            // echo 'Difference: ' . $day_difference .' days </br>';
                                            
                                            $leave_year = date('Y', strtotime($leave_start));
                                            // echo "year: " . $leave_year . "</br>";

                                            $sql = "SELECT id FROM employees WHERE email='$email' ";
                                            $query = $conn->query($sql);
                                            $row = $query->fetch_assoc();
                                            $emp_id = $row['id'];

                                            $sql = "SELECT * FROM remaining_leave WHERE employee_id='$emp_id' AND leave_type_id='$leave_type_id' ";
                                            $query = $conn->query($sql);

                                            if($query->num_rows == 0){
                                                // insert
                                                // echo "zero row. so insert </br>";
                                                $row = $query->fetch_assoc();
                                                $sql = "INSERT INTO remaining_leave (employee_id, year, leave_type_id, leave_spent) 
                                                        VALUES ('$emp_id', '$leave_year', '$leave_type_id', '$day_difference') "; 
                                            }else{
                                                // update 
                                                // echo "row present. so update </br>";
                                                $row = $query->fetch_assoc();
                                                $leave_already_spent = $row['leave_spent'];
                                                $leave_total_spent = $leave_already_spent + $day_difference;

                                                $sql = "UPDATE remaining_leave SET leave_spent='$leave_total_spent' WHERE employee_id='$emp_id' AND leave_type_id='$leave_type_id' ";
                                            }

                                            if ($conn->query($sql) === TRUE) {
                                                echo "remaining leave table updated </br>";
                                            }else{
                                                echo "error while updating remaining leave table! </br>";
                                            }

                                        }

                                            
                                    }   
                                } else {
                                    $_SESSION['error'] = $conn->error;;
                                }
                            }
                        }

                    }elseif(isset($_POST['submit_reject'])){
                        if($forwarder_emp_id==$supervisor_id){
                            $sql = "UPDATE leaveapp SET dept_head_id='$dept_head_id', supervisor_approval='REJECTED' WHERE id='$leave_id' ";
                        }elseif($forwarder_emp_id==$dept_head_id){
                            $sql = "UPDATE leaveapp SET hr_id='$hr_id', hod_approval='REJECTED' WHERE id='$leave_id' ";
                        }elseif($forwarder_emp_id==$hr_id){
                            $sql = "UPDATE leaveapp SET hr_approval='REJECTED', final_status='REJECTED' WHERE id='$leave_id' ";
                        }

                        if ($conn->query($sql) === TRUE) {
                            $_SESSION['success'] = "Request Submitted Successfully.";
                        } else {
                            $_SESSION['error'] = $conn->error;;
                        }
                    }


                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function verifyPostTextData($post_key){
            $temporay_var = "";
            if (empty($_POST[$post_key])) {
                echo "$post_key is required! </br>";
            } else {
                $temporay_var = test_input($_POST[$post_key]);
                if (!preg_match("/^[a-zA-Z ]*$/", $temporay_var)) {
                    echo "Only letters and white space allowed in $post_key field </br>";
                }
            }
            return $temporay_var;
        }

?>    

