

<?php  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP;

include "includes/db.php"; 
?>
 <?php  include "includes/header.php"; ?>



<?php 
if(isset($_POST['submit'])){
    
    $name            = protect($_POST['name']);
    $aadhar_no       = protect($_POST['aadhar_no']);
    $contact_no      = protect($_POST['contact_no']);
    $address         = protect($_POST['address']);
    $specialisation  = protect($_POST['specialisation']);
    $role            = protect($_POST['role']);
    $email           = protect($_POST['email']);
    $password        = hashword(protect($_POST['password']));
    $doj             = date('d-m-y');
   
    
    if($name == NULL){
        $msg = 'Please enter a name';
        $col = 'red';
    }else{
        if($aadhar_no == NULL){
            $msg = 'Please enter aadhar number';
            $col = 'red';
        }else{
            if($contact_no == NULL){
                $msg = 'Please enter contact number';
                $col = 'red';
            }else{
                if($address == NULL){
                    $msg = 'Please enter user address';
                    $col = 'red';    
                }else{
                    if($specialisation == NULL){
                        $msg = 'Please enter user specialisation';
                        $col = 'red';
                    }else{
                        if($role == NULL){
                            $msg = 'Please enter user role';
                            $col = 'red';
                        }else{
                            if($email == NULL){
                                $msg = 'Please enter user email';
                                $col = 'red';
                            }else{
                                if($password == NULL){
                                    $msg = 'Please enter user password';
                                    $col = 'red';
                                }else{
                                    
                                    $query= "INSERT INTO users(name, aadhar_no, contact_no, address, specialisation, role, email, password, doj)";
                                    $query .="VALUES('$name','$aadhar_no', '$contact_no', '$address', '$specialisation', '$role', '$email', '$password', now())";
                                    $create_user_query = mysqli_query($connection, $query);    
                                    if($create_user_query){
                                        $msg = 'User creates and entered into database';
                                        header("Location: login.php");
                                        $col = 'green';
                                    }else{
                                        $msg = 'Failed to create user in database<br>';
                                        $msg .= mysqli_error($connection);
                                        $col = 'red';
                                    }
                                    
                                }
                            }
                        }
                    }
                }
                
            }
        }
    }

    echo '<div id="msg" class="'.$col.'">';
    echo $msg;
    echo '</div>';



}

require("vendor/autoload.php");                        
if(ifItIsMethod('post')){
    
    if(isset($_POST['email'])){
      $email =  $_POST['email'];
        
          
    //Sending mail to patient    
     $mail = new PHPMailer();
           
        try{  
            
          $mail->isSMTP();											 
	      $mail->Host	    = 'smtp.gmail.com';					 
	      $mail->SMTPAuth   = true;							 
	      $mail->Username   = 'bhartisinghnew2825@gmail.com';				 
	      $mail->Password   = 'Sbbss25281624';						 
	      $mail->SMTPSecure = 'tls';							 
	      $mail->Port	    = 587;
          $mail->isHTML(true);      
          $mail->CharSet    = 'UTF-8';   
           
          $mail->setFrom('bhartisinghnew2825@gmail.com', 'Bharti Singh');
          $mail->addAddress($email);
          $mail->Subject = 'PMS Registration';
          $mail->Body = "You have successfully registered";
            
          $mail->send();
          
          } 
           catch(Exception $e){
              
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
          }   

       }
       
    }    
       



?>

<!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form action =""  method="post" enctype="multipart/form-data">
    
<div clsss="form-group">
   <label for="name">Full Name</label> 
   <input type="text" class="form-control" name="name" required> 
</div>

<div clsss="form-group">
   <label for="aadhar_no">Aadhar Number</label> 
   <input type="text" class="form-control" name="aadhar_no" pattern="^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$" required> 
</div>
    
<div clsss="form-group">
   <label for="contact_no">Contact</label> 
   <input type="text" class="form-control" name="contact_no"  pattern="^+91[6-9][0-9]{9}$">  
</div>
    
<div clsss="form-group">
   <label for="address">Address</label> 
   <input type="text" class="form-control" name="address"> 
</div>
 
<div clsss="form-group">
   <label for="specialisation">Specialisation</label> 
   <input type="text" class="form-control" name="specialisation"> 
</div>
<br>   
<div clsss="form-group">
    <label for="role">Role</label>
    <select name="role" id="">
        <option value="Staff">Staff</option>
    </select>
</div>
<br>
<div clsss="form-group">
   <label for="email">Email</label> 
   <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">  
</div>

<div clsss="form-group">
   <label for="password">Password</label> 
   <input type="password" class="form-control" name="password">  
</div>
    
<br> 
 
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="submit" value="Register User"> 
 </div>
<br>                      
                       
</form>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>





<?php include "includes/footer.php";?>
