<?php

$filename=basename($_SERVER['SCRIPT_FILENAME']);

if ($filename=="register.php" || $filename=="login.php"){}
else{ 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: login.php"); 
    exit; 
} 
//echo 'Welcome, '.$_SESSION['username']; 
}
$url=$_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="robots" content="noindex,nofollow" />
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/admin/emigacms.png" />

    <!-- DONT EDIT THIS META TAGS START -->
    <!-- 

          License :  .license .link
                          
    -->
    <meta name="description" conteent="EMIGA CMS build your website quickly">
    <meta name="author" content="Emin Muhammadi">
    <!-- DONT EDIT THIS META TAGS END -->



    <title><?php echo "$title";?></title>
    <!-- Bootstrap Core CSS -->
    <link href="/admin/library/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
<script src="/admin/tinymce/tinymce.min.js"></script>
<!--<script src="/admin/tinymce/jquery.tinymce.min.js"></script>-->
  <script>
  tinymce.init({
  selector: '#mytextarea',
  height: 300,
  theme: 'modern',
  plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  init_instance_callback: function (editor) {
    editor.on('Change', function (e) {
      tinymce.activeEditor.dom.setAttrib(tinymce.activeEditor.dom.select('table'), 'border', null);

    });
  }
 });
  </script>

    <link href="/admin/library/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="/admin/library/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="/admin/library/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="/admin/library/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/admin/library/css/helper.css" rel="stylesheet">
    <link href="/admin/library/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
