
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                               
                            <th>Id</th>
                            <th>Ward Type</th>    
                            <th>Ward No</th>
                            <th>Bed No</th>
                            <th>Bed Status</th>    
                            <th>Assign</th>        
                            <th>Unassign</th>
                            <th>Edit</th>
                            <th>Delete</th>
                           </tr>
                            </thead>
                            <tbody>
<?php
                                

$query = "SELECT * FROM ward";                                
$ward_query = mysqli_query($connection, $query);
confirmQuery($ward_query); 
while($row = mysqli_fetch_assoc($ward_query)){
                                
     
    $id            = protect($row['id']);
    $w_type        = protect($row['w_type']);
    $ward_no       = protect($row['ward_no']);
    $bed_no        = protect($row['bed_no']);
    $bed_status    = protect($row['bed_status']);
    
     echo "<tr>";
     echo "<td>$id</td>";          
     echo "<td>$w_type</td>";
     echo "<td>$ward_no</td>";
     echo "<td>$bed_no</td>";
     echo "<td>$bed_status</td>";
    
    echo "<td><a href='wards.php?assign=$id'>Assign</a></td>";
    echo "<td><a href='wards.php?unassign=$id'>Unassign</a></td>";
    echo "<td><a href='./wards.php?source=edit_ward&w_id={$id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you Sure?');\" href='./wards.php?delete={$id}'>Delete</a></td>";
     echo "</tr>";
 }
                                
                                
  
     ?>
                                
</tbody>
</table>

<?php

if(isset($_GET['assign'])){
 $the_id = $_GET['assign'];   
 $query= "UPDATE ward SET bed_status='assigned' WHERE id={$the_id}";
 $assign_query= mysqli_query($connection, $query); 
 header("Location:wards.php");    
    
    
}

if(isset($_GET['unassign'])){
 $the_id = $_GET['unassign'];   
 $query= "UPDATE ward SET bed_status='unassigned' WHERE id={$the_id}";
 $unassign_query= mysqli_query($connection, $query); 
 header("Location:wards.php");    
    
    
}

if(isset($_GET['delete'])){
            
 $id = mysqli_real_escape_string($connection, $_GET['delete']);   
 $query= "DELETE FROM ward WHERE id = {$id}";      
 $delete_query= mysqli_query($connection, $query); 
 confirmQuery($delete_query);    
 header("Location: wards.php");    
  }  
 
?>