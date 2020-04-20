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
        Employee List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Employee List</li>
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
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Position</th>
                  <th>Department</th>
               <?php /*   <th>Schedule</th> */ ?>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql =  $sql = "SELECT *, employees.id AS empid FROM employees 
									LEFT JOIN position ON position.id=employees.position_id 
									LEFT JOIN schedules ON schedules.id=employees.schedule_id
									LEFT JOIN department ON department.id=employees.department_id
									";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
						  <td class="emp_name"><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                          <td class="emp_photo"><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="30px" height="30px"> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['empid']; ?>"><span class="fa fa-edit"></span></a></td>
                          <td class="emp_email"><?php echo $row['email']; ?></td>
                          <td class="emp_email"><?php echo $row['contact_info']; ?></td>
						  <td class="emp_description"><?php echo $row['description']; ?></td>
                          <td class="emp_dept_name"><?php echo $row['department_name']; ?></td>
						  
                         <?php /* <td class="emp_time"><?php echo date('h:i A', strtotime($row['time_in'])).' - '.date('h:i A', strtotime($row['time_out'])); ?></td>
                          */ ?>
						 <td class="emp_action">
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-trash"></i> Delete</button>
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
  <?php include 'includes/employee_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
/*   $('.edit').click(function(e){
    //e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  }); */
  
 $(document).on('click', ".edit", function() {
      //e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);        
}); 

  
  $(document).on('click', ".delete", function() {
    //e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

 
  $(document).on('click', ".photo", function() {
   // e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.firstname+' '+response.lastname);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_email').val(response.email);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact);
	 
	  if(response.birthdate=="0000-00-00")
		$('#datepicker_edit').val("");
	  else
		$('#datepicker_edit').val(response.birthdate);  
  
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#department_val').val(response.department_id).html(response.department_name);
      $('#position_val').val(response.position_id).html(response.description);
      $('#employee_type_val').val(response.employee_type).html(response.type_description);
      $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
