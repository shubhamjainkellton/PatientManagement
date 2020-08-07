    <?php  include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO PMS
                            <small><?php echo $_SESSION['role']; ?></small>
                        </h1>
                        
                        <h3><p style="color:blue;"><b><u>My Profile</u></b></p></h3>
                        <br>
                        <br>
                        
<?php  
                        
if(isset($_SESSION['email'])){
                            
 $query = "SELECT * FROM users WHERE email='{$_SESSION['email']}'";
 $profile_query = mysqli_query($connection, $query);
 confirmQuery($profile_query);
 while($row=mysqli_fetch_array($profile_query)){
     
 
     $id              = protect($row['id']);
     $name            = protect($row['name']);
     $aadhar_no       = protect($row['aadhar_no']);
     $contact_no      = protect($row['contact_no']);
     $address         = protect($row['address']);
     $specialisation  = protect($row['specialisation']);
     $role            = protect($row['role']);
     $email           = protect($row['email']);
     $password        = protect($row['password']);
                            
     }
         }     
      ?>
                        
<table class="table table-bordered table-hover">
 <thead>
     <tr><h4><b>Name:</b>&nbsp;<?php echo $name; ?>  </h4> </tr><br>
     <tr><h4><b>Aadhar NO.:</b>&nbsp;<?php echo $aadhar_no; ?></h4>   </tr><br>
     <tr><h4><b>Contact No.</b>&nbsp;<?php echo $contact_no ?></h4>   </tr><br>
     <tr><h4><b>Address:</b>&nbsp;<?php echo $address ?></h4>   </tr><br>
     <tr><h4><b>Specilisation:</b>&nbsp;<?php echo $specialisation ?></h4>   </tr><br>
     <tr><h4><b>Role:</b>&nbsp;<?php echo $role ?></h4>   </tr><br>
     <tr><h4><b>Email Id:</b>&nbsp;<?php echo $email; ?> </h4>  </tr>
</thead>
 </table>
<form action ="edit_profile.php"  method="post">                      
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="edit_profile" value="Edit Profile"> 
</div>                        
</form>                     </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php  include "includes/admin_footer.php";?>