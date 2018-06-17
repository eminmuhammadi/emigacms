</div>

<div class="col-lg-4 sidebar">
<div class="single-widget search-widget">
<div class style="margin:auto;max-width:300px">
<div class="input-group mb-3">
<input type="text" id="search" class="form-control" placeholder="Search for ..." aria-describedby="basic-addon2">
<div class="input-group-append">
<button onclick="search()" class="btn btn-primary" type="button"><i style="color:white;" class="fa fa-search"></i></button>
</div>
</div>
</div>            
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
</div>

              <div class="single-widget category-widget">
                <h4 class="title">Post Categories</h4>
                <ul>
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
<li><a href=\"/category?query=$category_name\" class=\"justify-content-between align-items-center d-flex\"><h6>$category_name</h6> <span>$count</span></a></li>
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

              <div class="single-widget recent-posts-widget">
                <h4 class="title">Popular Posts</h4>
                <div class="blog-list ">
<?php
$most_viewed_sql="SELECT * FROM `post` ORDER BY `view` DESC LIMIT 6";
$most_viewed=mysqli_query($connect, $most_viewed_sql);
if (mysqli_num_rows($most_viewed) > 0) {
while($row = mysqli_fetch_array($most_viewed)){       
$most_post_title=$row["post_title"];
$most_post_url=$row["post_url"];
$most_post_image=$row["post_image"];
$most_category=$row["category"];
$most_date=$row["date"];
$most_post_title=substr($most_post_title,0,30);
echo "
              <div class=\"single-recent-post d-flex flex-row\">
                    <div class=\"recent-thumb\">
                      <img class=\"img-fluid\" style=\"max-height:100px;max-width:100px;\" src=\"$most_post_image\" alt=\"$most_post_title\">
                    </div>
                    <div class=\"recent-details\">
                      <a href=\"/post/$most_post_url\">
                        <h4>
                        $most_post_title
                        </h4>
                      </a>
                      <p>
                        $most_date
                      </p>
                    </div>
                    </div>


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

              <div class="single-widget recent-posts-widget">
                <h4 class="title">Recent Posts</h4>
                <div class="blog-list ">
<?php
$most_viewed_sql="SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT 6";
$most_viewed=mysqli_query($connect, $most_viewed_sql);
if (mysqli_num_rows($most_viewed) > 0) {
while($row = mysqli_fetch_array($most_viewed)){       
$r_post_title=$row["post_title"];
$r_post_url=$row["post_url"];
$r_post_image=$row["post_image"];
$r_category=$row["category"];
$r_date=$row["date"];
$r_post_title=substr($r_post_title,0,30);
echo "                  
    <div class=\"single-recent-post d-flex flex-row\">
                    <div class=\"recent-thumb\">
                      <img class=\"img-fluid\" style=\"max-height:100px;max-width:100px;\" src=\"$r_post_image\" alt=\"$r_post_title\">
                    </div>
                    <div class=\"recent-details\">
                      <a href=\"/post/$r_post_url\">
                        <h4>
                        $r_post_title
                        </h4>
                      </a>
                      <p>
                        $r_date
                      </p>
                    </div>
                    </div>
                    
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
              </div>
        

            </div>
          </div>
        </div>  
      </section>
      <!-- End blog-posts Area -->