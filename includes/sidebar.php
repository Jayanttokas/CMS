    <div class="col-md-4">
           <!-- Blog Search Well -->
     
                <div class="well">
                   <h4>Blog Search</h4>
                    <form action = "search.php" method= "post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                </div>

                <!-- login  -->
                <div class="well">

                <?php if(isset($_SESSION['user_role'])): ?>
                    <h4>Logged in as <?php echo $_SESSION['username']?> 
                    <a href="includes/logout.php" class="btn btn-promary"><button name="logout" class="btn btn-primary" >Logout</button></a></h4>
                   
                    
                <?php else: ?>
                
                   <h4>Login</h4>
                    <form action = "includes/login.php" method= "post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                        
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                        <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                        <span class="input-group-btn">
                            <button name="login" class="btn btn-primary" type="submit">Submit
                                
                        </button>
                        </span>
                    </div>
                    
                    </form>
                <?php endif; ?>   
                </div>
                

                <!-- Blog Categories Well -->
                <?php
                $query = "SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection,$query);
                ?>

                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                <?php  while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }
                ?>
                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              <?php include "widgets.php"; ?>

            </div>

    </div>