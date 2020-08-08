<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP;



 if(isset($_POST['submit'])){
     
 $w_type = protect($_POST['w_type']);
 $ward_no = protect($_POST['ward_no']);
 $bed_no = protect($_POST['bed_no']);
 $bed_status = protect($_POST['bed_status']);
     
 $query  = "INSERT INTO ward(w_type, ward_no, bed_no, bed_status)";                       
 $query .= "VALUES('{$w_type}', $ward_no, $bed_no, '{$bed_status}')";
 $ward_query = mysqli_query($connection, $query);
 confirmQuery($ward_query);
        
    $p_aadhar        = protect($_POST['p_aadhar']);
    $p_name          = protect($_POST['p_name']);
    $p_age           = protect($_POST['p_age']);
    $p_gender        = protect($_POST['p_gender']);
    $p_contact       = protect($_POST['p_contact']);
    $p_address       = protect($_POST['p_address']);
    $p_email         = protect($_POST['p_email']);
    $p_doc_name      = protect($_POST['p_doc_name']);
    $p_specialisation = protect($_POST['p_specilisation']);
    $p_reg_date      = date('d-m-y');  
    
$query = "SELECT id FROM ward WHERE ward_no=$ward_no AND bed_no=$bed_no";
$result = mysqli_query($connection,$query); 
while($row= mysqli_fetch_array($result)){
    $ward_id    = protect($row['id']);
      
 
$query  = "INSERT INTO patients(p_aadhar, p_name, p_age, p_gender, p_contact, p_address, p_email, p_doc_name, p_specialisation, p_reg_date, p_w_id)";
   
$query .="VALUES({$p_aadhar}, '{$p_name}', {$p_age}, '{$p_gender}', {$p_contact}, '{$p_address}', '{$p_email}', '{$p_doc_name}', '{$p_specialisation}', now(), $ward_id)";
    
$create_user_query = mysqli_query($connection, $query);
    
confirmQuery($create_user_query);
    
echo "Patient Created"." "."<a href='patients.php'>View Patients</a>";
    
}

}

require("../vendor/autoload.php");                        
if(ifItIsMethod('post')){
    
    if(isset($_POST['p_email'])){
      $email =  $_POST['p_email'];
      $query = "SELECT * FROM patients WHERE p_email='$email'";
      $patient_query = mysqli_query($connection, $query);
      confirmQuery($patient_query); 
      while($row = mysqli_fetch_assoc($patient_query)){
                                
     
      $p_id            = protect($row['p_id']);
      $p_aadhar        = protect($row['p_aadhar']);
      $p_name          = protect($row['p_name']);
      $p_age           = protect($row['p_age']);
      $p_gender        = protect($row['p_gender']);
      $p_contact       = protect($row['p_contact']);
      $p_address       = protect($row['p_address']);
      $p_doc_name      = protect($row['p_doc_name']);
      $p_specialisation = protect($row['p_specialisation']);
      $p_reg_date      = date('d-m-y');  
          
          
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
          $mail->Subject = 'Patient Details';
          $mail->Body = "<table class='table table-bordered table-hover'>
 <thead>
     <tr><h4><b>Name:</b>&nbsp; $p_name </h4> </tr><br>
     <tr><h4><b>Age:</b>&nbsp; $p_age</h4> </tr><br>
     <tr><h4><b>Gender:</b>&nbsp;$p_gender</h4> </tr><br>
     <tr><h4><b>Aadhar NO.:</b>&nbsp;$p_aadhar</h4>   </tr><br>
     <tr><h4><b>Contact No.</b>&nbsp; $p_contact </h4>   </tr><br>
     <tr><h4><b>Address:</b>&nbsp;$p_address </h4>   </tr><br>
     <tr><h4><b>Attendee Doctor:</b>&nbsp;$p_doc_name</h4>   </tr><br>
     <tr><h4><b>Specilisation:</b>&nbsp; $p_specialisation</h4>   </tr><br>
     <tr><h4><b>Date:</b>&nbsp;$p_reg_date</h4>   </tr><br>
</thead>
 </table>";
            
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
   <label for="p_aadhar">Aadhar Number</label> 
   <input type="text" class="form-control" name="p_aadhar" pattern="^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$" required> 
</div>
    
<div clsss="form-group">
   <label for="p_name">Full Name</label> 
   <input type="text" class="form-control" name="p_name" required> 
</div>

<div clsss="form-group">
   <label for="p_age">Age</label> 
   <input type="number" class="form-control" name="p_age" required> 
</div>    
<br>
<div clsss="form-group">
    <label for="p_gender">Gender</label>
   <select name="p_gender" id="">
   
        <option value="">Select Options</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        
        
        
        </select> 
</div>
    
<div clsss="form-group">
   <label for="p_contact">Contact</label> 
   <input type="text" class="form-control" name="p_contact" pattern="^+91[6-9][0-9]{9}$">  
</div>
    
<div clsss="form-group">
   <label for="p_address">Address</label> 
   <input type="text" class="form-control" name="p_address"> 
</div>
 
<div clsss="form-group">
   <label for="p_email">Email</label> 
   <input type="email" class="form-control" name="p_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">  
</div>
    <br>
<div clsss="form-group">
   <label for="p_doc_name">Attendee Doctor</label>
    <select name="p_doc_name" id="">
        <option value=''>Select Options</option>;
        <?php
        $query = "SELECT * FROM users WHERE role ='Doctor'";
        $select_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_query)){
            $the_id = protect($row['id']);
            $name   = protect($row['name']);
            $specialisation = protect($row['specialisation']);
            
            echo "<option value='$the_id'>$name</option>";
        }
        
        ?>
      
  </select>
</div>
   
 <div clsss='form-group'>
   <label for='p_specialisation'>Specilisation</label> 
   <input type='text' class='form-control' name='p_specilisation'> 
</div>
            
 <br>
    
<div clsss="form-group">
    <label for="w_type">Ward Type</label> 
   <select name="w_type" id="">  
     
     
    <option value=''>Select Options</option>;
     <option value='general'>General</option>;
     <option value='emergency'>Emergency</option>;  
     <option value='ICU'>ICU</option>;  
       
        </select>
</div>
<br>    
<div clsss="form-group">
   <label for="ward_no">Ward No.</label> 
   <input type="text" class="form-control" name="ward_no"> 
</div>
<div clsss="form-group">
   <label for="bed_no">Bed No.</label> 
   <input type="number" class="form-control" name="bed_no"> 
</div>
    
<br> 
 <div clsss="form-group">
   <label for="bed_status">Bed Status</label>      
   <select name="bed_status" id="">  
     
     
    <option value=''>Select Options</option>;
     <option value='assigned'>Assigned</option>;
     <option value='unassigned'>Unassigned</option>;   
        </select>
</div>
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="submit" value="Add Patient"> 
 </div>
</form>