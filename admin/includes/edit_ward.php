
<?php 

if(isset($_GET['w_id'])){
    
    $the_w_id = protect($_GET['w_id']);

 $query = "SELECT * FROM ward WHERE id =$the_w_id";                                
$ward_query = mysqli_query($connection, $query);
confirmQuery($ward_query); 
while($row = mysqli_fetch_assoc($ward_query)){
                                
     
    $id            = protect($row['id']);
    $w_type        = protect($row['w_type']);
    $ward_no       = protect($row['ward_no']);
    $bed_no        = protect($row['bed_no']);
    $bed_status    = protect($row['bed_status']);
    
}

}




if(isset($_POST['edit_ward'])){
 
    
    $w_type        = protect($_POST['w_type']);
    $ward_no       = protect($_POST['ward_no']);
    $bed_no        = protect($_POST['bed_no']);
    $bed_status    = protect($_POST['bed_status']);
    
    
  $query= "UPDATE ward SET w_type='{$w_type}', ward_no={$ward_no}, bed_no={$bed_no}, bed_status='{$bed_status}' WHERE id={$id}";
    
    $edit_query = mysqli_query($connection, $query);
    confirmQuery($edit_query);
    echo "Ward updated"." "."<a href='wards.php'>View Ward</a>";
}
?>



<form action =""  method="post" enctype="multipart/form-data">
    
<div clsss="form-group">
   <select name="w_type" id="">  
   <option value="<?php echo $w_type ?>"><?php echo $w_type ?></option>  
   <?php  
     echo '<option value="">Select Options</option>';
     echo '<option value="general">General</option>';
     echo '<option value="emergency">Emergency</option>';  
     echo '<option value="ICU">ICU</option>';  
     ?>  
        </select>
</div>
<br>    
<div clsss="form-group">
   <label for="ward_no">Ward No.</label> 
   <input type="text" class="form-control" name="ward_no" value='<?php echo $ward_no ?>'> 
</div>
<div clsss="form-group">
   <label for="bed_no">Bed No.</label> 
   <input type="number" class="form-control" name="bed_no" value='<?php echo $bed_no ?>'> 
</div>
    
<br> 
 <div clsss="form-group">
   <select name="bed_status" id="">  
   <option value="<?php echo $bed_status ?>"><?php echo $bed_status ?></option>  
   <?php  
     echo '<option value="">Select Options</option>';
     echo '<option value="assigned">Assigned</option>';
     echo '<option value="unassigned">Unassigned</option>';  
    
     ?>
     </select>
</div>
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="edit_ward" value="Update Ward"> 
 </div>
</form>