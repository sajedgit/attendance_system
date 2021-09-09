<?php
session_start();
if( isset($_SESSION['emp_id']) && $_SESSION['emp_type']=="employee" ){
    header('location:home.php');
}
?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/header.php'; ?>
<?php require_once "../vendor/autoload.php"; ?>
<?php
$flag=0;
if (isset($_POST['forgot'])) {

    $email = trim($_POST['email']);
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, 8 );
    //$password = "SynesisIt";
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

     $sql = "UPDATE employees SET  password = '$password_hash' WHERE email = '".$email."'";
    if($conn->query($sql))
    {
        $flag=1;
        $to = $email;
        $subject = "Password change request from hr@ynesisit.info";
        $message = "Hi $email,\n<br/>";
        $message.= "Your new password is: <strong>$password</strong> please login with this and update this password after login. \n";


        // Create the Transport
        $transport = (new Swift_SmtpTransport('mail.synesisit.info', 25))
            ->setUsername('attendanceinfo@synesisit.info')
            ->setPassword('synesis@HR#2021')
        ;

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($subject))
            ->setFrom(['attendanceinfo@synesisit.info' => 'SynesisIT HR'])
           // ->setTo(['sajedaiub@gmail.com', 'sajed.ahmed@synesisit.info' => 'Sajed Khan'])
            ->setTo([ $to => $to])
            ->setContentType("text/html")
            ->setBody($message);

        // Send the message
        $result = $mailer->send($message);

    }
    else{
        $flag=0;
    }


}

?>
<body class="hold-transition skin-blue sidebar-mini login-page">
<div class="wrapper">

    <?php include 'left_menu.php'; ?>
    <?php include 'top_menu.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="text-center">
                Password Reset
            </h1>


        </section>

        <!-- Main content -->
        <section class="content">


            <div class="login-box" style="margin-top:2%;">





                <div class="login-box-body">

                    <form action="" method="POST">
                        <div class="form-group has-feedback">
                            <p>
                                <?php
                                if($flag==0)
                                    echo "Please enter your email address";
                                else
                                    echo "<span style='color:green;'>A password has sent to your email address.</span>";
                                ?>

                            </p>
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="color:darkslategrey;">Hint: @synesisit.info</span>
                            </div>

                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div>






                        <div class="row">
                            <div class="col-xs-6">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="forgot">Reset Pssword</button>
                            </div>

                        </div>
                    </form>
                </div>
                <?php
                if(isset($_SESSION['error'])){
                    echo "
				<div class='callout callout-danger text-center mt20'>
					<p>".$_SESSION['error']."</p> 
				</div>
			";
                    unset($_SESSION['error']);
                }
                ?>
            </div>


        </section>
        <!-- right col -->
    </div>
    <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->


<?php include 'includes/scripts.php' ?>

</body>
</html>
