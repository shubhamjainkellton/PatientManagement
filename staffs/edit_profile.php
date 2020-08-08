<?php include "includes/staff_header.php"; ?>
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
if(isset($_POST['edit_user'])){
 
    $name           = protect($_POST['name']);
    $aadhar_no      = protect($_POST['aadhar_no']);
    $contact_no     = protect($_POST['contact_no']);
    $address        = protect($_POST['address']);
    $specialisation = protect($_POST['specialisation']);
    $email          = protect($_POST['email']);
    $password       = hashword(protect($_POST['password']));
    
    
    
   
    
  $query= "UPDATE users SET name='{$name}', contact_no={$contact_no}, address='{$address}', specialisation='{$specialisation}', email='{$email}', password ='{$password}' WHERE email='{$_SESSION['email']}'";
    
    $edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);
   
}
?>
<div id="wrapper">

        <!-- Navigation -->
 <?php  include "includes/staff_navigation.php";?>

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
                 


<form action ="./login.php"  method="post" enctype="multipart/form-data">
    
<div clsss="form-group">
   <label for="name">Name</label> 
   <input type="text" class="form-control" value='<?php echo $name ?>' name="name"> 
 </div>

<div clsss="form-group">
   <label for="aadhar_no">Aadhar No.</label> 
   <input type="text" class="form-control" value='<?php echo $aadhar_no ?>' name="aadhar_no" pattern="^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$"> 
 </div>
<div clsss="form-group">
   <label for="contact_no">Contact</label> 
   <input type="text" class="form-control" value='<?php echo $contact_no ?>' name="contact_no"  pattern="^+91[6-9][0-9]{9}$"> 
 </div>
<div clsss="form-group">
   <label for="address">Address</label> 
   <input type="text" class="form-control" value='<?php echo $address ?>' name="address"> 
 </div>
<div clsss="form-group">
   <label for="specialisation">Specialisation</label> 
   <input type="text" class="form-control" value='<?php echo $specialisation ?>' name="specialisation"> 
 </div>    


<div clsss="form-group">
   <label for="email">Email</label> 
   <input type="email" class="form-control" value='<?php echo $email ?>' name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">  
 </div>

<div clsss="form-group">
   <label for="password">Password</label> 
   <input type="password" class="form-control" value='<?php echo $password ?>' name="password">  
 </div>
<br>    
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="edit_user" value="Update Profile"> 
 </div>
</form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <?php include "includes/staff_footer.php";  ?>     