<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
        $password="123456";
        $password = password_hash($password, PASSWORD_DEFAULT);
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$department = $_POST['department'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//
		$sql = "INSERT INTO employees (employee_id, email,password, firstname, lastname, address, birthdate, contact_info, gender, department_id, position_id, schedule_id, photo, created_on) 
				VALUES ('$employee_id','$email','$password', '$firstname', '$lastname', '$address', '$birthdate', '$contact', '$gender','$department', '$position', '$schedule', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
            $email=$email;
            $subject="Your account has been created to hr.synesisit.info";
            $header="From: hr.synesisit.info";
            $content="Your new account has been created to hr.synesisit.info and Your password is <b>$password</b>. <br/> ";
            $content.="<br/> PLEASE CHANGE THE PASSWORD after login to this system ( http://hr.synesisit.info/attendance ) ";
            mail($email, $subject, $content, $header);

        }
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>
