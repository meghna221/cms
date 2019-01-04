<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php 
    include "includes/db.php";
    include "header.php";
    include "includes/nav.php";
    ?>

</head>

<body>

    <!-- Navigation -->
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

             <?php
                if(isset($_GET['p_id']))
                {
                    $the_post_id=$_GET['p_id'];
                    $the_post_author=$_GET['author'];
                
                ?>
                <?php
                $select_all_posts="select * from posts where post_authour='$the_post_author' ";
                $res=mysqli_query($con,$select_all_posts);
                while($row=mysqli_fetch_assoc($res))
                { $post_id=$row['post_id'];
                    $post_title=$row['post_title'];  
                     $post_author=$row['post_authour'];  
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
                <hr>
                <?php }
                ?>
            
           <?php }    else {


            header("Location: index.php");


            }
                ?>
           
            </div>

              
            <!-- Blog Sidebar Widgets Column -->
           <?php
        include "includes/sidebar.php";
        ?>
        </div>

        <hr>
       
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
