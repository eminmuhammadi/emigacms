<?php

$title="Loading . . .  You logged out"

?>

<?php  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/admin_component/head.php');  ?>
<?php
unset($_SESSION["logged"]);
?>

<meta http-equiv="refresh" content="0; url=<?php echo"$url".'/admin/login.php';?>">
        
<script type="text/javascript">

window.location.href = "<?php echo"$url".'/admin/login.php';?>"

</script>