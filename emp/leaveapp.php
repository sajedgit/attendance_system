<?php 
        include_once 'includes/session.php';  
        include_once 'includes/conn.php';    
          
        echo htmlspecialchars($_SERVER["PHP_SELF"]) . "</br></br>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            handleFormPostRequest($conn);
            header('location: leave_form_response.php');
        }

        function handleFormPostRequest($conn){
            $employee_name  = verifyPostTextData("employee_name");
            $leave_type     = verifyPostTextData("leavetype_select");
            $leave_purpose  = verifyPostTextData("leave_purpose");
            $leave_address  = verifyPostTextData("leave_address");
            $employee_signature = verifyPostTextData("employee_signature");
            $company_division   = verifyPostTextData("radio_company_div");

            // TODO: contact & other number verify 
            $employee_contact   = test_input($_POST["employee_contact"]);
            $alternate_person   = test_input($_POST["alternate_person"]);
            $supervisor_id      = test_input($_POST["supervisor_select"]);

            //TODO: date time verify 
            $rawdate = htmlentities($_POST["dateinput_from"]);
            $date_from = date('Y-m-d', strtotime($rawdate));

            $rawdate = htmlentities($_POST["dateinput_to"]);
            $date_to = date('Y-m-d', strtotime($rawdate)); 

            // database query 
            $employee_id = $_SESSION['emp_id'];
            $employee_email = "";
            
            // get email address from 'employees' table 
            $sql = "SELECT * FROM employees WHERE id = '$employee_id'";
            $query = $conn->query($sql);

            if($query->num_rows < 1){
                $_SESSION['error'] = 'No account with this email';
            }else{
                $row = $query->fetch_assoc(); 
                $employee_email = $row['email'];  
                $position_id = $row['position_id'];
                $department_id = $row['department_id'];
            }

            // insert data to leaveapp table
            $sql = "INSERT INTO leaveapp (employee_name, employee_email, position_id, department_id, company_div, leave_from, leave_to, 
            leave_type, leave_purpose, leave_address, contact, alt_person_id, supervisor_id) 
                   VALUES ('$employee_name', '$employee_email', '$position_id', '$department_id', '$company_division', '$date_from', '$date_to', 
                   '$leave_type', '$leave_purpose', '$leave_address', '$employee_contact', '$alternate_person', '$supervisor_id')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['success'] = "Leave Application Submitted Successfully.";
            } else {
                $_SESSION['error'] = $conn->error;;
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

