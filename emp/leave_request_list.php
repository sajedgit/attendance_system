<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Leave applications pending for approval
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Leave</li>
        <li class="active">Approve Leave</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
				  <th>Name</th>
                  <th>Email </th>
                  <th>Position</th>
                  <th>Leave Type</th>
                  <th>Leave Period</th>
                  <th>Status</th>
                  <th>Details</th>
                </thead>
                <tbody>
                    <?php
                        $employee_id = $_SESSION['emp_id'];
                        $sql = "SELECT *, leaveapp.id as leave_id FROM leaveapp 
                        LEFT JOIN position ON position.id = leaveapp.position_id
                        LEFT JOIN leave_type ON leave_type.id = leaveapp.leave_type_id
                        WHERE leaveapp.supervisor_id='$employee_id' OR leaveapp.dept_head_id='$employee_id'"; 
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                                            
                    ?>
                    <tr>
                        <td><?php echo $row['employee_name']; ?></td>
                        <td><?php echo $row['employee_email']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['leave_description']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['leave_from'])).' - '.date('d/m/Y', strtotime($row['leave_to'])); ?></td>
                        <td>
                        <?php 
                            $status = 0;
                            if($employee_id == $row['supervisor_id']){
                                $status = $row['supervisor_approval'];
                            }elseif($employee_id == $row['dept_head_id']){
                                $status = $row['hod_approval'];
                            }

                            $color = 'label-warning';
                            if($status=='PENDING'){
                                $color = 'label-warning';
                            }elseif($status=='YES'){
                                $status = 'APPROVED';
                                $color = 'label-success';
                            }elseif($status=='NO'){
                                $status = 'REJECTED';
                                $color = 'label-danger';
                            }

                            echo "<span class='label $color'>".$status."</span>" ;
                        ?>
                        </td>
                        <td>
                            <button class="btn btn-success btn-sm view btn-round"  data-id="<?php echo $row['leave_id']; ?>"><i class="fa fa-eye"></i> view-<?php echo $row['leave_id']; ?> </button>
                        </td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>


<script>
$(function(){

    $(document).on('click', ".view", function() {
            var id = $(this).data('id');
            redirectToLeaveApprovePage(id);        
    }); 

});

function redirectToLeaveApprovePage(id){
    $.ajax({
        type: 'POST',
        url: 'leave_view.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
            window.location.href = "leave_approve_page.php";
          
      }
    });
}
</script>


</body>
</html>
