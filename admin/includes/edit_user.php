
<?php 

if(isset($_GET['u_id'])){
    
    $the_user_id = protect($_GET['u_id']);
    
 $query = "SELECT * FROM users WHERE id ={$the_user_id}";
 $select_users_query = mysqli_query($connection, $query);
                               
 while($row = mysqli_fetch_assoc($select_users_query)){
     $id              = protect($row['id']);
     $name            = protect($row['name']);
     $aadhar_no       = protect($row['aadhar_no']);
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
    $aadhar_no      = protect($_POST['aadhar_no']);
    $contact_no     = protect($_POST['contact_no']);
    $address        = protect($_POST['address']);
    $specialisation = protect($_POST['specialisation']);
    $role           = protect($_POST['role']);
    $email          = protect($_POST['email']);
    $password       = hashword(protect($_POST['password']));
    
if($name == NULL || !preg_match("/^[a-zA-Z\s]+$/", $name)){
        $msg = 'Please enter a valid name';
        $col = 'red';
    }else{
        if($aadhar_no == NULL || !preg_match("/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/", $aadhar_no)){
            $msg = 'Please enter a valid aadhar number';
            $col = 'red';
        }else{
            if($contact_no == NULL || !preg_match("/^[98765]{1}[0-9]{9}$/", $contact_no)){
                $msg = 'Please enter a valid contact number';
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
                                $msg = 'Please enter valid email address';
                                $col = 'red';
                            }else{
                                if($password == NULL){
                                    $msg = 'Please enter user password';
                                    $col = 'red';
                                }else{
                                    
                                    $query= "UPDATE users SET name='{$name}', contact_no={$contact_no}, address='{$address}', specialisation='{$specialisation}', role='{$role}', email='{$email}', password ='{$password}' WHERE id={$the_user_id}";
    
                                    $edit_user_query = mysqli_query($connection, $query);
                                    confirmQuery($edit_user_query);
                                    echo "User updated"." "."<a href='users.php'>View User</a>";
                                    
                                }
                            }
                        }
                    }
                }
                
            }
        }
    }

    echo '<div id="msg" class="'.$col.'">';
    echo $msg;
    echo '</div>';

}
?>



<form action =""  method="post" enctype="multipart/form-data">
    
<div clsss="form-group">
   <label for="name">Full Name</label> 
   <input type="text" class="form-control" name="name" required> 
</div>
<br>
<div clsss="form-group">
   <label for="aadhar_no">Aadhar Number</label> 
   <input type="text" class="form-control" name="aadhar_no" required> 
</div>
<br>    
<div clsss="form-group">
   <label for="contact_no">Contact</label> 
   <input type="tel" class="form-control" name="contact_no" required>  
</div>
 <br>   
<div clsss="form-group">
   <label for="address">Address</label> 
   <input type="text" class="form-control" name="address" required> 
</div>
<br> 
<div clsss="form-group">
   <label for="specialisation">Specialisation</label> 
   <input type="text" class="form-control" name="specialisation"> 
</div>
<br>   
<div clsss="form-group">
    <label for="role">Role:</label>
    <select name="role" id="">
        <option value="Staff">Staff</option>
    </select>
</div>
<br>
<div clsss="form-group">
   <label for="email">Email</label> 
   <input type="email" class="form-control" name="email" required>  
</div>
<br>
<div clsss="form-group">
   <label for="password">Password</label> 
   <input type="password" class="form-control" name="password" required>  
</div>
    
<br> 
   
<br>   
<br>
<div clsss="form-group"> 
   <input class="btn btn-primary" type="submit"  name="edit_user" value="Update User"> 
 </div>
</form>