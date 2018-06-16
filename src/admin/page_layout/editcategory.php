<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>
<?php

$id = $_GET['id'];
$find_category ="SELECT * FROM category WHERE id='$id' ";  
$result = mysqli_query($connect, $find_category);  
//==================================================//
if(mysqli_num_rows($result) > 0)  
{  
while($row = mysqli_fetch_array($result))  
{	
$category_name=$row["category_name"];
$date=$row["reg_date"];
}
}
else {echo "<h1 align=\"center\"><b>Error 404</b> our monkeys did not found anything.</h1>";}
	  
if(isset($_POST["delete_category"]))  
{       

$delete_category ="DELETE FROM category WHERE id='$id' ";  
if(mysqli_query($connect, $delete_category))  {  

echo "
<script>
window.location.replace(\"/admin/allcategory.php\");
</script>";
}
}


if(isset($_POST["edit_category"]))  
{ 

$after_category_name=mysqli_real_escape_string($connect, $_POST["category_name"]);
$update_category = "UPDATE category SET category_name='$after_category_name' WHERE id='$id'  "; 

if(mysqli_query($connect, $update_category))  {  
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successful edited</strong>
</div>
<script>
      setTimeout(\"location.href = '/admin/editcategory/$id';\",1500);
</script>
";


}

}
?>










<div class="card card-outline-info">
<div class="card-body">

<form name="submit_form" method="post" class="form-horizontal">
<div class="form-body">


<!-- First Step Post Information-->
<div class="card-header">
<h4 class="m-b-0 text-white"><i class="fa fa-chevron-circle-right"></i>  Edit Category</h4>
</div>

<hr class="m-t-0 m-b-40">
<div class="row">
<div class="col-md-12">

<!-- Spans-->

<div class="col-md-12">

<div class="form-group row">
<label class="control-label text-right col-md-3">Category Name *</label>
<div class="col-md-9">
<input value="<?php echo"$category_name" ;?>" type="text" name="category_name" class="form-control" autocomplete="off" required />  
</div>
</div>
<!--/span-->





</div>
</div>
<!--/span-->
</div>
<div class="button-list pull-right">
<input onclick="EditAlert();" type="submit" class="btn btn-success" name="edit_category" value="Submit"/> 
<input onclick="DeleteAlert();" type="submit" class="btn btn-danger" name="delete_category" value="Delete"/>
</div>        

</div>
</div>

<div class="col-md-6"> </div>


</form>
</div>
</div>
</div>
</div>
