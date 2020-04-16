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
            $designation    = verifyPostTextData("employee_designation");
            $department     = verifyPostTextData("employee_dept");
            $leave_purpose  = verifyPostTextData("leave_purpose");
            $leave_address  = verifyPostTextData("leave_address");
            $employee_signature = verifyPostTextData("employee_signature");
            $company_division   = verifyPostTextData("radio_company_div");

            // TODO: contact & other number verify 
            $employee_contact   = test_input($_POST["employee_contact"]);
            $alternate_person   = test_input($_POST["alternate_person"]);
            $supervisor_id      = test_input($_POST["supervisor_select"]);
            $dept_head_id       = test_input($_POST["hod_select"]);

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
                $_SESSION['error'] = 'leaveapp: No account with this email';
            }else{
                $row = $query->fetch_assoc(); 
                $employee_email = $row['email'];  
            }

            // insert data to leaveapp table
            $sql = "INSERT INTO leaveapp (employee_name, employee_email, designation, department, company_div, leave_from, leave_to, leave_purpose, leave_address, 
            contact, alt_person_id, supervisor_id, dept_head_id, supervisor_approval, hod_approval, hr_approval, final_status) 
                   VALUES ('$employee_name', '$employee_email', '$designation', '$department', '$company_division', '$date_from', '$date_to', 
                   '$leave_purpose', '$leave_address', '$employee_contact', '$alternate_person', 
                   '$supervisor_id', '$dept_head_id', 'pending', 'pending', 'pending', 'pending')";

            if ($conn->query($sql) === TRUE) {
            } else {
                $_SESSION['error'] = 'leaveapp: Error inserting data to leaveapp table';
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

        class Database{
            public $db_connect;
            public $dbname;
            const SERVERNAME = "localhost";
            const USERNAME   = "root";
            const PASSWORD   = "";

            public function __construct($db_object){
                $this->db_connect = $db_object;
            }

            public function createTable($tableName){
                $sql = "CREATE TABLE $tableName (
                        id                  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        employee_name       VARCHAR(40)     NOT NULL,
                        employee_email      VARCHAR(50)     NOT NULL,
                        designation         VARCHAR(30)     NOT NULL,
                        department          VARCHAR(40)     NOT NULL,
                        company_div         VARCHAR(10)     NOT NULL,
                        
                        leave_from          DATE    NOT NULL,
                        leave_to            DATE    NOT NULL,
                        leave_purpose       VARCHAR(50) NOT NULL,
                        leave_address       VARCHAR(50) NOT NULL,
                        
                        contact             BIGINT(16)  UNSIGNED   NOT NULL,
                        alt_person_id       INT(4)   UNSIGNED   NOT NULL,
                        supervisor_id       INT(4)   UNSIGNED   NOT NULL,
                        dept_head_id        INT(4)   UNSIGNED   NOT NULL,
                        supervisor_approval VARCHAR(10) NOT NULL,
                        hod_approval        VARCHAR(10) NOT NULL,
                        hr_approval         VARCHAR(10) NOT NULL,
                        final_status        VARCHAR(10) NOT NULL
                        )";

                if ($this->db_connect->query($sql) === TRUE) {
                    echo "Table $tableName created successfully";
                } else {
                    echo "Error creating table: " . $this->db_connect->error;
                }
            }

            public function insertData($tableName, $name, $email, $designation, $dept, $div, $from, $to, $purpose, $addr, 
                                       $contact, $alt_person, $sup, $hod, $sup_apprv, $hod_apprv, $hr_apprv, $status)
            {
                $sql = "INSERT INTO $tableName (employee_name, employee_email, designation, department, company_div, leave_from, leave_to, 
                        leave_purpose, leave_address, contact, alt_person_id, supervisor_id, dept_head_id, supervisor_approval, hod_approval, hr_approval, final_status) 
                        VALUES ('$name', $email, '$designation', '$dept', '$div', '$from', '$to', '$purpose', '$addr', '$contact', '$alt_person', 
                        '$sup', '$hod', '$sup_apprv', '$hod_apprv', '$hr_apprv', '$status')";

                if ($this->db_connect->query($sql) === TRUE) {
                    $last_id = $this->db_connect->insert_id;
                    echo "Data inserted successfully to $tableName table, at id=$last_id </br>";
                } else {
                    echo "Error inserting data: " . $this->db_connect->error;
                }
            }

            public function updateData($tableName, $dataField, $data, $id){
                $sql = "UPDATE $tableName SET $dataField='$data' WHERE id=$id";
                if ($this->db_connect->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $this->db_connect->error;
                }
            }

            public function deleteData($tableName, $id){
                $sql = "DELETE FROM $tableName WHERE id=$id";
                if ($this->db_connect->query($sql) === TRUE) {
                    echo "Record deleted successfully </br>";
                } else {
                    echo "Error deleting record: " . $this->db_connect->error;
                }
            }

            private function disconnect(){
                $this->db_connect->close();
                echo "db disconnected </br>";
            }
        }  

?>    

