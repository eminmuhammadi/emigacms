<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/controller/cache_class.php');

$hour="1";
$sec="20"; //default 3600


if($allowCache=="1"){
$options = array(
	'time'   => $hour*$sec, //seconds
	'dir'    => 'cache', // Cache direction
	'buffer' => true,   // compress file
	'load'   => false, //show load sec end of file
	'external'=>array('index.php'/*,'nocache2.php'*/),
	'extension' => '.html' 
	);
$sCache = new sCache($options);
sleep(1); //default 2
} 


if($allowCache=="0"){
$sCache = new sCache("",false);
$sCache->clearCache();

}
?>