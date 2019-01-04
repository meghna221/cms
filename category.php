<!DOCTYPE html>
<html lang="en">

<?php 
    include "includes/db.php";
    include "header.php";
    ?>

<body>

    <?php 
        include "includes/nav.php";
        ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
    
                <?php
                if(isset($_GET['category'])){
        
      $post_category_id  = $_GET['category']; 
                $select_all_posts="select * from posts where post_category_id=$post_category_id ";
                $res=mysqli_query($con,$select_all_posts);
                    if(!$res)
                        die(mysqli_error($con));
                while($row=mysqli_fetch_assoc($res))
                { $post_id=$row['post_id'];
                    $post_title=$row['post_title'];  
                     $post_author=$row['post_authour'];  
                     $post_date=$row['post_date'];  
                     $post_image=$row['post_image'];  
                     $post_content=substr($row['post_content'],0,100);  
                    ?>
                
                <h1 class="page-header">
                    HELLO WORLD
                    <small>hello world</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php  echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php  echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php  echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php  echo $post_image;?>" alt="">
                <hr>
                <p><?php  echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }
                }
                ?>

            </div>

          <?php
    include "includes/sidebar.php";
    ?>

        <hr>

        <!-- Footer -->
        <?php
        include "footer.php";
        ?>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
