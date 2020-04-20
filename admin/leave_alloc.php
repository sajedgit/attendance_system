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
        Leave Allocation
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Leave Allocation</li>
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
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Employee Type</th>
                  <th>Leave Type</th>
                  <th>Leave Quantity</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, leave_allocation.id as leave_id FROM leave_allocation 
                    LEFT JOIN employee_type ON employee_type.id = leave_allocation.emp_type_id
                    LEFT JOIN leave_type ON leave_type.id = leave_allocation.leave_type_id
                    ";
                    
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        echo "
                            <tr>
                            <td>".$row['type_description']."</td>
                            <td>".$row['leave_description']."</td>
                            <td>".$row['quantity']."</td>
                            <td>
                                <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['leave_id']."'><i class='fa fa-edit'></i> Edit</button>
                                <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['leave_id']."'><i class='fa fa-trash'></i> Delete</button>
                            </td>
                            </tr>
                        ";
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
  <?php include 'includes/leave_alloc_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', ".edit", function() {
   
    $('#edit').modal('show');
    var id = $(this).data('id');
    // var person = prompt("Check id", id);
    getRow(id);
  });

  $(document).on('click', ".delete", function() {
    
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'leave_alloc_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('.leave_id').val(response.leave_id);
    $('#del_leave_alloc').html(response.type_description + "-" + response.leave_description);
    $('#employee_type_val').val(response.emp_type_id).html(response.type_description);
    $('#leave_type_val').val(response.leave_type_id).html(response.leave_description);
    $('#edit_quantity').val(response.quantity).html(response.quantity);

    }
  });
}
</script>
</body>
</html>
