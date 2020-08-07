
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                               
                            <th>Id</th>
                            <th>Aadhar No.</th>    
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>    
                            <th>Contact</th>        
                            <th>Address</th>
                            <th>Email</th>
                            <th>Attendie Doctor</th>
                            <th>Specilisation</th>
                            <th>Registration Date</th>
                            <th>Edit</th>
                            <th>Delete</th>    
                                
                                
                               
                            </tr>
                            </thead>
                            <tbody>
<?php
                                

$query = "SELECT * FROM patients";                                
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
    $p_email         = protect($row['p_email']);
    $p_doc_name      = protect($row['p_doc_name']);
    $p_specialisation = protect($row['p_specialisation']);
    $p_reg_date      = date('d-m-y');
     
     echo "<tr>";
     echo "<td>$p_id</td>";          
     echo "<td>$p_aadhar</td>";
     echo "<td>$p_name</td>";
     echo "<td>$p_age</td>";
     echo "<td>$p_gender</td>";
     echo "<td>$p_contact</td>";
     echo "<td>$p_address</td>";
     echo "<td>$p_email</td>";
     echo "<td>$p_doc_name</td>";
     echo "<td>$p_specialisation</td>";
     echo "<td>$p_reg_date</td>";
    
   
    echo "<td><a href='./patients.php?source=edit_patient&p_id={$p_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you Sure?');\" href='./patients.php?delete={$p_id}'>Delete</a></td>";
     echo "</tr>";
 }
                                
                                
  
     ?>
                                
</tbody>
</table>
<form action ="view_m_history.php"  method="post">                      
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="view_m_history" value="View Medical History"> 
</div>                        
</form>

<?php   

if(isset($_GET['delete'])){
            
 $patient_id = mysqli_real_escape_string($connection, $_GET['delete']);   
 $query= "DELETE FROM patients WHERE p_id = {$patient_id}";      
 $delete_query= mysqli_query($connection, $query); 
 confirmQuery($delete_query);    
 header("Location: patients.php");    
  }  
 
?>