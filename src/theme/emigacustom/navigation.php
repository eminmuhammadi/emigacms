<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/pagination.php"); ?>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"><?php echo $theme_name ;?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/posts/<?php 

              if($total_pages=="0"){
                echo"1";
              }
              else{
                echo $total_pages;
              }
              ?>">Posts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>