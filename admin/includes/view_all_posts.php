<?php

include "delete_modal.php";

if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $postValueid) {
    $bulk_options = $_POST['bulk_options'];
    
       switch($bulk_options) {
       
        case 'published';
           
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueid} ";
                $publish_query = mysqli_query($connection,$query);  
            break;

        case 'draft';
           
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueid} ";
                $draft_query = mysqli_query($connection,$query);  
            break;
        
        case 'delete';
          
                $query = "DELETE FROM posts WHERE post_id = {$postValueid} ";
                $draft_query = mysqli_query($connection,$query);  
            break;

        case 'clone';
            
            $query = "SELECT * FROM posts WHERE post_id = {$postValueid}";
            $select_all_posts = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $post_id = $row['post_id'];
                $post_user = $row['post_user'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
            
            }
            $query ="INSERT INTO posts(post_category_id, post_title, post_user,
     post_date, post_image, post_content, post_tags, post_status) " ;

    $query .= 
    "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}',
    '{$post_content}','{$post_tags}','{$post_status}') "; 

    // echo $query; die('fer');
     $create_post_query = mysqli_query($connection, $query);

     confirmQuery($create_post_query);
        
        break;

       }

     }
}

?>
<form action="" method="post">

<table class="table table-bordered table-hover">
    
    <div id="bulkOptionContainer" class="col-xs-4 " style="padding:0" >

    <select class ="form-control" name="bulk_options" id="">
        <option value="">Select Option</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
    </select>   

    </div>

    <div class="col-xs-4">

    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>

</table>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Users</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <!-- <th>tags</th> -->
            <th>Date</th>
            <th>Comments</th>
            <th>Views</th>
            <th>View Posts</th>
            <th>Edit</th>
            <th>Delete</th>


            <!-- <th>Content</th> -->



        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT posts.*, categories.cat_title, categories.cat_id FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id";
        $select_all_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_posts)) {
            $post_id = $row['post_id'];
            $post_user = $row['post_user'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_view_count = $row['post_view_count'];
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];









            echo "<tr>";
            ?>
            
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" 
            value="<?php echo $post_id; ?>"></td>
        
            <?php 
            echo "<td>{$post_id}</td>";

            // if(!empty($post_author)) {
            //     echo "<td>{$post_author}</td>";
            // }else
            if(!empty($post_user)) {
                echo "<td>$post_user</td>";
            }

            
            
            
            echo "<td>{$post_title}</td>";

            // $query ="SELECT * FROM categories WHERE cat_id = $post_category_id ";
            // $select_categories_id = mysqli_query($connection,$query);  
                            
            //     while($row = mysqli_fetch_assoc($select_categories_id)) {
            //      $cat_id = $row['cat_id'];
            //      $cat_title = $row['cat_title'];

            echo "<td>{$cat_title}</td>";
                // }
            
            echo "<td>{$post_status}</td>";
            echo "<td><img width='100' src ='../images/{$post_image}'></td>";
            // echo "<td>{$post_tags}</td>";
            echo "<td>{$post_date}</td>";

            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
            $send_comment_query = mysqli_query($connection, $query);

        //     while($row = mysqli_fetch_array($send_comment_query)) {

            
        //     $comment_id = $row['comment_id']; 
        // }

            $count_comments = mysqli_num_rows($send_comment_query);


            echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you wanna reset ')\" href ='posts.php?reset={$post_id}'>{$post_view_count}</a></td>";
            echo "<td><a href ='../post.php?p_id={$post_id}'>View</a>";
            echo "<td><a href ='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
            echo "<td><a rel='$post_id' href ='javascript:void(0)' class='delete_link'>DELETE</a></td>";
            // echo "<td><a onClick=\"javascript: return confirm('Are you sure you wanna delete ')\" href ='posts.php?delete={$post_id}'>DELETE</a></td>";
            echo "</tr>";
            // echo "<td>{$post_content}</td>";

           
            

            if(isset($_GET['delete'])) {
                if(isset($_SESSION['user_role'])) {

                    if($_SESSION['user_role'] = 'admin') {

                $the_post_id = mysqli_real_escape_string($connection,$_GET['delete']) ;
                $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
                $delete_query = mysqli_query($connection,$query);
                header("location: posts.php"); 
            
                    }
                  }
                }

            if(isset($_GET['reset'])) {
                $the_post_id = $_GET['reset'];
                $query = "UPDATE posts SET post_view_count= 0 WHERE post_id = {$the_post_id} ";
                $rest_count_query = mysqli_query($connection,$query);
                header("location: posts.php"); 
                
                
                }

            
           
        }
        ?>
       </form>



    </tbody>
</table>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
    $(document).ready(function(){

        $(".delete_link").on('click',function(){

            var id = $(this).attr("rel");

            var delete_url = "posts.php?delete="+ id +" ";

            $(".model_delete_link").attr("href", delete_url);
            $("#myModal").modal('show');
        });


    });
    </script>


