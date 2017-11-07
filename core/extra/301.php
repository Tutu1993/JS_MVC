<?php

$the_host = $_SERVER['HTTP_HOST'];
$the_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$the_url = strtolower($the_url);
if (count(explode("/index.php?", $the_url)) > 1) {
    $the_url = str_replace("/index.php?", "", $the_url);
}
if ($the_host !== 'www.chengdiankeji.com') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location:http://www.chengdiankeji.com'.$the_url);
}
