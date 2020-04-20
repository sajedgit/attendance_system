<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, employees.id as empid FROM employees 
		LEFT JOIN position ON position.id=employees.position_id
		LEFT JOIN schedules ON schedules.id=employees.schedule_id
		LEFT JOIN department ON department.id=employees.department_id
		LEFT JOIN employee_type ON employee_type.id = employees.employee_type
		WHERE employees.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>