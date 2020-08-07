<?php
    
if(isset($_GET['p_id'])){
    
 $p_id = protect($_GET['p_id']);  

 $query = "SELECT * FROM medical_history WHERE p_id =$p_id";
 $select_query = mysqli_query($connection, $query);
 confirmQuery($select_query);    
 while($row = mysqli_fetch_array($select_query)){    
    $m_id            = protect($row['m_id']);
    $bloodpressure   = protect($row['bloodpressure']);
    $weight          = protect($row['weight']);
    $temperature     = protect($row['temperature']);
    $prescription    = protect($row['prescription']);
    $date            = date('d-m-y'); 
 }
}
if(isset($_POST['submit'])){
    
    $bloodpressure   = protect($_POST['bloodpressure']);
    $weight          = protect($_POST['weight']);
    $temperature     = protect($_POST['temperature']);
    $prescription    = protect($_POST['prescription']);
    $date            = date('d-m-y');

$query  = "UPDATE medical_history SET bloodpressure={$bloodpressure}, weight={$weight}, temperature={$temperature}, prescription'={$prescription}', date=now() WHERE p_id=$p_id)";
    
$update_pres_query = mysqli_query($connection, $query);
    
confirmQuery($update_pres_query);
    
echo "prescription Updated"." "."<a href='patients.php'>View Patient</a>";
    
}



?>
<form action =""  method="post" enctype="multipart/form-data">


<div clsss="form-group">
   <label for="bloodpressure">Bloodpressure(mm Hg)</label> 
   <input type="test" class="form-control" name="bloodpressure" pattern="^[0-9]{3}$" value="<?php echo $bloodpressure  ?>"required> 
</div>
    
<div clsss="form-group">
   <label for="weight">Weight(kg)</label> 
   <input type="number" class="form-control" name="weight" value="<?php echo $weight  ?>" required> 
</div>

<div clsss="form-group">
   <label for="temperature">Temperature(&#8457;)</label> 
   <input type="number" class="form-control" name="temperature" value="<?php echo $temperature  ?>" required> 
</div>    
 
<div clsss="form-group">
   <label for="prescription">Prescription</label> 
   <input type="text" class="form-control" name="prescription" value="<?php echo $prescription  ?>"> 
</div>
 
<br> 
 
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="submit" value="Edit Prescription"> 
 </div>
</form>
 