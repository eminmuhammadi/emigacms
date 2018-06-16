<?php

$title="Edit Profile" ;

?>

<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/head.php');  ?>
<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/navbar.php');  ?>
<div class="page-wrapper">
<!-- Bread crumb -->
<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/breadcrump.php');  ?>
<!-- End Bread crumb -->
<!-- Container fluid  -->

<div class="container-fluid">
<!-- Start Page Content -->

<div class="row">

<div class="col-12">

<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/page_layout/editprofile.php');  ?>


</div>
</div>
 <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/foot.php');  ?>
