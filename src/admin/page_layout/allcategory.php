<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>
<?php


$find_posts ="SELECT * FROM category ORDER BY id DESC";  
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
<th>Category Name</th>
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
$id=$row["id"];
$category_name=$row["category_name"];
$date=$row["reg_date"];

echo "
<tr>
<td><b>$category_name</b></td>
<td>$date</td>
<td>
<button 
onclick=\"location.href='/admin/editcategory/$id';\"
type=\"button\" class=\"btn btn-success btn-flat btn-addon m-b-10 m-l-5\">
Edit Category</button>
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
<strong>Oops!</strong> No category available in here. Write your first category <a href=\"/admin/addcategory.php\">here</a>
</div>
";	
}
?>
</tbody>

</table>
</div>
</div>
</div>
