<?php include "includes/admin_header.php" ?>
<?php 

if($_SESSION['username']) {
    $the_username = $_SESSION['username'];
    
    $query = "SELECT * FROM users WHERE username = '{$the_username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        // $user_image = $row['user_image'];
       

        }
    
        if(isset($_POST['edit_user'])) {
            
           
            $username = $_POST['username'];
            $user_password = $_POST['user_password'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_email = $_POST['user_email'];
            
    
               
        if(!empty($user_password)){

            $query_password = "SELECT user_password FROM users WHERE username = '{$the_username}'";
            $get_user_query = mysqli_query($connection,$query_password);
            confirmQuery($get_user_query);

            $row = mysqli_fetch_array($get_user_query);

            $db_user_password = $row['user_password'];
        
           if($db_user_password != $user_password){
            $hashed_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 12) );

           }
    
                $query = "UPDATE users SET ";
                $query .="username = '{$username}', ";
                $query .="user_password = '{$hashed_password}', ";
                $query .="user_firstname = '{$user_firstname}', ";
                $query .="user_lastname = '{$user_lastname}', ";
                $query .="user_email = '{$user_email}', ";
                
                $query .="WHERE user_id = {$the_user_id} ";
                
               $update_user = mysqli_query($connection,$query);
               header("location: profile.php");
               confirmQuery($update_user);

        }
    }


}

?>

    <div id="wrapper">
    
        <!-- Navigation -->
        
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">
                         Profile  
                            <!-- <small>Author</small> -->
                        </h1>
                        <form action ="" method="post" enctype="multipart/form-data">
  
  <div class="form-group">
         <label for="user_firstname">Firstname</label>
         <input type="text" value="<?php echo $user_firstname ?>" class="form-control" name="user_firstname">
     </div>
  
     <div class="form-group">
         <label for="user_lastname">Lastname</label>
         <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
     </div>
  
      
  
     <div class="form-group">
         <label for="username">Username</label>
         <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
     </div>
  
     <div class="form-group">
         <label for="user_email">Email</label>
         <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
     </div>
  
     
  
     <div class="form-group">
         <label for="user_password">Password</label>
         <input autocomplete="off" type="password" value=""  class="form-control" name="user_password">
     </div>
  
     
     
  
    
    
    
    
    
     <!-- <div class="form-group">
         <label for="post_image">User Image</label>
         <input type="file"  name="user_image">
     </div> -->
  
     
  
     <div class="form-group">
         <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile" >
     </div>
  
  
  
  
  
  
  
  </form>
                
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include "includes/admin_footer.php"  ?>    
                                   


                                