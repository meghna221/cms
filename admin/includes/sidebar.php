
    <?php
    if(isset($_POST['search']))
    { echo '<div class="col-md-8">';
        $search=$_POST['search'];
        $search_query="select * from posts where post_tags like '%$search%'";
        $result=mysqli_query($con,$search_query);
        $count=mysqli_num_rows($result);
        if($count==0)
            echo '<h1>No Results Found</h1>';
        else
        {
            while($row=mysqli_fetch_assoc($result))
        { $post_title=$row['post_title'];  
                     $post_author=$row['post_author'];  
                     $post_date=$row['post_date'];  
                     $post_image=$row['post_image'];  
                     $post_content=$row['post_content'];  
                    ?>
                <h1 class="page-header">
                    HELLO WORLD
                    <small>hello world</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php  echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php  echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php  echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="<?php  echo $post_image;?>" alt="">
                <hr>
                <p><?php  echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }
                
            
        
        } 
     echo '</div>';
     
    }
    ?>

    <div class="col-md-4">
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                                $select_all_categories="select  *from categories";
                                $res=mysqli_query($con,$select_all_categories);
                                while($row=mysqli_fetch_assoc($res))
                                { $cat_title=$row['cat_title'];
                                ?>
                                <li><a href="#"><?php echo $cat_title;?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php
        include 'includes/widget.php';
        ?>

            </div>

        </div>