<?php  include "db.php"; ?>
<?php  include "../header.php"; ?>
<?php if(isset($_POST['login']))
{
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=mysqli_real_escape_string($con,$username);
     $password=mysqli_real_escape_string($con,$password);
    $que="select * from users where username='$username' ";
    $selec=mysqli_query($con,$que);
    while($row=mysqli_fetch_assoc($selec))
    {
         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];

    }
    $password=crypt($password,$db_user_password);
    if($username==$db_username && $password==$db_user_password)
        {$_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;
       header("Location: ../admin");
    }
       else header("Location:../index.php");
   
}