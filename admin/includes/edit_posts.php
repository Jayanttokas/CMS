<?php
       
       if(isset($_GET['p_id'])) {
           $the_post_id = $_GET['p_id'];
       }
       
       $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
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

        if(isset($_POST['update_post'])) {
            
            $post_user= $_POST['post_user'];
            $post_title= $_POST['post_title'];
            $post_category_id= $_POST['post_category'];
            $post_status= $_POST['post_status'];
            $post_image= $_FILES['image']['name'];
            $post_image_temp= $_FILES['image']['tmp_name'];
            $post_content= $_POST['post_content'];
            $post_tags= $_POST['post_tags'];

            move_uploaded_file($post_image_temp,"../images/$post_image");

            if(empty($post_image)) {
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                $select_image = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_array($select_image)) {
                    $post_image = $row['post_image'];
                }
            }

            $query = "UPDATE posts SET ";
            $query .="post_title = '{$post_title}', ";
            $query .="post_category_id = '{$post_category_id}', ";
            $query .="post_date = now(), ";
            $query .="post_user = '{$post_user}', ";
            $query .="post_status = '{$post_status}', ";
            $query .="post_tags = '{$post_tags}', ";
            $query .="post_content = '{$post_content}', ";
            $query .="post_image = '{$post_image}' ";
            $query .="WHERE post_id = {$the_post_id} ";
            
           $update_post = mysqli_query($connection,$query);
          
           echo "<h4 class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a>  or  <a href='posts.php'>Edit More Posts</a></h4> ";

           confirmQuery($update_post);
          

        }


?>             







<form action ="" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
       <label for="title">Title</label>
       <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
    </div>

    <div class="form-group">
       <label for="post_category_id">Category</label>
       <br>
       <select name="post_category" id="post_category">
       <option value=''>Select</option>
      <?php
      
        $query ="SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);  
         
        // confirmQuery($select_categories);
        
        while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];


            //   echo "<option value='{$cat_id}'>$cat_title</option>";

            
           
            if($cat_id == $post_category_id){
                echo '<option value = "'.$row['cat_id'].'" selected="'.$select_attribute.'">'.$row['cat_title'].'</option>';
            } else {
                echo '<option value = "'.$row['cat_id'].'">'.$row['cat_title'].'</option>';
            }

              
        
            
        } 
    
     ?>
        </select>


    </div>

    <div class="form-group">
       <label for="post_user">Users</label>
       <br>
       <select name="post_user" id="post_user">
       
      <?php
      echo "<option value='{$post_user}'>$post_user</option>";

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
       <select name="post_status" id="post_status">
           <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>  

      <?php
      
       
            if($post_status == 'published'){
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value = 'published'>Publish</option>";
            }
 
    
     ?>
        </select>


    </div>

   <div class="form-group">
       <label for="post_image">Image</label>
       <input type="file" name="image">
       <br>
       <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
   </div>
 
   <div class="form-group">
       <label for="post_tags">Post tags</label>
       <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
   </div>

   <div class="form-group">
       <label for="post_content">Content</label>
       <textarea type="text"  class="form-control cnt" name="post_content" id="" cols="30" rows="10" > <?php echo $post_content; ?>
       </textarea>
   </div>

   <div class="form-group">
       <input class="btn btn-primary" type="submit" name="update_post" value="UPDATE POST" >
   </div>







</form>