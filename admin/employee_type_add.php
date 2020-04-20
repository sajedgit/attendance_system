<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$emp_type_desc = $_POST['emp_type_txt'];
		$sql = "INSERT INTO employee_type (type_description) VALUES ('$emp_type_desc')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee type added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee_type.php');

?>