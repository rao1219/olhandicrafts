<?php
defined("ACCESS")||exit;
$link=mysql_connect("localhost","root","");
mysql_query('use olrenting');
mysql_query('set names "utf8"');