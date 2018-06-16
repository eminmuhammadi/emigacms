<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>

<?php

 if(isset($_POST["submit_btn"]))  
{ 

$category_name=mysqli_real_escape_string($connect, $_POST["category_name"]);

$sql = "INSERT INTO category ( category_name ) VALUES ( '".$category_name."' )"; 

if(mysqli_query($connect, $sql))  {  
 
$visit="/admin/allcategory.php"; 
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successful added</strong><a style=\"color:white;\" href=\"$visit\"> in here</a>
</div>
";


}

}//end button submit-btn
?>


<div class="card card-outline-info">
<div class="card-body">

<form name="submit_form" method="post" class="form-horizontal">
<div class="form-body">


<!-- First Step Post Information-->
<div class="card-header">
<h4 class="m-b-0 text-white"><i class="fa fa-chevron-circle-right"></i>  Add Category</h4>
</div>

<hr class="m-t-0 m-b-40">
<div class="row">
<div class="col-md-12">

<!-- Spans-->

<div class="col-md-12">

<div class="form-group row">
<label class="control-label text-right col-md-3">Category Name *</label>
<div class="col-md-9">
<input type="text" name="category_name" class="form-control" autocomplete="off" required />  
</div>
</div>
<!--/span-->





</div>
</div>
<!--/span-->
</div>
<input type="submit" class="pull-right btn btn-success" name="submit_btn" value="Submit"/>                                            
</div>
</div>

<div class="col-md-6"> </div>


</form>
</div>
</div>
</div>
</div>
