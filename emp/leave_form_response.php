
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="conatiner text-center">
        <?php
            if(isset($_SESSION['error'])){
                echo "
                <div class='alert alert-danger'>
                    <strong>Error!</strong> ".$_SESSION['error']." <span><a href='leave_apply_page.php' class='alert-link'>Go Back</a></span>
                </div>
                ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
                <div class='alert alert-success'>
                    <strong>Success!</strong> ".$_SESSION['success']." <span><a href='leave_apply_page.php' class='alert-link'>Go Back</a></span>
                </div>
                ";
                unset($_SESSION['success']);
            }        
        ?>
        </div>

    </div>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

</body>
</html>
