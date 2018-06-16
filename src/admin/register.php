<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php'); 
$title="Register Page " ;

if($allowRegister=="0"){
    unset($_SESSION["logged"]);
    header("Location: login.php");

}
if($allowRegister=="1") {
if(isset($_POST['register'])){
    $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
    $username = mysqli_real_escape_string($connect, $_POST["username"]); 
    $password = mysqli_real_escape_string($connect, $_POST["password"]);

    $password=md5($password);

$register="INSERT INTO users (first_name , last_name , username , password) VALUES ('".$first_name."' , '".$last_name."' , '".$username."' , '".$password."' )";


if (mysqli_query($connect, $register)){
    header("Location: login.php");     

}
}
} 
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

<form action="register.php" method="post">

<div class="form-group">
<label>First Name</label>
<input name="first_name" type="text" class="form-control" required autocomplete="Off">
</div>

<div class="form-group">
<label>Last Name</label>
<input name="last_name" type="text" class="form-control" required autocomplete="Off">
</div>

<div class="form-group">
<label>Username</label>
<input name="username" type="text" class="form-control" required autocomplete="Off">
</div>

                                    
<div class="form-group">
<label>Password</label>
<input name="password" type="password" class="form-control" required autocomplete="Off">
</div>



<input name="register" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Register">
                                    
<div class="register-link m-t-15 text-center">

<p>Don you have account ? <a href="/admin/login.php"> Sign in Here</a></p>

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
