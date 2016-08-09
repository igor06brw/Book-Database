<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.08.2016
 * Time: 08:56
 */
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = '';
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    echo "Database connect failed!" . connection_error();
}
?>