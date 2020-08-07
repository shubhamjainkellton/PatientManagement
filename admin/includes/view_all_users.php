
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Aadhar_no</th>
                            <th>Contact_no</th>
                            <th>Address</th>
                            <th>Specialisation</th>
                            <th>Role</th>
                            <th>Email</th>
                            
                            <th>DOJ</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                            </tr>
                            </thead>
                            <tbody>
<?php
 $private_secret_key = '1f4276388ad3214c873428dbef42243f' ;                               
 $query = "SELECT * FROM users";
 $select_users = mysqli_query($connection, $query);
 confirmQuery($select_users);                                
                               
 while($row = mysqli_fetch_assoc($select_users)){
     
     $id              = protect($row['id']);
     $name            = protect($row['name']);
     $aadhar_no       = protect($row['aadhar_no']);
     $contact_no      = protect($row['contact_no']);
     $address         = protect($row['address']);
     $specialisation  = protect($row['specialisation']);
     $role            = protect($row['role']);
     $email           = protect($row['email']);
     $password        = protect($row['password']);
     $doj             = protect($row['doj']);
    
     
     echo "<tr>";
     echo "<td>$id</td>";
     echo "<td>$name</td>";
     echo "<td>$aadhar_no</td>";
     echo "<td>$contact_no</td>";
     echo "<td>$address</td>";
     echo "<td>$specialisation</td>";
     echo "<td>$role</td>";
     echo "<td>$email</td>";
     
     echo "<td>$doj</td>";
  

    echo "<td><a href='./users.php?source=edit_user&u_id={$id}'>Edit</a></td>";
     echo "<td><a onClick=\"javascript: return confirm('Are you Sure?');\" href='./users.php?delete={$id}'>Delete</a></td>";
     echo "</tr>";
 }
   ?>                               
 </tbody>
</table>

<?php   

if(isset($_GET['delete'])){
            
 $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);   
 $query= "DELETE FROM users WHERE id = {$the_user_id}";      
 $delete_user_query= mysqli_query($connection, $query); 
 confirmQuery($delete_user_query);    
 header("Location: users.php");    
  }  
 
?>