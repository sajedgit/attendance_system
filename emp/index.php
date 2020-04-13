<?php
  session_start();
  if( isset($_SESSION['emp_id']) && $_SESSION['emp_type']=="employee" ){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini login-page">
<div class="wrapper">

  	<?php include 'left_menu.php'; ?>
  	<?php include 'top_menu.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Employee Login
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="login-box" style="margin-top:2%;">

        <div class="login-logo">
            <p id="date"></p>
            <p id="time" class="bold"></p>
        </div>

        <div class="login-box-body">
            <p class="text-center"><b>Employee Login</b></p>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="login.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" placeholder="input Email" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="input Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
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

<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>
</html>