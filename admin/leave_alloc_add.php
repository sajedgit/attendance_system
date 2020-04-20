<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$emp_type_id 	= $_POST['add_employee_type'];
		$leave_type_id 	= $_POST['add_leave_type'];
		$quantity 		= $_POST['add_quantity'];
		$sql = "INSERT INTO leave_allocation (emp_type_id, leave_type_id, quantity) VALUES ('$emp_type_id', '$leave_type_id', '$quantity')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Leave type added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: leave_alloc.php');

?>