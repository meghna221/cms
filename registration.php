<?php  include "includes/db.php"; ?>
 <?php  include "header.php"; ?>
    <?php  include "includes/nav.php"; ?>
<?php
if(isset($_POST['submit']))
{$username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
$username=mysqli_real_escape_string($con,$username);
$password=mysqli_real_escape_string($con,$password);
$email=mysqli_real_escape_string($con,$email);
 $que="select randSalt from users";
 $sr=mysqli_query($con,$que);
 $row=mysqli_fetch_array($sr);
 $salt=$row['randSalt'];
 $password=crypt($password,$salt);
  $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}', '{$password}', 'subscriber' )";
        $register_user_query = mysqli_query($con, $query);
 if(!$register_user_query )
     die(mysqli_error($con));

}
?>
 <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
        <hr>

<?php include "footer.php";?>
