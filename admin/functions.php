<?php 

function users_online() {
    global $connection;

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 30;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if($count == NULL) {

        mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session','$time')");

        
    } else {

        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
    }

    $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
    return $count_user = mysqli_num_rows($users_online_query);

}


function confirmQuery($result) {
    global $connection;

    if(!$result) {
         die("QUERY FAILED" . mysqli_error($connection));
    }
    
}

//INSERT CATEGORIES function

function insert_categories()  {
 global $connection;

if(isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];


    if($cat_title == "" || empty($cat_title)) {
        echo "Empty";
    } else {


        $stmt =mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?) ");

        mysqli_stmt_bind_param($stmt,'s', $cat_title);
        mysqli_stmt_execute($stmt);
        
        if(!$stmt) {
            echo "not working";
        }
    }
   }
}

//FIND ALL CATEGORIES QUERY
function findAllcategories()  {
 global $connection;
$query = "SELECT * FROM categories";
$select_all_categories = mysqli_query($connection,$query);
                                  

while($row = mysqli_fetch_assoc($select_all_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a rel='$cat_id' href ='javascript:void(0)' class='delete_link'>DELETE</a></td>";
    echo "<td><a href ='categories.php?edit={$cat_id}'>EDIT</a></td>";
    echo "</tr>";
}
}

//DELETE QUERY
function delete_categories()  {
    global $connection;
if(isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("location: categories.php"); 


    }
}

function is_admin($username) {

    global $connection;

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);

    if($row['user_role'] == 'admin') {
        return true;

    }else {
        return false;

    }
}
  

function login_user($username,$password){
    
    global $connection;

    $username = trim($username);
    $password =  trim($password);
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }


    while($row = mysqli_fetch_array($select_user_query)) {

       $db_user_id = $row['user_id'];
       $db_username = $row['username'];
       $db_user_password =  $row['user_password'];
       $db_user_firstname = $row['user_firstname'];
       $db_user_lastname = $row['user_lastname'];
       $db_user_role = $row['user_role'];
    }
    
    // $password= crypt($password,$db_user_password);

    if(password_verify($password,$db_user_password)) {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;


        header("location: /cms/admin");  
    } else {
        header("location: ../index.php");
    }
}


function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);

    

    if(mysqli_num_rows($result) > 0) {
        return true;

    }else {
        return false;
        
    }
}




function email_exists($email){

    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);

    

    if(mysqli_num_rows($result) > 0) {
        return true;

    }else {
        return false;
        
    }
}

function password_exists($password){

    global $connection;

    $query = "SELECT user_password FROM users WHERE user_password = '$password'";
    $result = mysqli_query($connection,$query);
    confirmQuery($result);

    

    if(mysqli_num_rows($result) > 0) {
        return true;

    }else {
        return false;
        
    }
}


function registration_user($username,$email,$password){

    global $connection;

            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
        
            $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12) );

                $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
                $query .= "VALUES('{$username}','{$email}','{$password}','subscriber') ";
                $register_user_query = mysqli_query($connection, $query);
                
}    
?>