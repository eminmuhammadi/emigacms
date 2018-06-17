</br>
 <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;2018. EmiGa CMS</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/theme/<?php echo $theme_name ;?>/js/jquery.min.js"></script>
    <script src="/theme/<?php echo $theme_name ;?>/js/bootstrap.bundle.min.js"></script>
    <?php
    if($allowComment=="1"){

      echo "
      <script id=\"dsq-count-scr\" src=\"//$disquis_url/count.js\" async></script>
      ";
    }
    ?>
  </body>

</html> 