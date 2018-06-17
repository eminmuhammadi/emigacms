<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/pagination.php"); ?>
        <header id="header" id="home">
          <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
              <div id="logo">
                <a href="/"><h4 style="color:white;">EmiGA CMS</h4></a>
              </div>
              <nav id="nav-menu-container">
                <ul class="nav-menu">
                  <li class="menu"><a href="/">Home</a></li>
              <li><a href="/posts/<?php 
              if($total_pages=="0"){
                echo"1";
              }
              else{
                echo $total_pages;
              }
              ?>">Blog</a>
              </li>                 
                </ul>
              </nav><!-- #nav-menu-container -->            
            </div>
          </div>
        </header><!-- #header -->