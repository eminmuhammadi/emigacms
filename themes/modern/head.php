<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head> 
<?php 
if ($allowGoogle=="1"){
echo "
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=$GoogleAnalytics\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '$GoogleAnalytics');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','$GoogleTagManager');</script>
<!-- End Google Tag Manager -->";}?>
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "<?php echo $oneSignal;?>",
    });
  });
</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<?php 
if (basename($_SERVER['SCRIPT_FILENAME'])=="post.php") {
echo"<meta name=\"description\" content=\"$description\">";}
else { echo"
<meta name=\"description\" content=\"EmiGA CMS &mdash; Simple Use , Light Weight , Fully Responsive CMS\">";	
}
?>
<title><?php 	
if (basename($_SERVER['SCRIPT_FILENAME'])=="post.php") {
echo $post_title ; 
}
else {
echo 'EMIGA CMS &mdash; ['.$theme_name.'] Welcome to the EmiGa CMS';	
}
?></title>
<?php
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 	
echo "
<link rel=\"canonical\" href=\"$url\" />
<meta property=\"og:url\" content=\"$url\" />";
if (basename($_SERVER['SCRIPT_FILENAME'])=="post.php") {
echo "
<meta name=\"keywords\" content=\"$keyword\"/>
<meta property=\"og:locale\" content=\"$lang\"/>
<meta property=\"og:type\" content=\"article\" />
<meta property=\"og:title\" content=\"$post_title\"/>
<meta property=\"og:description\" content=\"$description\"/>
<meta property=\"og:site_name\" content=\"$category\"/>
<meta property=\"article:publisher\" content=\"$publisher\"/>
<meta property=\"article:tag\" content=\"$keyword\"/>
<meta property=\"article:section\" content=\"$category\"/>
<meta property=\"article:published_time\" content=\"$date\"/>
<meta property=\"og:image\" content=\"$post_image\"/>
<meta property=\"og:image:width\" content=\"$post_image_width\"/>
<meta property=\"og:image:height\" content=\"$post_image_height\"/>
<meta name=\"twitter:card\" content=\"summary_large_image\"/>
<meta name=\"twitter:description\" content=\"$description\"/>
<meta name=\"twitter:title\" content=\"$post_title\"/>
<meta name=\"twitter:image\" content=\"$post_image\"/>
";}
?>
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/linearicons.css">
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/font-awesome.min.css">
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/bootstrap.css">
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/magnific-popup.css">
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/nice-select.css">	
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/hexagons.min.css">							
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/animate.min.css">
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/owl.carousel.css">
<link rel="stylesheet" href="/theme/<?php echo $theme_name ;?>/css/main.css">
</head> 
<body>
<?php
if($allowGoogle=="1"){
	echo "
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=$GoogleTagManager\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->";}?>
<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) ."/theme/$theme_name/navigation.php"); ?>	
<!-- Page Content -->