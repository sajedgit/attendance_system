<?php
	include 'includes/session.php';

	function getLoginStatus($schedule_time,$login_time,$buffer_time)
	{
	  $schedule_time = strtotime($schedule_time);
	  $schedule_time = date("H:i", strtotime("+$buffer_time minutes", $schedule_time));
	
	  $login_time = strtotime($login_time);
	  $login_time = date("H:i", strtotime("+0 minutes", $login_time));
	 
	  $logstatus = ($schedule_time >= $login_time) ? 1 : 0;
	  return $logstatus;
	 
	}
	function getValidEntry($time_in,$time_out)
	{
	  $time_in = strtotime($time_in);
	  $time_in = date("H:i", strtotime("+0 minutes", $time_in));
	  
	  $time_out = strtotime($time_out);
	  $time_out = date("H:i", strtotime("+0 minutes", $time_out));
	 
	  $logstatus = ($time_out >= $time_in) ? 1 : 0;
	  return $logstatus;
	 
	} 

	if(isset($_POST['add'])){
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$time_in = $_POST['time_in'];
		$lognow=$time_in ;
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['time_out'];
		$logout=$time_out ;
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "SELECT * FROM employees WHERE id = '$employee'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Employee not found';
		}
		else{
			$row = $query->fetch_assoc();
			$emp = $row['id'];

			$sql = "SELECT * FROM attendance WHERE employee_id = '$emp' AND date = '$date'";
			$query = $conn->query($sql);
		
			$getEmployeeInfo=getEmployeeInfo($emp,$conn);
			$emp_name=$getEmployeeInfo["firstname"]." ".$getEmployeeInfo["lastname"];

			if($query->num_rows > 0){ 
			    
				 $sdate=date("d M, Y", strtotime($date)) ;
				 $_SESSION['error'] = "Attendance of $sdate for $emp_name is already exist in our system";
			}
			else{ 
				//updates
				$sched = $row['schedule_id'];
				$sql = "SELECT * FROM schedules WHERE id = '$sched'";
				$squery = $conn->query($sql);
				$scherow = $squery->fetch_assoc();
				
				$schedule_time=$scherow['time_in'];
				$login_time=$lognow;
				$buffer_time=$scherow['buffer_time'];
					
				$logstatus = getLoginStatus($schedule_time,$login_time,$buffer_time);
			    $validTime = getValidEntry($time_in,$time_out);
				 
				
				if($validTime==1)
				{
				//
					$sql = "INSERT INTO attendance (employee_id, date, time_in, time_out, status) VALUES ('$emp', '$date', '$time_in', '$time_out', '$logstatus')";
					if($conn->query($sql)){
						$_SESSION['success'] = 'Attendance added successfully';
						$id = $conn->insert_id;

						$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$emp'";
						$query = $conn->query($sql);
						$srow = $query->fetch_assoc();

						if($srow['time_in'] > $time_in){
							$time_in = $srow['time_in'];
						}

						if($srow['time_out'] < $time_out){
							$time_out = $srow['time_out'];
						}

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

						$sql = "UPDATE attendance SET num_hr = '$int' WHERE id = '$id'";
						$conn->query($sql);

					}
					else{
						$_SESSION['error'] = $conn->error;
					}
			
			    }
				else{
					$_SESSION['error'] = "How can you logout( $logout ) before your login ( $lognow ) ";
				}
			
			
			}
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	
	header('location: attendance.php');

?>