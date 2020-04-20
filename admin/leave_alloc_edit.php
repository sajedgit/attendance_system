<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$emp_type_id 	= $_POST['edit_employee_type'];
		$leave_type_id  = $_POST['edit_leave_type'];
		$quantity 		= $_POST['edit_quantity'];
		
		$sql = "UPDATE leave_allocation SET emp_type_id = '$emp_type_id', leave_type_id = '$leave_type_id', quantity = '$quantity' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Leave updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select leave to edit first';
	}

	header('location: leave_alloc.php');
?>