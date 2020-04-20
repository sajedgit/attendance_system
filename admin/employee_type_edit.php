<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$sql = "UPDATE employee_type SET type_description = '$title'  WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee Type updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:employee_type.php');

?>