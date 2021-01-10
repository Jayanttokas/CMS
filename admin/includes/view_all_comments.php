
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>user</th>
            <th>comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
            

           



        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM comments";
        $select_all_comments = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_user = $row['comment_user'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
           







            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_user}</td>";
            echo "<td>{$comment_content}</td>";            
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";


            $query ="SELECT * FROM posts WHERE post_id = $comment_post_id ";
            $select_post_id = mysqli_query($connection,$query);  
                            
                while($row = mysqli_fetch_assoc($select_post_id)) {
                 $post_id = $row['post_id'];
                 $post_title = $row['post_title'];

            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                }  



            
            echo "<td>{$comment_date}</td>";
            echo "<td><a href ='comments.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a href ='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
            // echo "<td><a href ='comments.php?source=edit_post&p_id='>EDIT</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you wanna delete ')\" href ='comments.php?delete={$comment_id}'>DELETE</a></td>";
            echo "</tr>";
           

            


            if(isset($_GET['approve'])) {
                $the_comment_id = $_GET['approve'];
               
                $query = "UPDATE comments SET comment_status='approved' WHERE comment_id={$the_comment_id} ";
                $approve_comment_query = mysqli_query($connection,$query);
                header("location: comments.php"); 
            
            
                }

            

            if(isset($_GET['unapprove'])) {
                $the_comment_id = $_GET['unapprove'];
               
                $query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id={$the_comment_id}  ";
                $unapprove_comment_query = mysqli_query($connection,$query);
                header("location: comments.php"); 
            
            
                }

            
                
            if(isset($_GET['delete'])) {
                    $the_comment_id = $_GET['delete'];

                    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
                    $delete_query = mysqli_query($connection,$query);
                    header("location: comments.php"); 
                
                
                }
        
           
        }
        ?>
       



    </tbody>
</table>



