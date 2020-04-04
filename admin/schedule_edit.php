<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$buffer_time = $_POST['buffer_time'];
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "UPDATE schedules SET time_in = '$time_in', time_out = '$time_out', buffer_time =$buffer_time WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:schedule.php');

?>