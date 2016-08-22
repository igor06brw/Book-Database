<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21.08.2016
 * Time: 23:03
 */


if (isset($_GET['book_id'])) {
    $query = "DELETE FROM `book` WHERE `book`.`book_id` = '$book_id'";

}