<?php  
if(mysqli_num_rows($result) > 0)  
{  
$new_view=$view+1;	
$update_view_sql="UPDATE post SET view='$new_view' WHERE post_id='$post_id'  ";
$update_view=mysqli_query($connect, $update_view_sql);

// Title
echo '
<h1 class="mt-4">'.$post_title.' <a  class="badge badge-primary" href="/category?query='.$category.'">'.$category.'</a></h1>';
// Author
echo '<p class="lead"> by <b>'.$publisher.'</b></p>';
// Time Lang & Tags
echo '<p> <span class="badge badge-light"><i class="fa fa-clock-o" aria-hidden="true"></i>
'.$date.' </span> <span class="badge badge-light"><i class="fa fa-eye" aria-hidden="true"></i>
'.$new_view.' </span> <span class="badge badge-light"><i class="fa fa-globe" aria-hidden="true"></i>
 '.$lang.' </span> <span class="badge badge-light"><i class="fa fa-tags" aria-hidden="true"></i>
'.substr($keyword,0,30).'</span> </p>';

//Add To Any
echo "
<div style=\"align:center\" class=\"a2a_kit a2a_kit_size_32 a2a_default_style\">
<a class=\"a2a_dd\" href=\"https://www.addtoany.com/share\"></a>
<a class=\"a2a_button_facebook\"></a>
<a class=\"a2a_button_twitter\"></a>
<a class=\"a2a_button_linkedin\"></a>
<a class=\"a2a_button_whatsapp\"></a>
<a class=\"a2a_button_email\"></a>
<a class=\"a2a_button_vk\"></a>
</div>
<script>
var a2a_config = a2a_config || {};
a2a_config.linkname = \"$post_title - [ $description ]  ->\";
a2a_config.linkurl = \"$url\";
</script>
<script async src=\"https://static.addtoany.com/menu/page.js\"></script></br>";

// Image
echo "<img class=\"img-fluid rounded center\" src=\"$post_image\" alt=\"$post_title\" height=\"300\" width=\"900\"><hr>";

// Data
echo $post_text; 
$base_url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if($allowComment=="1"){
echo "
<div class=\"col-sm-12\">
<div id=\"disqus_thread\"></div>
</div>
<script>
var disqus_config = function () {
this.page.url = $base_url;
this.page.identifier = $post_id;
};
(function() { 
var d = document, s = d.createElement('script');
s.src = 'https://$disquis_url/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the comments.</a></noscript>
";
}
echo "</div>";
}                 
else  
{  


echo "</br><h1 class\"mt-4 center\">Error <b>404</b> Page not found</h1></div>";



}

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/sidebar.php");

?> 
