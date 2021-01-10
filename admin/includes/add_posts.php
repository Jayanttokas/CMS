

<?php 

if(isset($_POST['create_post'])) {

    $post_title = $_POST['post_title'];
    $post_user = $_POST['post_user'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('Y-m-d');
    // $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image" ) ;

    $query ="INSERT INTO posts(post_category_id, post_title, post_user,
     post_date, post_image, post_content, post_tags, post_status) " ;

    $query .= 
    "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}',
    '{$post_content}','{$post_tags}','{$post_status}') "; 

    // echo $query; die('fer');
     $create_post_query = mysqli_query($connection, $query);

     confirmQuery($create_post_query);

     $the_post_id = mysqli_insert_id($connection);
    
     echo "<h4>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>View All Posts</a></h4> ";
}


?>


<form action ="" method="post" enctype="multipart/form-data">
  
   <div class="form-group">
       <label for="title">Title</label>
       <input type="text" class="form-control" name="post_title">
   </div>

   <div class="form-group">
       <label for="post_category">Category</label>
       <br>
       <select name="post_category" id="post_category">
       <option value=''>Select</option>
      <?php
      
      $query ="SELECT * FROM categories ";
        $select_categories = mysqli_query($connection,$query);  
         
        // confirmQuery($select_categories);
        
        while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
              
              
              echo "<option value='{$cat_id}'>$cat_title</option>";
        }

       
    
     ?>
        </select>


    </div>

   <div class="form-group">
       <label for="post_user">Users</label>
       <br>
       <select name="post_user" id="post_user">
       <option value=''>Select</option>
      <?php
      
      $query ="SELECT * FROM users ";
        $select_users = mysqli_query($connection,$query);  
         
        // confirmQuery($select_categories);
        
        while($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
              
              
              echo "<option value='{$username}'>$username</option>";
        }

       
    
     ?>
        </select>


    </div>

   <div class="form-group">
       <label for="post_status">Post Status</label>
       <br>
       <select name="post_status" id="post_status" >
           <option value="draft">Select Option</option>  
           <option value="draft">Draft</option>  
           <option value="published">Publish</option>

     
        </select>


    </div>
   <div class="form-group">
       <label for="post_image">Image</label>
       <input type="file" name="image">
   </div>

   <div class="form-group">
       <label for="post_tags">Post tags</label>
       <input type="text" class="form-control" name="post_tags">
   </div>

   <div class="form-group">
       <label for="post_content">Content</label>
       <textarea type="text" class="form-control cnt" name="post_content" id="" cols="30" rows="10" >
       </textarea>    
   </div>

   <div class="form-group">
       <input class="btn btn-primary" type="submit" name="create_post" value="publish post" >
   </div>







</form>
