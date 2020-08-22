<?php
session_start();
require_once('Connection.php');
require_once('Reporter.php');
require_once('Photo.php');

/*$photo->attach_file($_FILES);
echo $photo->get_file();
echo $photo->temp;*/


$photo->attach_file();
print_r($photo->file);
?>