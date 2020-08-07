<?php
if(isset($_GET['p_id'])){
    
$p_id = protect($_GET['p_id']);    
}

if(isset($_POST['submit'])){
    
    
    $bloodpressure   = protect($_POST['bloodpressure']);
    $weight          = protect($_POST['weight']);
    $temperature     = protect($_POST['temperature']);
    $prescription    = protect($_POST['prescription']);
    $date            = date('d-m-y');
$query = "SELECT p_id FROM patients WHERE p_id=$p_id";
$result = mysqli_query($connection,$query); 
while($row= mysqli_fetch_array($result)){
    $the_p_id    = protect($row['p_id']);
 
$query  = "INSERT INTO medical_history(p_id, bloodpressure, weight, temperature, prescription, date)";
   
$query .="VALUES($the_p_id, {$bloodpressure}, {$weight}, {$temperature}, '{$prescription}', now())";
    
$create_pres_query = mysqli_query($connection, $query);
    
confirmQuery($create_pres_query);
    
echo "prescription Created"." "."<a href='patients.php'>View Patient</a>";
    
}

} 

?>
<form action =""  method="post" enctype="multipart/form-data">


<div clsss="form-group">
   <label for="bloodpressure">Bloodpressure(mm Hg)</label> 
   <input type="test" class="form-control" name="bloodpressure" pattern="^[0-9]{3}$" required> 
</div>
    
<div clsss="form-group">
   <label for="weight">Weight(kg)</label> 
   <input type="number" class="form-control" name="weight" required> 
</div>

<div clsss="form-group">
   <label for="temperature">Temperature(&#8457;)</label> 
   <input type="number" class="form-control" name="temperature" required> 
</div>    
 
<div clsss="form-group">
   <label for="prescription">Prescription</label> 
   <input type="text" class="form-control" name="prescription"> 
</div>
 
<br> 
 
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="submit" value="Add Prescription"> 
 </div>
</form>
 