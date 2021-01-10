<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                    $the_post_user = $_GET['user'];

                }

                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

                $query = "SELECT * FROM posts WHERE post_user= '{$the_post_user}'" ;
                } else {

                    $query = "SELECT * FROM posts WHERE post_user= '{$the_post_user}' AND post_status = 'published'" ;
                }


            
                $select_all_posts_query = mysqli_query($connection, $query);
                
                if(mysqli_num_rows($select_all_posts_query) < 1) {
                    echo "<h2 class='text-center'>No Posts Available</h2>";
                }else {

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_user = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                ?>

                    

                    <!-- First Blog Post -->
                    <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                     by <?php echo $post_user ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>
                <?php } ?>
                <!-- blog comments -->
                <?php
                
                if(isset($_POST['create_comment'])) {
                    $comment_post_id= $_GET['p_id'];
                    $comment_user= $_POST['comment_user'];
                    $comment_email= $_POST['comment_email'];
                    $comment_content= $_POST['comment_content'];
                    $comment_date= date('Y-m-d');
               
                    if(!empty($comment_user) && !empty($comment_email) && !empty($comment_content)) {
                        
                        $query = "INSERT INTO comments (comment_post_id, comment_user, comment_email, comment_content, comment_status, comment_date) " ;
           
                        $query .= "VALUES({$comment_post_id},'{$comment_user}','{$comment_email}','{$comment_content}',
                        'unapproved', ' {$comment_date}') "; 
           
                        // echo $query; die('fer');
                        $create_comment_query = mysqli_query($connection, $query);

                        $query = "UPDATE posts SET post_comment_count= post_comment_count + 1 ";
                        $query .= "WHERE post_id = '$the_post_id'";

                        $update_comment_count = mysqli_query($connection,$query);
           
                        // confirmQuery($create_post_query);
           
                    }else {
                      echo  "<script> alert('Field cannot be empty') </script> ";

                    }
                    }
                }

                
                
                ?>


                
                

                   


            </div>


            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <?php include "includes/footer.php"; ?>