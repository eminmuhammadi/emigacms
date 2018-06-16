<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>
<?php


$find_posts ="SELECT * FROM post ORDER BY post_id DESC";  
$result = mysqli_query($connect, $find_posts);  
//==================================================//
?>
<div class="card">
<div class="card-body">
<h4 class="card-title"><?php echo "$title";?></h4>
<div class="table-responsive m-t-40">
<table id="myTable" class="table table-bordered table-striped">

<thead>
<tr>
<th>Post Image</th>
<th>Post Title</th>
<th>Description</th>
<th>Category</th>
<th>Publisher</th>
<th>Date</th>
<th></th>
</tr>
</thead>

<tbody>
<?php
if(mysqli_num_rows($result) > 0)  
{  
while($row = mysqli_fetch_array($result))  
{	
$post_id=$row["post_id"];
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

echo "
<tr>
<td><a href=\"$post_fullurl\"><img src=\"$post_image\" width=\"64\" height=\"64\" align=\"center\" style=\"margin:0 auto;\"></a></td>
<td><b><a href=\"$post_fullurl\">$post_title</a></b></td>
<td>$description</td>
<td>$category</td>
<td>$publisher</td>
<td>$date</td>
<td>
<button 
onclick=\"location.href='/admin/editpost/$post_id';\"
type=\"button\" class=\"btn btn-success btn-flat btn-addon m-b-10 m-l-5\">
Edit Post</button>
</td>

</tr> 
";


}
}
//===============================Else Danger=============================//
else {
echo"
<div class=\"alert alert-danger alert-dismissible fade show\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
<strong>Oops!</strong> No posts available in here. Write your first post <a href=\"/admin/addpost.php\">here</a>
</div>
";	
}
?>
</tbody>

</table>
</div>
</div>
</div>
