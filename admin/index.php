<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

    
        <!-- Navigation -->
        
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">
                         Welcome to Admin   
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>

                        
                        
                    </div>
                </div>
                <!-- /.row -->
                       
               
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
                    
                    $query = "SELECT * FROM posts";
                    $select_all_post = mysqli_query($connection, $query);
                    $post_count = mysqli_num_rows($select_all_post);

                    ?>

                  <div class='huge'><?php echo $post_count; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
                    
                    $query = "SELECT * FROM categories";
                    $select_all_category = mysqli_query($connection, $query);
                    $categories_count = mysqli_num_rows($select_all_category);

                    ?>

                        <div class='huge'><?php echo $categories_count; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
                    
                    $query = "SELECT * FROM comments";
                    $select_all_comments = mysqli_query($connection, $query);
                    $comments_count = mysqli_num_rows($select_all_comments);

                    ?>

                     <div class='huge'><?php echo $comments_count; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                    
                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection, $query);
                    $users_count = mysqli_num_rows($select_all_users);

                    ?>

                    <div class='huge'><?php echo $users_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
   
</div>

<?php
$query = "SELECT * FROM posts WHERE post_status ='published'";
$select_published_posts = mysqli_query($connection,$query);
$published_posts_count = mysqli_num_rows($select_published_posts);

$query = "SELECT * FROM posts WHERE post_status ='draft'";
$select_draft_posts = mysqli_query($connection,$query);
$draft_posts_count = mysqli_num_rows($select_draft_posts);

$query = "SELECT * FROM comments WHERE comment_status ='unapproved'";
$select_unapproved_comments = mysqli_query($connection,$query);
$unapproved_comments_count = mysqli_num_rows($select_unapproved_comments);

$query = "SELECT * FROM users WHERE user_role ='subscriber'";
$select_subscriber_users = mysqli_query($connection,$query);
$subscriber_users_count = mysqli_num_rows($select_subscriber_users);

?>

<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['data', 'count'],
          <?php 
          $element_text = ['Posts','Published Posts','Draft Posts','Categories','Comments','Unapproved Comments','Users','Subscribers'];
          $element_count = [$post_count,$published_posts_count,$draft_posts_count,$categories_count,$comments_count,$unapproved_comments_count,$users_count,$subscriber_users_count];

          for($i =0; $i < 8; $i++) {
              echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
          }

          ?>
         

          
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
    <div id="columnchart_material" style="width: auto; height: 500px;"></div>

</div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
      
    </div>
<?php include "includes/admin_footer.php"  ?>