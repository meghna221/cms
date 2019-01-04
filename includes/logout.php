<?php  include "db.php"; ?>
<?php  include "../header.php"; ?>
<?php $_SESSION['username'] = null;
             $_SESSION['firstname'] = null;
             $_SESSION['lastname'] = null;
             $_SESSION['user_role'] =null;
       header("Location:../index.php");
?>