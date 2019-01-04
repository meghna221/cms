<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post</title>

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
                   $st="UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
                    $re=mysqli_query($con,$st);
                
                ?>
                <?php
                $select_all_posts="select * from posts where post_id=$the_post_id ";
                $res=mysqli_query($con,$select_all_posts);
                while($row=mysqli_fetch_assoc($res))
                { $post_id=$row['post_id'];
                    $post_title=$row['post_title'];  
                     $post_author=$row['post_authour'];  
                     $post_date=$row['post_date'];  
                     $post_image=$row['post_image'];  
                     $post_content=$row['post_content'];  
                    ?>
                
                
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
                 <?php 

    if(isset($_POST['create_comment'])) {

        $the_post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

            $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

            $create_comment_query = mysqli_query($con, $query);
            $que="update posts set post_comment_count=post_comment_count+1 where post_id=$the_post_id";
             $create_query = mysqli_query($con, $que);
            if(!$create_query)
                die(mysqli_error($con));

        }
else{
    echo "<script>alert('The fields cannot be empty')</script>";
}

    }


?>

     <div class="well">



            <h4>Leave a Comment:</h4>
            <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>
                  <?php 


            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($con, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($con));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];
                
                ?>
                
                
                           <!-- Comment -->
                <div class="media">
                     
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;   ?>
                            <small><?php echo $comment_date;   ?></small>
                        </h4>
                        
                        <?php echo $comment_content;   ?>
 
                    </div>
                </div>
     
                
  

           <?php } }    else {


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
