</br>
<div class="row">
<?php
if (mysqli_num_rows($res_data) > 0) {
while($row = mysqli_fetch_array($res_data)){
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
<div class=\"card flex-md-row mb-4 box-shadow h-md-250\">
<div class=\"card-body d-flex flex-column align-items-start\">
<strong class=\"d-inline-block mb-2 text-primary\"><a  class=\"badge badge-primary\" href=\"/category?query=$category\">$category</a></strong>
<h3 class=\"mb-0\">
<a href=\"$posts_href\">$posts_title</a>
</h3>
<div class=\mb-1 text-muted\"><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> $date</div>
<p class=\"card-text mb-auto\"><small>$posts_text</small></p>
<a style=\"color:#a7aaaa;\" href=\"$posts_href\"> <i class=\"fa fa-angle-double-left\" aria-hidden=\"true\"></i> Read More</a>
</div>
<img class=\"card-img-right flex-auto d-none d-md-block\" src=\"$posts_image\" alt=\"$posts_title\" height=\"225\" width=\"250\">
</div>
";
}// end of posts grid  (while)
}// end (if)
else {
echo "
<div class=\"col-md-4\">
<b>Nothing found</b>
</div>";
}
?>
</div>
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
</div>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/sidebar.php"); ?>
</br>
   