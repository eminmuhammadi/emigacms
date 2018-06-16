<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>

<?php

$title="Login Page" ;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php'); 

?>
<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/head.php');  ?>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
<div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4><?php echo "$title";?></h4>

<form action="login.php" method="post">
<div class="form-group">
<label>Username</label>
<input name="username" type="text" class="form-control" placeholder="Username" required autocomplete="Off">
</div>

                                    
<div class="form-group">
<label>Password</label>
<input name="password" type="password" class="form-control" placeholder="Password" required autocomplete="Off">
</div>

<?php
if(isset($_POST['login'])){ 

    $username = mysqli_real_escape_string($connect, $_POST["username"]); 
    $password = mysqli_real_escape_string($connect, md5($_POST["password"]));
 

$login ="SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
$result = mysqli_query($connect, $login);  
if(mysqli_num_rows($result) > 0)  
{
while($row = mysqli_fetch_array($result))
{
session_start();
$_SESSION['id'] = $row['id']; 
$_SESSION['username'] = $row['username']; 
$_SESSION['first_name'] = $row['first_name']; 
$_SESSION['last_name'] = $row['last_name']; 
$_SESSION['logged'] = TRUE; 
header("Location: dashboard.php"); 
exit; 
}
}
else{    
echo "

<div class=\"alert alert-danger alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Oops !</strong> Your username or password are false.
</div>
";
} 
}

?>

<input name="login" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Login">
                                    
<div class="register-link m-t-15 text-center">

<p>Don't have account ? <a href="/admin/register.php"> Sign Up Here</a></p>

</div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 <!-- End Page Content -->
</div>
<!-- End Container fluid  -->
<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/foot.php');  ?>
