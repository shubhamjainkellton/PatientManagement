
<?php 

if(isset($_GET['u_id'])){
    
    $the_user_id = protect($_GET['u_id']);
    
 $query = "SELECT * FROM users WHERE id ={$the_user_id}";
 $select_users_query = mysqli_query($connection, $query);
                               
 while($row = mysqli_fetch_assoc($select_users_query)){
     $id              = protect($row['id']);
     $name            = protect($row['name']);
     
     $contact_no      = protect($row['contact_no']);
     $address         = protect($row['address']);
     $specialisation  = protect($row['specialisation']);
     $role            = protect($row['role']);
     $email           = protect($row['email']);
     $password        = protect($row['password']);
    
 }
}






if(isset($_POST['edit_user'])){
 
    $name           = protect($_POST['name']);
    $contact_no     = protect($_POST['contact_no']);
    $address        = protect($_POST['address']);
    $specialisation = protect($_POST['specialisation']);
    $role           = protect($_POST['role']);
    $email          = protect($_POST['email']);
    $password       = hashword(protect($_POST['password']));
    

  $query= "UPDATE users SET name='{$name}', contact_no={$contact_no}, address='{$address}', specialisation='{$specialisation}', role='{$role}', email='{$email}', password ='{$password}' WHERE id={$the_user_id}";
    
    $edit_user_query = mysqli_query($connection, $query);
    confirmQuery($edit_user_query);
    echo "User updated"." "."<a href='users.php'>View User</a>";

    }

?>



<form action =""  method="post" enctype="multipart/form-data">
    
<div clsss="form-group">
   <label for="name">Name</label> 
   <input type="text" class="form-control" value='<?php echo $name ?>' name="name" required> 
 </div>


<div clsss="form-group">
   <label for="contact_no">Contact</label> 
   <input type="text" class="form-control" value='<?php echo $contact_no ?>' name="contact_no" pattern="^[98765]{1}[0-9]{9}$" required> 
 </div>
<div clsss="form-group">
   <label for="address">Address</label> 
   <input type="text" class="form-control" value='<?php echo $address ?>' name="address" required> 
 </div>
<div clsss="form-group">
   <label for="specialisation">Specialisation</label> 
   <input type="text" class="form-control" value='<?php echo $specialisation ?>' name="specialisation" required> 
 </div>    
 
<br>
<div clsss="form-group">
    <label for="role">Role</label>
    <select name="role" id="">
    <option value="<?php echo $role ?>"><?php echo $role ?></option>
            
   <?php  
         echo "<option value=''>Select Options</option>";
         echo "<option value='Admin'>Admin</option>";
         echo "<option value='Doctor'>Doctor</option>";
         echo "<option value='Staff'>Staff</option>";
    ?>
    </select>
 </div>

<br>

<div clsss="form-group">
   <label for="email">Email</label> 
   <input type="email" class="form-control" value='<?php echo $email ?>' name="email" pattern="^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$"required>  
 </div>

<div clsss="form-group">
   <label for="password">Password</label> 
   <input type="password" class="form-control" value='<?php echo $password ?>' name="password" required>  
 </div>
<br>    
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="edit_user" value="Update User"> 
 </div>
</form>