<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>

<?php

$id = $_SESSION['id'];
$find_users ="SELECT * FROM users WHERE id='$id' ";  
$result = mysqli_query($connect, $find_users);  
//==================================================//
if(mysqli_num_rows($result) > 0)  
{  
while($row = mysqli_fetch_array($result))  
{   
$username=$row["username"];
$first_name=$row["first_name"];
$last_name=$row["last_name"];
}
}
else {echo "<h1 align=\"center\"><b>Error 404</b> our monkeys did not found anything.</h1>";}
?>
<?php
if(isset($_POST["change-info"]))  { 
$after_first_name=mysqli_real_escape_string($connect, $_POST["first_name"]);
$after_last_name=mysqli_real_escape_string($connect, $_POST["last_name"]);
$after_id=$_SESSION['id'];
$update_personal_information =" UPDATE users SET first_name='$after_first_name' , last_name='$after_last_name' WHERE id='$after_id' "; 
if(mysqli_query($connect, $update_personal_information))  {  
$refresh_info="SELECT * from users WHERE id='$after_id' ";
$refresh = mysqli_query($connect, $refresh_info); 
if(mysqli_num_rows($refresh) > 0)  
{  
while($row = mysqli_fetch_array($refresh))  
{	
$user_id=$row["id"];
$username=$row["username"];
$first_name=$row["first_name"];
$last_name=$row["last_name"];

$_SESSION['id']=$user_id;
$_SESSION['username']=$username;
$_SESSION['first_name']=$first_name;
$_SESSION['last_name']=$last_name;


echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successful changed</strong>
</div>
<script>
      setTimeout(\"location.href = '/admin/editprofile/$username';\",1500);
</script>
";
exit;
}
}
}
}
if(isset($_POST["change-username"]))  
{ 

$after_username=mysqli_real_escape_string($connect, $_POST["username"]);
$after_id=$_SESSION['id'];
$update_username =" UPDATE users SET username='$after_username' WHERE id='$after_id' "; 

if(mysqli_query($connect, $update_username))  { 
$refresh_info="SELECT * from users WHERE id='$after_id' ";
$refresh = mysqli_query($connect, $refresh_info); 
if(mysqli_num_rows($refresh) > 0)  
{  
while($row = mysqli_fetch_array($refresh))  
{	
$user_id=$row["id"];
$username=$row["username"];
$first_name=$row["first_name"];
$last_name=$row["last_name"];

$_SESSION['id']=$user_id;
$_SESSION['username']=$username;
$_SESSION['first_name']=$first_name;
$_SESSION['last_name']=$last_name;
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successful changed</strong>
</div>
<script>
      setTimeout(\"location.href = '/admin/editprofile/$username';\",1500);
</script>
";
exit;
}
}
}
}


if(isset($_POST["change-password"]))  
{ 

$after_password=mysqli_real_escape_string($connect, $_POST["password"]);
$after_password=md5($after_password);
$after_id=$_SESSION['id'];
$update_password =" UPDATE users SET password='$after_password' WHERE id='$after_id' "; 
$_SESSION["username"]=$username;
if(mysqli_query($connect, $update_password))  {  
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successful changed</strong>
</div>
<script>
      setTimeout(\"location.href = '/admin/editprofile/$username';\",1500);
</script>
";


}
}

if(isset($_POST["delete-profile"]))  
{ 
$after_id=$_SESSION['id'];	
$delete_profile ="DELETE FROM users WHERE id='$after_id' "; 

if(mysqli_query($connect, $delete_profile))  {  
unset($_SESSION["logged"]);

echo "
<script type=\"text/javascript\">

window.location.href =\"$url/admin/login.php\"

</script>
";

}
}



?>
<div class="vtabs">
<ul class="nav nav-tabs tabs-vertical" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#personal-information" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Change your personal Information</span></a></li>
                                            
<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#change-username" role="tab"><span class="hidden-sm-up"><i class="ti-write"></i></span> <span class="hidden-xs-down">Change your username</span></a></li>

<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#change-password" role="tab"><span class="hidden-sm-up"><i class="ti-lock"></i></span> <span class="hidden-xs-down">Change your password</span></a></li>   

<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#delete-profile" role="tab"><span class="hidden-sm-up"><i class="ti-trash"></i></span> <span class="hidden-xs-down">Delete your profile permantly</span></a></li>                     
</ul>
                                    
<!-- Tab panes -->
                                        
<div class="tab-content">
                                           
<div class="tab-pane p-20 active" id="personal-information" role="tabpanel">
<form action="/admin/editprofile/<?php echo $_SESSION['id'] ;?>" class="form" method="post" >
<div class="form-group row">
<label class="control-label text-right col-md-3">First Name</label>
<div class="col-md-9">
<input focus autocomplete="Off" value="<?php echo $first_name ; ?>" name="first_name" type="text" class="form-control" required>
<small class="form-control-feedback"></br></small> 
</div>

<label class="control-label text-right col-md-3">Last Name</label>
<div class="col-md-9">
<input autocomplete="Off" value="<?php echo $last_name ; ?>" name="last_name" type="text" class="form-control" required> 
<small class="form-control-feedback"></br></small> 

</div>
</div>
 

<div class="form-actions pull-right">
<div class="row">
<div class="btn-group col-md-offset-3 col-md-9">
<input name="change-info" type="submit" class="btn btn-success" value="Change">

</div>
</div>
</div>
</form>
</div>




<div class="tab-pane p-20" id="change-username" role="tabpanel">
<form action="/admin/editprofile/<?php echo $_SESSION['username'] ;?>" class="form" method="post">
<div class="form-group row">
<label class="control-label text-right col-md-3">Username</label>
<div class="col-md-9">
<input autocomplete="Off" focus value="<?php echo $username ;?>" name="username" type="text" class="form-control" required>
<small class="form-control-feedback"></br></small> 
</div>
 </div>


<div class="form-actions pull-right">
<div class="row">
<div class="btn-group col-md-offset-3 col-md-9">
<input name="change-username" type="submit" class="btn btn-success" value="Change">

</div>
</div>
</div>

</form>
</div>




<div class="tab-pane p-20" id="change-password" role="tabpanel">
<form action="/admin/editprofile/<?php echo $_SESSION['username'] ;?>" class="form" method="post">
<div class="form-group row">
<label class="control-label text-right col-md-3">Password</label>
<div class="col-md-9">
<input autocomplete="Off" focus name="password" type="password" class="form-control" required>
<small class="form-control-feedback"></br></small> 
</div>
 </div>


<div class="form-actions pull-right">
<div class="row">
<div class="btn-group col-md-offset-3 col-md-9">
<input name="change-password" type="submit" class="btn btn-success" value="Change">

</div>
</div>
</div>

</form>
</div>


<div class="tab-pane p-20" id="delete-profile" role="tabpanel">
<form action="/admin/editprofile/<?php echo $_SESSION['username'] ;?>" class="form" method="post">

<div class="form-actions pull-right">
<div class="row">
<div class="btn-group col-md-offset-3 col-md-9">
<input onClick="return confirm('Do you want to delete this profile permantly ?')" name="delete-profile" type="submit" class="btn btn-danger" value="Delete my profile permantly">

</div>
</div>
</div>

</form>
</div>





                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>







