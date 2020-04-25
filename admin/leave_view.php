<?php
    include_once 'includes/session.php';  
 
    if(isset($_POST["id"])){
        $_SESSION['leave_id'] = $_POST["id"];
        echo json_encode($_SESSION);
    }
?>
