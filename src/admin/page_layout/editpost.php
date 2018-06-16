<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>
<?php
$post_id = $_GET['post_id'];
$find_post ="SELECT * FROM post WHERE post_id='$post_id' ";  
$result = mysqli_query($connect, $find_post);  
//==================================================//

if(mysqli_num_rows($result) > 0)  
{  
while($row = mysqli_fetch_array($result))  
{	
$post_title=$row["post_title"];
$post_text=$row["post_text"];
$post_image=$row["post_image"];
$post_image_width=$row["post_image_width"];
$post_image_height=$row["post_image_height"];
$post_url=$row["post_url"];
$post_fullurl=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/post/'. $post_url;
$description=$row["description"];
$keyword=$row["keyword"];
$lang=$row["lang"];
$category=$row["category"];
$publisher=$row["publisher"];
$date=$row["date"];
}
}
else {echo "<h1 align=\"center\"><b>Error 404</b> our monkeys did not found anything.</h1>";}
	  
?>

<?php

if(isset($_POST["delete_post"]))  
{       

$delete_post ="DELETE FROM post WHERE post_id='$post_id' ";  
$result = mysqli_query($connect, $delete_post);

echo "
<script>
window.location.replace(\"/admin/allpost.php\");
</script>";

} 


if(isset($_POST["submit_image"]))  
 {       
$chrList = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$chrRepeatMin = 3; // Minimum times to repeat the seed string
$chrRepeatMax = 9; // Maximum times to repeat the seed string
$chrRandomLength = 16;
$norepeat=substr(str_shuffle(str_repeat($chrList, mt_rand($chrRepeatMin,$chrRepeatMax))),1,$chrRandomLength);
$nodublicate=md5(sha1($norepeat)).'-'.sha1(md5($norepeat));
$target_dir=realpath($_SERVER["DOCUMENT_ROOT"]) . '/uploads/' . $nodublicate . '-';
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

    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$url_image=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
$a_post_image=$url_image . '/uploads/'.$nodublicate.'-'. basename($_FILES["post_image"]["name"]);
$change_image = "UPDATE post SET post_image='".$a_post_image."'  WHERE post_id='".$post_id."'  "; 
$view_image_link=$url_image . '/post/'.$post_title;
if(mysqli_query($connect, $change_image))  {  
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successfully Image Changed</strong>
</div>

<script>
      setTimeout(\"location.href = '/admin/editpost/$post_id';\",1000);
</script>
";
} 
}

if(isset($_POST["submit_btn"]))  
 {       

      //===============Post Detail============================//
      $after_post_title = mysqli_real_escape_string($connect, $_POST["post_title"]);  
      $after_post_text = mysqli_real_escape_string($connect, $_POST["post_text"]); 
      //================Post Image============================//
      $url_image=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $after_post_image_width="640";
        $after_post_image_height="320";
      //=================Post Meta============================//
      $after_description = mysqli_real_escape_string($connect, $_POST["description"]);   
      $after_keyword = mysqli_real_escape_string($connect, $_POST["keyword"]);
      $after_lang = mysqli_real_escape_string($connect, $_POST["lang"]);
      $after_category = mysqli_real_escape_string($connect, $_POST["category"]);
      $after_publisher =$_SESSION['first_name']." ".$_SESSION['last_name'];
      //==================Form SQL============================//
      $sql = "UPDATE post SET

      post_title='".$after_post_title."',
      post_text='".$after_post_text."',
      post_url='".php_slug($after_post_title)."', 
      description='".$after_description."', 
      keyword='".$after_keyword."', 
      lang='".$after_lang."', 
      category='".$after_category."', 
      publisher='".$after_publisher."' 

      WHERE post_id='".$post_id."'
      "; 



//================Go To Page==================================//
if(mysqli_query($connect, $sql))  {  
 

$visit=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].'/post/'.php_slug($after_post_title);
echo"
<div class=\"alert alert-primary alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Successfully Edited  </strong>
</div>

<script>
      setTimeout(\"location.href = '/admin/editpost/$post_id';\",1500);
</script>
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
<input value="<?php echo $post_title ; ?>" type="text" name="post_title" class="form-control" autocomplete="off" required />  
</div>
</div>



<div class="form-group row">
<label class="control-label text-right col-md-3"><img src="<?php echo $post_image ; ?>" height="64" width="64" align="center" style="text-align:center;" /></label>
<div class="col-md-9">
<input value="<?php echo $post_image ; ?>" type="file" name="post_image" id="post_image" class="form-control"/>

<input type="submit" class="btn btn-danger btn-flat m-b-10 form-control" name="submit_image" value="Submit Image"/>                                            

</div>
</div>

<div class="col-md-12">
<div class="form-group row">
<textarea  id="mytextarea" name="post_text" class="form-control">
<?php echo "$post_text";?>  
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
<input value="<?php echo $description ; ?>" type="text" name="description" class="form-control" autocomplete="off" />  
</div>
</div>

<div class="form-group row">
<label class="control-label text-right col-md-3">Post Keywords</label>
<div class="col-md-9">
<input value="<?php echo $keyword ; ?>" type="text" name="keyword" class="form-control" autocomplete="off" />  
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
<select id="category" class="form-control" name="category">
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
echo "<option>Untitled</option>"; 
}  
?>                                        
</select>
<script type="text/javascript">
    document.getElementById("category").value = "<?php echo"$category";?>";
</script>
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

<div class="button-list pull-right">
<input type="submit" class="btn btn-success" name="submit_btn" value="Submit"/>       
<input onclick="DeleteAlert();"type="submit" class="btn btn-danger" name="delete_post" value="Delete"/>
</div>

</div>
</div>

<div class="col-md-6"> </div>


</form>
</div>
</div>
</div>
</div>




