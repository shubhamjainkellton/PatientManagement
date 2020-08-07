
<?php 

if(isset($_GET['p_id'])){
    
    $the_id = protect($_GET['p_id']);
}

 $query = "SELECT * FROM patients WHERE p_id ={$the_id}";
 $select_patient_query = mysqli_query($connection, $query);
 confirmQuery($select_patient_query);                              
 while($row = mysqli_fetch_assoc($select_patient_query)){
    $p_id            = protect($row['p_id']);
    $p_w_id          = protect($row['p_w_id']); 
    $p_aadhar        = protect($row['p_aadhar']);
    $p_name          = protect($row['p_name']);
    $p_age           = protect($row['p_age']);
    $p_gender        = protect($row['p_gender']);
    $p_contact       = protect($row['p_contact']);
    $p_address       = protect($row['p_address']);
    $p_email         = protect($row['p_email']);
    $p_doc_name      = protect($row['p_doc_name']);
    $p_specialisation = protect($row['p_specialisation']);
    $p_reg_date      = date('d-m-y'); 
 }







if(isset($_POST['edit_patient'])){
    
 
    $p_aadhar        = protect($_POST['p_aadhar']);
    $p_name          = protect($_POST['p_name']);
    $p_age           = protect($_POST['p_age']);
    $p_gender        = protect($_POST['p_gender']);
    $p_contact       = protect($_POST['p_contact']);
    $p_address       = protect($_POST['p_address']);
    $p_email         = protect($_POST['p_email']);
    $p_doc_name      = protect($_POST['p_doc_name']);
    $p_specialisation = protect($_POST['p_specialisation']);
    
    
  $query= "UPDATE patients SET p_name='{$p_name}', p_age={$p_age}, p_gender='{$p_gender}', p_contact={$p_contact}, p_address='{$p_address}', p_email='{$email}', p_doc_name='{$p_doc_name}', p_specialisation='{$p_specialisation}' WHERE p_id={$the_id}";
    
    $edit_patient_query = mysqli_query($connection, $query);
    confirmQuery($edit_patient_query);
   echo "Patient Upsated"." "."<a href='patients.php'>View Patients</a>";
}
?>



<form action =""  method="post" enctype="multipart/form-data">



<div clsss="form-group">
   <label for="p_aadhar">Aadhar Number</label> 
   <input type="text" class="form-control" name="p_aadhar"  value='<?php echo $p_aadhar;  ?>' pattern="^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$" required> 
</div>
    
<div clsss="form-group">
   <label for="p_name">Full Name</label> 
   <input type="text" class="form-control" name="p_name" value='<?php echo $p_name;  ?>' required> 
</div>

<div clsss="form-group">
   <label for="p_age">Age</label> 
   <input type="number" class="form-control" name="p_age" value='<?php echo $p_age;  ?>' required> 
</div>    
 
<div clsss="form-group">
   <select name="p_gender" id="">
   
        <option value="">Select Options</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        
        
        
        </select> 
</div>
    
<div clsss="form-group">
   <label for="p_contact">Contact</label> 
   <input type="tel" class="form-control" name="p_contact"  value='<?php echo $p_contact ?>' pattern="^+91\d{10}$">  
</div>
    
<div clsss="form-group">
   <label for="p_address">Address</label> 
   <input type="text" class="form-control" name="p_address" value='<?php echo $p_address ?>'> 
</div>
 
<div clsss="form-group">
   <label for="p_email">Email</label> 
   <input type="email" class="form-control" name="p_email" value='<?php echo $p_email ?>' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$">  
</div> 
<div clsss="form-group">
   <label for="p_doc_name">Attendee Doctor</label> 
   <input type="text" class="form-control" name="p_doc_name" value='<?php echo $p_doc_name ?>'> 
</div>
 <div clsss="form-group">
   <label for="p_specialisation">Specilisation</label> 
   <input type="text" class="form-control" name="p_specialisation" value='<?php echo $p_specialisation ?>'> 
</div>
<br>
   
<br>    
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="edit_patient" value="Update Patient"> 
 </div>
</form>