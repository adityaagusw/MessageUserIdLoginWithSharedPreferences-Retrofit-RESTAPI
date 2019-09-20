<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'crud_login');

$db = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect');
