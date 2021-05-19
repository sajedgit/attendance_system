<?php
session_start();
include 'includes/conn.php';

date_default_timezone_set("Asia/Dhaka");

function getLoginStatus($schedule_time, $login_time, $buffer_time)
{
    $schedule_time = strtotime($schedule_time);
    $schedule_time = date("H:i", strtotime("+$buffer_time minutes", $schedule_time));

    $login_time = strtotime($login_time);
    $login_time = date("H:i", strtotime("+0 minutes", $login_time));

    $logstatus = ($schedule_time >= $login_time) ? 1 : 0;
    return $logstatus;

}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employees WHERE email = '$email'";
    $query = $conn->query($sql);

    if ($query->num_rows < 1) {
        $_SESSION['error'] = 'Cannot find account with the email';
    } else {
        $row = $query->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['emp_id'] = $row['id'];
            $_SESSION['emp_type'] = "employee";

            $id = $row['id'];
            $date_now = date('Y-m-d');

            $sql = "SELECT * FROM attendance WHERE employee_id = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
            $query = $conn->query($sql);
            if ($query->num_rows > 0) {
                //$output['error'] = true;
                $output['message'] = 'You have timed in for today';
                //getLoginStatus('aa','aa','aa');die();
            } else {
                //updates
                $sched = $row['schedule_id'];
                $lognow = date('H:i:s');
                $sql = "SELECT * FROM schedules WHERE id = '$sched'";
                $squery = $conn->query($sql);
                $srow = $squery->fetch_assoc();

                $schedule_time = $srow['time_in'];
                $login_time = $lognow;
                $buffer_time = $srow['buffer_time'];

                $logstatus = getLoginStatus($schedule_time, $login_time, $buffer_time);
                //
                $sql = "INSERT INTO attendance (employee_id, date, time_in, status) VALUES ('$id', '$date_now', '$lognow', $logstatus)";
                if ($conn->query($sql)) {
                    $output['message'] = 'Time in: ' . $row['firstname'] . ' ' . $row['lastname'];
                } else {
                    $output['error'] = true;
                    $output['message'] = $conn->error;
                }
            }

        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

} else {
    $_SESSION['error'] = 'Input employee credentials first';
}

header('location: index.php');

?>
