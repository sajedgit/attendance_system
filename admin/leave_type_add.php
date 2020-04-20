<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$leave_type_desc = $_POST['leave_type_txt'];
		$sql = "INSERT INTO leave_type (leave_description) VALUES ('$leave_type_desc')";
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

	header('location: leave_type.php');

?>