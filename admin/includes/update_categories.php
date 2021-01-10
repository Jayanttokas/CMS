                       
                            
                            <?php 
                            if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];

                            $stmt =mysqli_prepare($connection,"SELECT cat_id, cat_title FROM categories WHERE cat_id = ?");
                            
                            mysqli_stmt_bind_param($stmt, 'i', $cat_id);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $cat_id, $cat_title);
                            
                            while($row = mysqli_stmt_fetch($stmt)) {


                            }
                        } 


                            ///UPDATE QUERY

                        if(isset($_POST['update_category'])) {
                            $the_cat_title = $_POST['cat_title'];
                        $stmt = mysqli_prepare($connection, "UPDATE categories SET cat_title = ? WHERE cat_id = ?");
                        mysqli_stmt_bind_param($stmt,'si',$the_cat_title,$cat_id);
                        mysqli_stmt_execute($stmt);
                        header("location: categories.php");
                             if(!$stmt) {
                                 die("QUERY FAILED" . mysqli_error($connection));

                             }
                             
                         }
                        
                        ?> 
                       <form action="" method="post">
                        <div class="form-group">
                        <label for="cat-title">Edit Category</label>
                        <input value ="<?php echo isset($cat_title) ? $cat_title : '' ?>" type ="text" class= "form-control" name="cat_title">
                         </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary"  name="update_category" value="Update category">
                          </div>
                        </form> 
                            
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    