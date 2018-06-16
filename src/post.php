<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');
//==================================================//
 $post_url = $_GET["post_url"]; 
 $sql = "SELECT * FROM post WHERE post_url = '".$post_url."'";  
 $result = mysqli_query($connect, $sql);  
//==================================================//
if(mysqli_num_rows($result) > 0)  
{  
while($row = mysqli_fetch_array($result))  
{	
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/controller/cache_start.php'); 
$post_id=$row["post_id"];	
$post_title=$row["post_title"];
$post_text=$row["post_text"];
$post_image=$row["post_image"];
$post_image_width=$row["post_image_width"];
$post_image_height=$row["post_image_height"];
$description=$row["description"];
$keyword=$row["keyword"];
$lang=$row["lang"];
$category=$row["category"];
$publisher=$row["publisher"];
$date=$row["date"];
$view=$row["view"];
}
}
else 
{
$post_title="Error 404";
$post_image="";
$post_image_width="";
$post_image_height="";
$description="";
$keyword="";
$lang="";
$category="";
$publisher="";
$date="";
}	
?>  
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/head.php"); ?>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/post_article.php"); ?>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/foot.php"); ?>