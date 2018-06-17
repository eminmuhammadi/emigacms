      <!-- start banner Area -->
      <section class="banner-area relative" id="home">  
        <div class="overlay overlay-bg"></div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Blog       
              </h1> 
            </div>                      
          </div>
        </div>
      </section>
      <!-- Start blog-posts Area -->
      <section class="blog-posts-area section-gap">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 post-list blog-post-list">

<?php
        if (isset($_GET['page'])) {
        $searchq = $_GET['query'];
        $page = $_GET['page'];
        $posts_url=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $searchq=preg_replace("#[^0-9a-z]#i", "", $searchq);
        $no_of_records_search_per_page = 4;
        $offset_search = ($page-1) * $no_of_records_search_per_page;
        $total_pages_search_sql = "SELECT COUNT(*) FROM post WHERE category='$searchq' ";
        $result = mysqli_query($connect,$total_pages_search_sql);
        $total_search_rows = mysqli_fetch_array($result)[0];
        $total_search_pages = ceil($total_search_rows / $no_of_records_search_per_page);
        } 
        
        else {
        $searchq = $_GET['query'];
        $posts_url=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        $searchq=preg_replace("#[^0-9a-z]#i", "", $searchq);
        $total_pages_search_sql = "SELECT COUNT(*) FROM post WHERE category='$searchq' ";
        $result = mysqli_query($connect,$total_pages_search_sql);
        $total_search_rows = mysqli_fetch_array($result)[0];
        $no_of_records_search_per_page = 4;
        $total_search_pages = ceil($total_search_rows / $no_of_records_search_per_page);
        $page = $total_search_pages;
        $offset_search = ($page-1) * $no_of_records_search_per_page;
        }
  $search_sql="SELECT * FROM post WHERE category='$searchq' LIMIT $offset_search, $no_of_records_search_per_page ";
  $search_query=mysqli_query($connect, $search_sql);
  if (mysqli_num_rows($search_query) > "0") {
  while($row = mysqli_fetch_array($search_query)){  
//==========================Variables=============================//
$posts_title=$row['post_title'];
$posts_image=$row['post_image'];
$posts_text= strip_tags($row['post_text']);
$posts_text=substr($posts_text,0,200);
$posts_text=$posts_text.'...';
$posts_keyword=$row['keyword'];
$posts_url=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
$posts_href=$posts_url."/post/".$row['post_url'];
$publisher=$row['publisher'];
$date=$row['date'];
$description=$row['description'];
$category=$row['category'];
//===============================================================//
echo"
              <div class=\"single-post\">
                <img class=\"img-fluid\" style=\"max-height:300px;\" src=\"$posts_image\" alt=\"$posts_title\">
                <a href=\"$posts_href\">
                  <h1>$posts_title</h1>
                </a>
                  <p>
                    $posts_text
                  </p>
                <div class=\"bottom-meta\">
                  <div class=\"user-details row align-items-center\">
                    <div class=\"comment-wrap col-lg-6\">
                      <ul>
                        <li><span class=\"lnr lnr-inbox\"></span><a href=\"/category?query=$category\"> $category</a></li>
                      </ul>
                    </div>
                    <div class=\"social-wrap col-lg-6\">
                      <ul>
                        <li><span class=\"lnr lnr-user\"></span> $publisher</li>
                        <li><span class=\"lnr lnr-tag\"></span> $posts_keyword</li>
                      </ul>
                      
                    </div>
                  </div>
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
          <ul class="pagination justify-content-center mb-4"
          <?php
          if($total_pages=="0"){
            echo "style=\"display:none;\"";
          }?>>
            <?php 
            $minus_page=$page - 1;
            $plus_page=$page + 1;
            if($page <= 1){ 
            echo "
            <li class=\"page-item disabled\">
              <a class=\"page-link\" href=\"#\">&larr; Older</a>
            </li>";}
            else{
            echo "
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"/posts/$minus_page\">&larr; Older</a>
            </li>";}
            if($page >= $total_pages){ 
            echo "
            <li class=\"page-item disabled\">
              <a class=\"page-link\" href=\"#\">Newer &rarr;</a>
            </li>";}
            else{
            echo "
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"/posts/$plus_page\">Newer &rarr;</a>
            </li>";}
            ?>
          </ul>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/sidebar.php"); ?>   