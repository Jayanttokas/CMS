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

                if(isset($_GET['p_id'])){ 
                    $the_post_id = $_GET['p_id'];
                
               

                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                } else {

                    $query= "SELECT *FROM posts WHERE post_id = $the_post_id AND post_status = 'published' ";
                }


                
                $select_all_posts_query = mysqli_query($connection, $query);

            if(mysqli_num_rows($select_all_posts_query) < 1) {
                echo "<h2 class='text-center'>No Posts Available</h2>";
            }else {

                $view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id='{$the_post_id}' ";
                $send_query = mysqli_query($connection,$view_query);

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
                        <?php echo $post_title ?>
                    </h2>
                    <p class="lead">
                        by <a href="user_posts.php?user=<?php echo $post_user ?>&p_id=<?php echo $post_id?>"><?php echo $post_user ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>
                    <hr>
                <?php }
             ?>
                <!-- blog comments -->
                <?php
                
                if(isset($_POST['create_comment'])) {
                    $comment_post_id= $_GET['p_id'];
                    $comment_author= $_POST['comment_author'];
                    $comment_email= $_POST['comment_email'];
                    $comment_content= $_POST['comment_content'];
                    $comment_date= date('Y-m-d');
               
                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                        
                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) " ;
           
                        $query .= "VALUES({$comment_post_id},'{$comment_author}','{$comment_email}','{$comment_content}',
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

                

                
                
                ?>


                <!-- Comments Form --> 
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                    <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input name="comment_author" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input name="comment_email" type="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment here</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC ";
                    $select_comment_query = mysqli_query($connection, $query);


                    // if(!$select_comment_query) {
                    //     die('query failed' . mysqli_error($connection));
                    // }

                

                    while ($_row = mysqli_fetch_array($select_comment_query)) {
                        $comment_date= $_row['comment_date'];
                        $comment_author= $_row['comment_author'];
                        $comment_content= $_row['comment_content'];

                    
                
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo  $comment_author ?>
                            <small><?php echo  $comment_date ?></small>
                        </h4>
                        <?php echo  $comment_content ?>
                    </div>
                </div>
                

                    <?php  } } } else {
                header("location: /index.php");
            } ?>


            </div>


            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <?php include "includes/footer.php"; ?>