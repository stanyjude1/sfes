<?php
define('CURRENCY', 'Rs. ');
define('WEB_URL', 'http://localhost/sfes/');
define('ROOT_PATH', '/var/www/html/sfes/');


define('TERM_1', '1');
define('TERM_2', '2');
define('TERM_3', '3');


define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'admindb');
define('DB_DATABASE', 'sfes');
$link = mysql_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD) or die(mysql_error());mysql_select_db(DB_DATABASE, $link) or die(mysql_error());?>