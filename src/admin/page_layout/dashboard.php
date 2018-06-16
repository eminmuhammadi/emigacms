<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/edit/db_con.php');  ?>
<?php
$category_sql="SELECT * from category";
$categories=mysqli_query($connect, $category_sql);
if (mysqli_num_rows($categories) > 0) {
while($row = mysqli_fetch_array($categories)){
$count_category = mysqli_num_rows($categories);
}// end of posts grid  (while)
}// end (if)
else {
$count_category="0";
}
?>
<?php
$post_sql="SELECT * from post";
$posts=mysqli_query($connect, $post_sql);
if (mysqli_num_rows($posts) > 0) {
while($row = mysqli_fetch_array($posts)){
$count_post = mysqli_num_rows($posts);
}// end of posts grid  (while)
}// end (if)
else {
$count_post="0";
}
?>
<?php
$most_viewed_sql="SELECT COALESCE(sum(view), 0) AS totalcount FROM `post` WHERE DATE(date_view) = CURDATE()";
$most_viewed=mysqli_query($connect, $most_viewed_sql);
if (mysqli_num_rows($most_viewed) > 0) {
while($row = mysqli_fetch_array($most_viewed)){
$view=$row["totalcount"]; 
}// end of posts grid  (while)
}// end (if)
else {
$view="0";
}
?>
<?php
$users_sql="SELECT * from users";
$users=mysqli_query($connect, $users_sql);
if (mysqli_num_rows($users) > 0) {
while($row = mysqli_fetch_array($users)){
$count_users = mysqli_num_rows($users);
}// end of posts grid  (while)
}// end (if)
else {
$count_users="0";
}
?>
<div class="row">
<div class="col-md-3">
<div class="card p-30">
<div class="media">
<div class="media-left meida media-middle">
<span><i class="fa fa-sort f-s-40 color-primary"></i></span>
</div>
<div class="media-body media-text-right">
<h2><?php echo $count_category;?></h2>
<p class="m-b-0">Total Category</p>
</div>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card p-30">
<div class="media">
<div class="media-left meida media-middle">
<span><i class="fa fa-edit f-s-40 color-success"></i></span>
</div>
<div class="media-body media-text-right">
<h2><?php echo $count_post;?></h2>
<p class="m-b-0">Total Post</p>
</div>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card p-30">
<div class="media">
<div class="media-left meida media-middle">
<span><i class="fa fa-eye f-s-40 color-warning"></i></span>
</div>
<div class="media-body media-text-right">
<h2><?php echo $view;?></h2>
<p class="m-b-0"><span style="color:white;font-weight: 900;" class="badge badge-danger">HIT TODAY</span></b></p>
</div>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card p-30">
<div class="media">
<div class="media-left meida media-middle">
<span><i class="fa fa-user f-s-40 color-danger"></i></span>
</div>
<div class="media-body media-text-right">
<h2><?php echo $count_users;?></h2>
<p class="m-b-0">Editors</p>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="card">
<div class="year-calendar"></div>
</div>
<!-- /# card -->
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Popular Posts</h4>
                            </div>
                            <div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover ">
										<thead>
											<tr>
												<th>Post Title</th>
												<th>Views</th>
												<th>Published Date</th>
											</tr>
										</thead>
										<tbody>
<?php
$most_viewed_sql="SELECT * FROM `post` ORDER BY `view` DESC LIMIT 6";
$most_viewed=mysqli_query($connect, $most_viewed_sql);
if (mysqli_num_rows($most_viewed) > 0) {
while($row = mysqli_fetch_array($most_viewed)){       
$most_post_title=$row["post_title"];
$most_post_url=$row["post_url"];
$most_post_view=$row["view"];
$most_date=$row["date"];
$most_post_title=substr($most_post_title,0,30);
echo "
<tr>
<td>$most_post_title</td>
<td>$most_post_view</td>
<td>$most_date</td>
</tr>
 ";  
}// end of posts grid  (while)
}// end (if)
else {
echo "
<tr>
<td><b>Nothing found</b></td>
<td><td>
<td><td>
</tr>
";
}
?>											

										</tbody>
									</table>
								</div>
							</div>
                        </div>
                    </div>
				</div>
