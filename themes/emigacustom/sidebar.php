<style type="text/css">
 .bottom-left {
    position: absolute;
    bottom: 7px;
    left: 10px;    
}
.filter-sidebar-img{
    filter:blur(0.7px);
}
.sidebar-title {
  background: black; 
  opacity:0.8;
  padding: 5px;
}
.txt-white {
  color:#ffffff;
  font-weight: 450;
  font-size:15px;
  text-decoration: none

}
a{
    text-decoration: none;
}     
</style>

      <!-- Sidebar Widgets Column -->
        <div class="col-12 col-md-4">
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group mb-3">
               <input type="text" id="search" class="form-control" placeholder="Search for ...">
              <div class="input-group-append">
                <script type="text/javascript">
                  function search() {
                  var query = document.getElementById('search').value;
                  if (query == "") {
                  alert("Oops nothing found to search");
                  return false;
                  }
                  else{
                  location.href = '/search?query='+ query;
                  return false;
                  }
                }
                </script>

              <button onclick="search()" class="btn btn-secondary" type="button">Search</button>
              </div>
              </div>

              </div>
            </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Popular Posts</h5>
            <div class="card-body row">
<?php
$most_viewed_sql="SELECT * FROM `post` ORDER BY `view` DESC LIMIT 4";
$most_viewed=mysqli_query($connect, $most_viewed_sql);
if (mysqli_num_rows($most_viewed) > 0) {
while($row = mysqli_fetch_array($most_viewed)){       
$most_post_title=$row["post_title"];
$most_post_url=$row["post_url"];
$most_post_image=$row["post_image"];
$most_category=$row["category"];
$most_post_title=substr($most_post_title,0,30);
echo "
<div class=\"col-6\">
<div class=\"card text-white shadow-sm\">
<img class=\"img-thumbnail rounded filter-sidebar-img\" src=\"$most_post_image\"  height=\"100\" width=\"500\"alt=\"$most_post_title\">
<div class=\"bottom-left shadow-sm sidebar-title\">
<a href=\"/post/$most_post_url\"><h4 class=\"txt-white\">$most_post_title</h4></a>
</div>
</div>
</div>
</br>
 ";  
}// end of posts grid  (while)
}// end (if)
else {
echo "
<b>Nothing found</b>";
}
?>
</div>
</div>

          <!-- Categories Widget -->
          <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
<ul class="list-group list-group-flush">
<?php
$category_sql="SELECT * from category";
$categories=mysqli_query($connect, $category_sql);
if (mysqli_num_rows($categories) > 0) {
while($row = mysqli_fetch_array($categories)){
//==========================Variables=============================//
$category_name=$row['category_name'];
//===============================================================//
$find_category_count = mysqli_query($connect, "SELECT * FROM post WHERE category='$category_name'");
$count = mysqli_num_rows($find_category_count);
echo"
  <li class=\"list-group-item d-flex justify-content-between align-items-center\">
    <a href=\"/category?query=$category_name\">$category_name</a>
    <span class=\"badge badge-primary badge-pill\">$count</span>
  </li>
";
}// end of posts grid  (while)
}// end (if)
else {
echo "
<b>Nothing found</b>";
}
?>
</ul>
</div>
</div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->              
