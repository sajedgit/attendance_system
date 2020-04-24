<?php 
        include_once 'includes/session.php';  
        include_once 'includes/conn.php';    
          
        echo htmlspecialchars($_SERVER["PHP_SELF"]) . "</br></br>";

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
                            $sql = "UPDATE leaveapp SET leave_from='$date_from', leave_to='$date_to', hr_approval='APPROVED', final_status='APPROVED' WHERE id='$leave_id' ";
                        }
                    }elseif(isset($_POST['submit_reject'])){
                        if($forwarder_emp_id==$supervisor_id){
                            $sql = "UPDATE leaveapp SET dept_head_id='$dept_head_id', supervisor_approval='REJECTED' WHERE id='$leave_id' ";
                        }elseif($forwarder_emp_id==$dept_head_id){
                            $sql = "UPDATE leaveapp SET hr_id='$hr_id', hod_approval='REJECTED' WHERE id='$leave_id' ";
                        }elseif($forwarder_emp_id==$hr_id){
                            $sql = "UPDATE leaveapp SET hr_approval='REJECTED', final_status='REJECTED' WHERE id='$leave_id' ";
                        }
                    }
                    
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['success'] = "Request Submitted Successfully.";
                    } else {
                        $_SESSION['error'] = $conn->error;;
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

