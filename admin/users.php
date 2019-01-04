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
                      <?php
                        if(isset($_GET['source']))
                        {
                            $source=$_GET['source'];
                        }
                        else
                            $source='';
                      switch($source) {
    
                          case 'add_user':
     include "includes/add_user.php";
    break; 
                          case 'edit_user':
    include "includes/edit_user.php";
    break;
    
    default:
    
    include "includes/view_all_users.php";
    
    break;
    
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