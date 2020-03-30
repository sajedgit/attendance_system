<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$department_name = $_POST['department_name'];
		$status = $_POST['status'];

		$sql = "INSERT INTO department (department_name, active) VALUES ('$department_name', '$status')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Department_name added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: department.php');

?>