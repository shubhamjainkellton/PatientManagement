
<?php 
$private_secret_key = '1f4276388ad3214c873428dbef42243f' ;
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
   
    $duplicate = false;
    try {
    $query = "SELECT COUNT(*) as count FROM users WHERE aadhar_no = $aadhar_no";
    $result = mysqli_query($connection, $query); 
    $data = mysqli_fetch_assoc($result);
    if ($data['count'] > 0) {
       
        echo "<div class='form'>
                  <center>AADHAR ALREADY IN USE<br/>
                  <p class='link'>Click here to <a href='add_user.php'>Add User </a> again</p></center>
                  </div>";
        $duplicate = true;
    }
} catch (Exception $e) {

}

   
    if($name == NULL || !preg_match("/^[a-zA-Z\s]+$/", $name)){
        $msg = 'Please enter a name';
        $col = 'red';
    }else{
        if($aadhar_no == NULL || !preg_match("/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/", $aadhar_no)){
            $msg = 'Please enter aadhar number';
            $col = 'red';
        }else{
            if($contact_no == NULL || !preg_match("/^[98765]{1}[0-9]{9}$/", $contact_no)){
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
                            if($email == NULL || !preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $email)){
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
                                        $col = 'green';
                                        echo "User created"." "."<a href='users.php'>View User</a>";
                                    }
                                    
                                }
                            }
                        }
                    }
                }
                
            }
        }
    }

}

require("../vendor/autoload.php");                        
if(ifItIsMethod('post')){
    
    if(isset($_POST['email'])){
      $email =  $_POST['email'];
      $query = "SELECT * FROM users WHERE email='$email'";
      $select_query = mysqli_query($connection, $query);
      confirmQuery($select_query); 
      while($row = mysqli_fetch_assoc($select_query)){
                                
     
      $id        = protect($row['id']);
      $email     = protect($row['email']);
      $password  = protect($row['password']);  
          
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
          $mail->Body = "<h4>You have been sucessfully registered by the admin<h4>
          <table class='table table-bordered table-hover'>
 <thead>
     <tr><h4><b>Email:</b>&nbsp; $email </h4> </tr><br>
     <tr><h4><b>Password:</b>&nbsp; $password</h4> </tr><br>
</thead>
 </table>
 <p>Please change the password</p>";
            
          $mail->send();
          
          } 
           catch(Exception $e){
              
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
          }   

       }
       
    }    
       

}

?>




<form action =""  method="post" enctype="multipart/form-data">
    
<div clsss="form-group">
   <label for="name">Full Name</label> 
   <input type="text" class="form-control" name="name" required> 
</div>

<div clsss="form-group">
   <label for="aadhar_no">Aadhar Number</label> 
   <input type="text" class="form-control" name="aadhar_no"  required> 
</div>
    
<div clsss="form-group">
   <label for="contact_no">Contact</label> 
   <input type="text" class="form-control" name="contact_no"  >  
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
        <option value="">Select Options</option>
        <option value="Admin">Admin</option>
        <option value="Doctor">Doctor</option>
        <option value="Staff">Staff</option>
    </select>
</div>

<div clsss="form-group">
   <label for="email">Email</label> 
   <input type="email" class="form-control" name="email" >  
</div>

<div clsss="form-group">
   <label for="password">Password</label> 
   <input type="password" class="form-control" name="password">  
</div>
    
<br> 
 
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="submit" value="Add User"> 
 </div>
</form>