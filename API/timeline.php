<?php
include_once('API/sessionManeger.php');
include_once('crud.php');
$post=read('posttbl','');
echo $post['contentPost'];
foreach ($post as $value) {
  echo "$value <br>";
}

?>