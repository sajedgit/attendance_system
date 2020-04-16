<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['emp_id']) || trim($_SESSION['emp_id']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM employees WHERE id = '".$_SESSION['emp_id']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$base_url = "http://".$_SERVER['SERVER_NAME']."/attendance";
	
	
?>