<?php include "includes/db.php"; ?>
 <?php include "includes/header.php"; ?>
 <?php include "admin/functions.php"; ?>

<body>

    <!-- Navigation -->
   <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php 

            if(isset($_GET['category'])) {
                $post_category_id = $_GET['category'];
            }


            // if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin') {

            //     $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_user, post_date, post_image, post_content
            //      FROM posts WHERE post_category_id = ?");
            // } else {

                $stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_user, post_date, post_image, post_content 
                FROM posts WHERE post_category_id = ? AND post_status = ? ");

                $published = 'published';
            // }

            // if(isset($stmt1)){
            //     mysqli_stmt_bind_param($stmt1, "i", $post_category_id);
            //     mysqli_stmt_execute($stmt1);
            //     mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_user, $post_date, $post_image, $post_content );
                
            //     $stmt = $stmt1;
            // }else{
                mysqli_stmt_bind_param($stmt2, "is", $post_category_id, $published);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_user, $post_date, $post_image, $post_content );

                
                
                $stmt = $stmt2;
            // }


           
            
            $count = $stmt->num_rows;

                     
            
            // if($stmt) {
            //     echo "<h2 class= 'text-center'>No Categories Available</h2>";
            // }

            while(mysqli_stmt_fetch($stmt)):
               
                
            ?>
            
           
            

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="user_posts.php?user=<?php echo $post_user ?>&p_id=<?php echo $post_id?>"><?php echo $post_user ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php  endwhile; mysqli_stmt_close($stmt); 
            ?>
            
            
        </div>
    

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>