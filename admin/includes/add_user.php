<?php 

if(isset($_POST['create_user'])) {

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    
    $user_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 12) );


    $query ="INSERT INTO users(username, user_password, user_firstname,
     user_lastname, user_email,user_role) " ;

    $query .= 
    "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}',
    '{$user_role}') "; 

    // echo $query; die('fer');
     $create_user_query = mysqli_query($connection, $query);

     confirmQuery($create_user_query);

     echo "<h4>User Created: " . "" . "<a href='users.php'>View Users</a></h4> ";

}


?>


<form action ="" method="post" enctype="multipart/form-data">
  
<div class="form-group">
       <label for="user_firstname">Firstname</label>
       <input type="text" class="form-control" name="user_firstname">
   </div>

   <div class="form-group">
       <label for="user_lastname">Lastname</label>
       <input type="text" class="form-control" name="user_lastname">
   </div>

   <div class="form-group">
   <!-- <label for="user_role">Select Options</label>
       <br> -->
   <select  name="user_role" id="">
       <option value="select">Select Options</option>
       <option value="admin">Admin</option>
       <option value="subscriber">Subscriber</option>

   </select>
   </div>

   <div class="form-group">
       <label for="username">Username</label>
       <input type="text" class="form-control" name="username">
   </div>

   <div class="form-group">
       <label for="user_email">Email</label>
       <input type="text" class="form-control" name="user_email">
   </div>

   

   <div class="form-group">
       <label for="user_password">Password</label>
       <input type="password" class="form-control" name="user_password">
   </div>

   
   

   <!-- <div class="form-group">
       <label for="user_role">Role</label>
       <br>
       <select name="user_role" id="usser_role">

       <?php
      
        // $query ="SELECT * FROM users ";
        //   $select_user = mysqli_query($connection,$query);  
           
        //   // confirmQuery($select_categories);
          
        //   while($row = mysqli_fetch_assoc($select_user)) {
        //   $user_id = $row['user_id'];
        //   $user_role = $row['user_role'];
  
        //         echo "<option value='{$user_id}'>$user_role</option>";
        //   }
      
       ?>
          </select>
  
  
      </div> -->

  
   <!-- <div class="form-group">
       <label for="post_image">User Image</label>
       <input type="file"  name="user_image">
   </div> -->

   

   <div class="form-group">
       <input class="btn btn-primary" type="submit" name="create_user" value="Submit" >
   </div>







</form>