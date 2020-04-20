
<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
	
		$id = $_POST['id'];
		$sql = "SELECT *, leave_allocation.id as leave_id FROM leave_allocation 
			LEFT JOIN employee_type ON employee_type.id = leave_allocation.emp_type_id
			LEFT JOIN leave_type ON leave_type.id = leave_allocation.leave_type_id
			WHERE leave_allocation.id = '$id'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>