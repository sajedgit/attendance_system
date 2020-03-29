<?php
	session_start();
	include 'includes/conn.php';
	
	date_default_timezone_set("Asia/Kolkata");

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM employees WHERE email = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the email';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password']))
			{
				$_SESSION['emp_id'] = $row['id'];
				$_SESSION['emp_type'] = "employee";
				
				$id = $row['id']; 
				$date_now = date('Y-m-d');
				
			    $sql = "SELECT * FROM attendance WHERE employee_id = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					//$output['error'] = true;
					$output['message'] = 'You have timed in for today';
				}
				else{
					//updates
					$sched = $row['schedule_id'];
				    $lognow = date('H:i:s');
					$sql = "SELECT * FROM schedules WHERE id = '$sched'";
					$squery = $conn->query($sql);
					$srow = $squery->fetch_assoc();
					$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
					//
					$sql = "INSERT INTO attendance (employee_id, date, time_in, status) VALUES ('$id', '$date_now', '$lognow', '$logstatus')";
					if($conn->query($sql)){
						$output['message'] = 'Time in: '.$row['firstname'].' '.$row['lastname'];
					}
					else{
						$output['error'] = true;
						$output['message'] = $conn->error;
					}
				}
				
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input employee credentials first';
	}

	header('location: index.php');

?>