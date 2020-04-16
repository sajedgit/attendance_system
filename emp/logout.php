<?php
	session_start();
	include 'includes/conn.php';
	
	date_default_timezone_set("Asia/Kolkata");
	 
	
	$id = $_SESSION['emp_id']; 
	$date_now = date('Y-m-d');
	$logout_now = date('H:i:s');
	
	$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id WHERE attendance.employee_id = '$id' AND date = '$date_now'";
	$query = $conn->query($sql);
	
		$row = $query->fetch_assoc();
		$sql = "UPDATE attendance SET time_out = '$logout_now' WHERE id = '".$row['uid']."'";
		if($conn->query($sql)){
			$output['message'] = 'Time out: '.$row['firstname'].' '.$row['lastname'];

			$sql = "SELECT * FROM attendance WHERE id = '".$row['uid']."'";
			$query = $conn->query($sql);
			$urow = $query->fetch_assoc();

			$time_in = $urow['time_in'];
			$time_out = $urow['time_out'];

		/* 	$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$id'";
			$query = $conn->query($sql);
			$srow = $query->fetch_assoc();

			if($srow['time_in'] > $urow['time_in']){
				$time_in = $srow['time_in'];
			}

			if($srow['time_out'] < $urow['time_in']){
				$time_out = $srow['time_out'];
			} */

			$time_in = new DateTime($time_in);
			$time_out = new DateTime($time_out);
			$interval = $time_in->diff($time_out); 
			$hrs = $interval->format('%h');
			$mins = $interval->format('%i');
			$mins = $mins/60;
			$int = $hrs + $mins;
			if($int > 4){
				$int = $int - 1;
			}

			$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '".$row['uid']."'";
			$conn->query($sql);
		}
		else{
			$output['error'] = true;
			$output['message'] = $conn->error;
		}
		
		
	
	session_destroy();
	header('location: index.php');
?>