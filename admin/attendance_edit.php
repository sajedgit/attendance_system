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

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		//$date = $_POST['edit_date'];
		$time_in = $_POST['edit_time_in'];
		$lognow=$time_in ;
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['edit_time_out'];
		$logout=$time_out ;
		$time_out = date('H:i:s', strtotime($time_out));
		
		
		$validTime = getValidEntry($time_in,$time_out);


        if($validTime==1)
		{
				//$sql = "UPDATE attendance SET date = '$date', time_in = '$time_in', time_out = '$time_out' WHERE id = '$id'";
				
					//$_SESSION['success'] = 'Attendance updated successfully';

					$sql = "SELECT * FROM attendance WHERE id = '$id'";
					$query = $conn->query($sql);
					$row = $query->fetch_assoc();
					$emp = $row['employee_id'];

					$sql = "SELECT * FROM employees LEFT JOIN schedules ON schedules.id=employees.schedule_id WHERE employees.id = '$emp'";
					$query = $conn->query($sql);
					$srow = $query->fetch_assoc();

					//updates
					$schedule_time=$srow['time_in'];
					$login_time=$lognow;
					$buffer_time=$srow['buffer_time'];
						
					$logstatus = getLoginStatus($schedule_time,$login_time,$buffer_time);
					//

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

				    $sql = "UPDATE attendance SET  time_in = '$lognow', time_out = '$logout', num_hr = '$int', status = '$logstatus' WHERE id = '$id'";
				  	$conn->query($sql);
				
				/* else{
					$_SESSION['error'] = $conn->error;
				} */
		}
		else
		{
		$_SESSION['error'] = "How can you logout( $logout ) before your login ( $lognow ) ";
		}
		
				
				
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:attendance.php');

?>