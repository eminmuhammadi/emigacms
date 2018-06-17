            <section class="banner-area relative" id="home">    
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content col-lg-12">
                            <h1 class="text-white">
                                <?php echo "$post_title";?>  <small>by </small><?php echo "$publisher";?>               
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
if(mysqli_num_rows($result) > 0)  
{  
$new_view=$view+1;  
$update_view_sql="UPDATE post SET view='$new_view' WHERE post_id='$post_id'  ";
$update_view=mysqli_query($connect, $update_view_sql);
$mini_keyword=substr($keyword,0,30);
echo "
<div class=\"single-post\">
<img class=\"img-fluid\" src=\"$post_image\" alt=\"$post_title\">
<ul class=\"tags\">
 <li><a  class=\"\" href=\"/category?query=$category\"><h4>$category</h4></a></li>
</ul>
                                <a href=\"$post_url\">
                                        <h1>
                                        $post_title 
                                        </h1> 
                                </a>
                                        <p>by <b>$publisher</b></p>

<p><span class=\"badge badge-light\"> <i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> $date</span>
 <span class=\"badge badge-light\"> <i class=\"fa fa-eye\" aria-hidden=\"true\"></i> $new_view</span> 
 <span class=\"badge badge-light\"> <i class=\"fa fa-globe\" aria-hidden=\"true\"></i> $lang</span> 
 <span class=\"badge badge-light\"> <i class=\"fa fa-tags\" aria-hidden=\"true\"></i> $mini_keyword</span>
</p>
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
<script async src=\"https://static.addtoany.com/menu/page.js\"></script></br>

<div class=\"content-wrap\">
$post_text
</div>
                            <section class=\"comment-sec-area pt-80 pb-80\">
                                <div class=\"container\">
                                    <div class=\"row flex-column\">
";
$base_url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
if($allowComment=="1"){
echo"
<div id=\"disqus_thread\"></div>
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
";}
}
else {
echo"404 not found"; 
}

?>                                                                                                 
                                    </div>
                                </div>    
                            </section>
                            <!-- End comment-sec Area -->
   
                            
  


                            </div>

                                                                    
<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/sidebar.php");

?> 
                            