<?php
$db =  mysql_connect("localhost", "root", "");
if(!$db) die("database error");
if(!mysql_select_db("forumdiskusi",$db)) die("database error");
?>