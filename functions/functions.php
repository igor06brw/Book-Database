<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.08.2016
 * Time: 08:07
 */
require_once('core/connect.php');

function getAuthor()
{

    global $conn;

    $getAuthor = "SELECT * FROM author";

    $runAuthor = $conn->query($getAuthor);

    while ($rowAuthor = $runAuthor->fetch_array(MYSQLI_NUM)) {

        $author_id = $rowAuthor['author_id'];
        $author_title = $rowAuthor['author_title'];

        echo "<li><a href='#'>$author_title</a></li>";

    }

    ?>