<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php


if(isset($_POST['login'])){
    
$email = protect(($_POST['email']));
$password = protect(($_POST['password']));

    

    
$query = "SELECT * FROM users WHERE email = '{$email}' ";
$select_query = mysqli_query($connection, $query);
   confirmQuery($select_query);
    
    
while($row = mysqli_fetch_array($select_query))
 {   
    
    $db_email = $row['email'];
    $db_password = $row['password'];
    
    
    
    
    $password = hashword($password);
    
if($email === $db_email && $password === $db_password) {
    
    $db_user_id        = $row['id'];
    $db_name           = $row['name'];
    $db_aadhar_no      = $row['aadhar_no'];
    $db_contact_no     = $row['contact_no'];
    $db_address        = $row['address'];
    $db_specialisation = $row['specialisation'];
    $db_role           = $row['role'];
    $db_doj            = $row['doj'];
    
   $_SESSION['id']             = $db_user_id;
   $_SESSION['name']           = $db_name;
   $_SESSION['aadhar_no']      = $db_aadhar_no;
   $_SESSION['role']           = $db_role;
   $_SESSION['email']          = $db_email;
   $_SESSION['specialisation'] = $db_specialisation; 
             
   if($_SESSION['role'] == 'Admin'){
        header("Location: admin/admin_dashboard.php"); 
                    }
   else if($_SESSION['role'] == 'Doctor'){
        header("Location: doctor/doctor_dashboard.php");
             }
   else if($_SESSION['role'] == 'Staff'){
        header("Location: staffs/staff_dashboard.php");
             }
    else{
    echo "invalid user";
        }
} else{
    header("Location: login.php");
    echo "Invalid User";
}
    
}


} 



?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Login</h2>
							<div class="panel-body">


								<form id="login-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="email" type="email" class="form-control" placeholder="Enter Email" required>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password" required>
										</div>
									</div>

									<div class="form-group">

										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>
                                   <div class="form-group">
                                    <a href='forget.php?forgot'><p style='text align:right'>Forget Password</p></a>    
                                   <a href='registration.php'><p style='text align:left'>New User</p></a>
                                      
									</div>

								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "includes/footer.php";?>

</div> <!-- /.container -->
