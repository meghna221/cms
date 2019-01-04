<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include "files/header.php"; ?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "files/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                          <i><small style="font-size:30px"><?php echo $_SESSION['username'] ?></small></i>
                        </h1>
                        <div class="col-xs-6">
                            <?php 
                            if(isset($_POST['submit']))
                            {
                                $cat_title=$_POST['cat_title'];
                                if($cat_title=="" || empty($cat_title)){
                                    echo "This field should not be left empty";
                                }
                                else{
                                    $que="insert into categories(cat_title) values('$cat_title') ";
                                    $cque=mysqli_query($con,$que);
                                    
                            }
                            }
                            ?>
                            
                            <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                                <br>
                                 <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                                </form>
                            
                        
                         
                                 <?php 
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                $query="select *from categories where cat_id=$cat_id";
                                $selcat=mysqli_query($con,$query);
                                while($rows=mysqli_fetch_assoc($selcat)){
                                    $cat_id=$rows['cat_id'];
                                    $cat_title=$rows['cat_title'];}
                                    echo "<form action='' method='post'>
                                    <div class='form-group'>
                                <label for='cat_title'>Edit Category</label>
                                  <input type='text' name='cat_title2' class='form-control' value='".$cat_title."'>
                                <br>
                                 <input class='btn btn-primary' type='submit' name='up' value='Update'>
                                </div>
                                </form>";
                                    
                                if(isset($_POST['up']))
                            {
                                $title=$_POST['cat_title2'];
                
                                $quer="update categories set cat_title='$title' where cat_id=$cat_id";
                                $upd=mysqli_query($con,$quer);
                                   
                            }
                            }
                            ?>
                                   
                        </div>
                        <div class="col-xs-6">
                            
                            <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>Category ID</th>
                                <th>Category Title</th></tr>
                            </thead>
                                <tbody>
                                <?php
                                $select_all_categories="select  *from categories";
                                $res=mysqli_query($con,$select_all_categories);
                                while($row=mysqli_fetch_assoc($res))
                                { $cat_title=$row['cat_title'];
                                 $cat_id=$row['cat_id'];
                                 
                                ?>
                           
                                <tr>
                                <td><?php echo $cat_id; ?></td>
                                <td><?php echo $cat_title; ?></td>
                                    <?php echo "<td><a href='categories.php?delete=$cat_id '>Delete</a></td>" ?>
                                    <?php echo "<td><a href='categories.php?edit=$cat_id '>Edit</a></td>" ?>
                                
                                </tr>
                                        <?php } ?>
                                    </tbody></table>
                                    <?php 
                                    if(isset($_GET['delete'])){
                                        $the_cat_id=$_GET['delete'];
                                        $query="delete from categories where cat_id=$the_cat_id ";
                                        $dquery=mysqli_query($con,$query);
                                        header("Location : categories.php");
                                       
                                    }
                                    ?>
                        
                             
                                    <?php 
                            
                           
                            ?>
                                   
                        </div>
                <?php 
                                    if(isset($_GET['delete'])){
                                        $the_cat_id=$_GET['delete'];
                                        $query="delete from categories where cat_id=$the_cat_id ";
                                        $dquery=mysqli_query($con,$query);
                                        header("Location : categories.php");
                                       
                                    }
                                    ?>
            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
