<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$base_url = "http://".$_SERVER['SERVER_NAME'].":7788/attendance";
	
	function getEmployeeInfo($id,$conn)
	{
		$sql = "SELECT * FROM employees WHERE id = $id ";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		return $row;
	}
	
?>