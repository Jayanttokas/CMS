<?php include "includes/admin_header.php" ?>
<?php include "includes/delete_modal.php"; ?>

    <div id="wrapper">
    
        <!-- Navigation -->
        
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">
                        Categories  
                            <!--   -->
                        </h1>

                        <div class="col-xs-6">
                        
                        <!-- insert categories -->
                        <?php insert_categories(); ?>
                    
                        <form action="" method="post">
                         <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input type="text" class="form-control" name="cat_title">
                         </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary"  name="submit" value="Add category">
                          </div>
                        </form> 

                        <!-- update categories -->
                        <?php 
                        if(isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        
                        ?> 
                        </div>
                        <!--add category form-->

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thread>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thread>
                                <tbody>
                               
                                <?php findAllcategories();  ?>
                                    
                                    
                                <?php delete_categories();  ?>   
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>    
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
<?php include "includes/admin_footer.php"  ?> 

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
    <script>
    $(document).ready(function(){

        $(".delete_link").on('click',function(){

            var id = $(this).attr("rel");

            var delete_url = "categories.php?delete="+ id +" ";

            $(".model_delete_link").attr("href", delete_url);
            $("#myModal").modal('show');
        });


    });
    </script>

                                   


                                