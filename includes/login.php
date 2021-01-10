<?php include "db.php"; ?>
<?php session_start(); ?>
<?php include "../admin/functions.php"; ?>

<?php 

if(isset($_POST['login'])) {
    
    login_user($_POST['username'],$_POST['password']);
    

    $error = [
        
        'username'=> '',
        'password'=> '',

    ];

    if($username ==''){

        $error['username'] = 'enter username';
    }

    if(!username_exists($username)){

        $error['username'] = "username don't exist";
    }

    if(password_exists($password)){

        $error['pssword'] = 'incorrect password';
    }
    
   
    

       
   

}



?>
