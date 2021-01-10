<?php include "includes/delete_modal.php"; ?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <!-- <th>Image</th> -->
            <th>Role</th>
            
           
            <!-- <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th> -->
            

           



        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            
           
           







            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            echo "<td><a href ='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href ='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
            echo "<td><a href ='users.php?source=edit_user&u_id={$user_id}'>EDIT</a></td>";
            // echo "<td><a onClick=\"javascript: return confirm('Are you sure you wanna delete ')\" href ='users.php?delete={$user_id}'>DELETE</a></td>";
            echo "<td><a rel='$user_id' href ='javascript:void(0)' class='delete_link'>DELETE</a></td>";
            // echo "</tr>";
           

            


            if(isset($_GET['change_to_admin'])) {
                $the_user_id = $_GET['change_to_admin'];
               
                $query = "UPDATE users SET user_role='admin' WHERE user_id={$the_user_id} ";
                $change_to_admin_query = mysqli_query($connection,$query);
                header("location: users.php"); 
            
            
                }

            

            if(isset($_GET['change_to_subscriber'])) {
                $the_user_id = $_GET['change_to_subscriber'];
               
                $query = "UPDATE users SET user_role='subscriber' WHERE user_id={$the_user_id}  ";
                $change_to_subscriber_query = mysqli_query($connection,$query);
                header("location: users.php"); 
            
            
                }

            
                
            if(isset($_GET['delete'])) {
                    $the_user_id = $_GET['delete'];

                    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
                    $delete_query = mysqli_query($connection,$query);
                    header("location: users.php"); 
                
                
                }
        
           
        }
        ?>
       



    </tbody>
</table>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){

        $(".delete_link").on('click',function(){

            var id = $(this).attr("rel");

            var delete_url = "users.php?delete="+ id +" ";

            $(".model_delete_link").attr("href", delete_url);
            $("#myModal").modal('show');
        });


    });
    </script>




