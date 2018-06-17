    <!-- start banner Area -->
      <section class="banner-area" id="home">
        <div class="container">
          <div class="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content col-lg-6 col-md-6">
              <h1>
                EmiGA CMS <br>     
              </h1>
              <p class="text-white text-uppercase">
               This theme created by using EmiGa CMS. EmiGa CMS is sophisticated, lightweight, and adaptable. This theme is a fully responsive theme that looks great on any device. Features include a front page template with its own widgets, an optional display font, styling for post formats on both index and single views, and an optional no-sidebar page template
              </p>
              <a href="#">Download at here</a>
            </div>
            <div class="banner-img col-lg-6 col-md-6">
              <img class="img-fluid" src="/theme/<?php echo $theme_name ;?>/img/dashboard.png" alt="dashboard">
            </div>                        
          </div>
        </div>
      </section>
      <!-- End banner Area -->

      <!-- Start products Area -->
      <section class="products-area section-gap">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 pb-40 header-text text-center">
              <h1 class="pb-10">Useful news and updates</h1>
            </div>
          </div>              
          <div class="row">
            
<?php
$most_viewed_sql="SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT 4";
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
          <div class=\"col-lg-3 col-md-6\">
              <div class=\"single-product\">
                <div class=\"details\">
                  <h4>$r_post_title</h4>
                  <p>$description</p>
                  <a href=\"/post/$r_post_url\" class=\"primary-btn text-uppercase\">Read</a>
                </div>
              </div>

            </div>             
";

}// end of posts grid  (while)
}// end (if)
else {
echo " ";
}
?>
                                                
          </div>
        </div>  
      </section>
      <!-- End products Area -->

      <!-- Start feature Area -->
      <section class="feature-area section-gap">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 pb-40 header-text text-center">
              <h1 class="pb-10 text-white">Our Features that Made us Unique</h1>
            </div>
          </div>              
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <a class="title d-flex flex-row">
                  <span class="lnr lnr-star"></span>
                  <h4>Simplicity</h4>
                </a>
                <p>
                 Simplicity makes it possible for you to get online and get publishing, quickly. Nothing should get in the way of you getting your website up and your content out there. EmiGA CMS is built to make that happen.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <a  class="title d-flex flex-row">
                  <span class="lnr lnr-select"></span>
                  <h4>Flexibility</h4>
                </a>
                <p>
                  With EmiGA CMS, you can create any type of website you want: a personal blog or website, a photoblog, a business website, a professional portfolio, a government website, a magazine or news website, an online community, even a network of websites.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <a  class="title d-flex flex-row">
                  <span class="lnr lnr-code"></span>
                  <h4>Publish with Ease</h4>
                </a>
                <p>
                  If you’ve ever created a document, you’re already a whizz at creating content with EmiGA CMS. You can create Posts and Pages, format them easily, insert media, and with the click of a button your content is live and on the web.
                </p>
              </div>
            </div>            
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <a  class="title d-flex flex-row">
                  <span class="lnr lnr-pencil"></span>
                  <h4>Publishing Tools</h4>
                </a>
                <p>
                  EmiGA CMS makes it easy for you to manage your content. Create drafts, schedule publication, and look at your post revisions. Make your content public or private, and secure posts and pages with a password.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <a class="title d-flex flex-row">
                  <span class="lnr lnr-cog"></span>
                  <h4>User Management</h4>
                </a>
                <p>
                  Not everyone requires the same access to your website. Administrators manage the site, editors work with content, authors and contributors write that content, and subscribers have a profile that they can manage. This lets you have a variety of contributors to your website, and let others simply be part of your community.
                </p>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="single-feature">
                <a  class="title d-flex flex-row">
                  <span class="lnr lnr-lock"></span>
                  <h4>Own Your Data</h4>
                </a>
                <p>
                  Hosted services come and go. If you’ve ever used a service that disappeared, you know how traumatic that can be. If you’ve ever seen adverts appear on your website, you’ve probably been pretty annoyed. Using EmiGA CMS means no one has access to your content. Own your data, all of it — your website, your content, your data.
                </p>
              </div>
            </div>  

          </div>
        </div>  
      </section>
      <!-- End feature Area -->

      <!-- Start products Area -->
      <section class="products-area section-gap">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-12 pb-40 header-text text-center">
              <h1 class="pb-10">Popular Posts</h1>
            </div>
          </div>              
          <div class="row">
            
<?php
$most_viewed_sql="SELECT * FROM `post` ORDER BY `view` DESC LIMIT 4";
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
          <div class=\"col-lg-3 col-md-6\">
              <div class=\"single-product\">
                <div class=\"details\">
                  <h4>$r_post_title</h4>
                  <p>$description</p>
                  <a href=\"/post/$r_post_url\" class=\"primary-btn text-uppercase\">Read</a>
                </div>
              </div>

            </div>             
";

}// end of posts grid  (while)
}// end (if)
else {
echo " ";
}
?>
                                                
          </div>
        </div>  
      </section>
      <!-- End products Area -->
    
      <!-- End blog Area -->