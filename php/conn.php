<?php
#@header('content-type:text/html; charset=utf-8');
$hd=mysql_connect('localhost','root','coolboy') or die('数据库连接失败:' . mysql_error());
$db=mysql_select_db('wffgerwebsite') or die(mysql_error());
mysql_query('set name utf8');
