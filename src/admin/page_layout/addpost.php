<?php  
 require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php'); 
 if(isset($_POST["submit_btn"]))  
 {       
$chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$chrRepeatMin = 1; // Minimum times to repeat the seed string
$chrRepeatMax = 10; // Maximum times to repeat the seed string
$chrRandomLength = 10;
$nodublicate=substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))),1,$chrRandomLength);

$target_dir=realpath($_SERVER["DOCUMENT_ROOT"]) . '/uploads/' . $nodublicate . '_';
$target_file = $target_dir . basename($_FILES["post_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["post_image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["post_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file)) {
  echo "
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Image has been successfully uploaded</strong>
</div>
  ";     

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

      //===============Post Detail============================//
      $post_title = mysqli_real_escape_string($connect, $_POST["post_title"]);  
      $post_text = mysqli_real_escape_string($connect, $_POST["post_text"]); 
      //================Post Image============================//
      $url_image=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
      $post_image_link=$url_image . '/uploads/'.$nodublicate.'_'. basename($_FILES["post_image"]["name"]);
        $post_image_width="640";
        $post_image_height="320";
      //=================Post Meta============================//
      $description = mysqli_real_escape_string($connect, $_POST["description"]);   
      $keyword = mysqli_real_escape_string($connect, $_POST["keyword"]);
      $lang = mysqli_real_escape_string($connect, $_POST["lang"]);
      $category = mysqli_real_escape_string($connect, $_POST["category"]);
      $publisher =$_SESSION['first_name']." ".$_SESSION['last_name'];
      //==================Form SQL============================//
      $sql = "INSERT INTO post (
      post_title,
      post_text,
      post_url , 
      post_image , 
      post_image_width , 
      post_image_height , 
      description , 
      keyword , 
      lang , 
      category , 
      publisher) 
      VALUES (
      '".$post_title."',
      '".$post_text."', 
      '".php_slug($post_title)."' , 
      '".$post_image_link."' , 
      '".$post_image_width."', 
      '".$post_image_height."',
      '".$description."' , 
      '".$keyword."' , 
      '".$lang."' ,
      '".$category."' ,
      '".$publisher."' )"; 



//================Go To Page==================================//
if(mysqli_query($connect, $sql))  {  
 

$visit=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].'/post/'.php_slug($post_title);
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successful </strong><a style=\"color:white;\" href=\"$visit\">$visit</a>
</div>
";


}  
 } //end buton post  
//================Optmize Url like SEO======================//
 function php_slug($string)  
 {  $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));return $slug; }  

?>

<div class="card card-outline-info">
<div class="card-body">

<form 
action="" name="submit_form" 
method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-body">


<!-- First Step Post Information-->
<div class="card-header">
<h4 class="m-b-0 text-white"><i class="fa fa-chevron-circle-right"></i>  Post Information</h4>
</div>

<hr class="m-t-0 m-b-40">
<div class="row">
<div class="col-md-12">

<!-- Spans-->

<div class="col-md-12">

<div class="form-group row">
<label class="control-label text-right col-md-3">Post Title *</label>
<div class="col-md-9">
<input type="text" name="post_title" class="form-control" autocomplete="off" required />  
</div>
</div>



<div class="form-group row">
<label class="control-label text-right col-md-3">Post Image *</label>
<div class="col-md-9">
<input type="file" name="post_image" id="post_image" class="form-control" required/>
</div>
</div>

<div class="col-md-12">
<div class="form-group row">
<textarea  id="mytextarea" name="post_text" class="form-control">
  
</textarea>
</div>
</div>


<!-- Second Step Post SEO-->
<div class="card-header">
<h4 class="m-b-0 text-white"><i class="fa fa-chevron-circle-right"></i>  SEO Information</h4>
</div>

<hr class="m-t-0 m-b-40">

<div class="form-group row">
<label class="control-label text-right col-md-3">Post Description</label>
<div class="col-md-9">
<input type="text" name="description" class="form-control" autocomplete="off" />  
</div>
</div>

<div class="form-group row">
<label class="control-label text-right col-md-3">Post Keywords</label>
<div class="col-md-9">
<input type="text" name="keyword" class="form-control" autocomplete="off" />  
</div>
</div>


<div class="row p-t-20">
<div class="col-md-6">
<div class="form-group">
<label class="control-label">Language</label>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/selection.php');  ?>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label class="control-label">Category</label>
<select class="form-control" name="category">
<?php
$find_category ="SELECT * FROM category";  
$result_find = mysqli_query($connect, $find_category);  
//==================================================//

if(mysqli_num_rows($result_find) > 0)  
{  
while($row = mysqli_fetch_array($result_find))  
{ 
$category_name=$row["category_name"];
echo "
<option>$category_name</option>
";
}
}  
else 
{
}  
?>                                        
</select>
</div>
</div>
</div>
</div>
<!--/span-->





</div>
</div>
<!--/span-->
</div>

</br>
</br>

<input type="submit" class="pull-right btn btn-success" name="submit_btn" value="Submit"/>                                            
</div>
</div>

<div class="col-md-6"> </div>


</form>
</div>
</div>
</div>
</div>
