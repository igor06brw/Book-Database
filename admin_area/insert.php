<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.08.2016
 * Time: 18:22
 */
require_once('../core/connect.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BookDB - Insert Book</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"
                integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>\
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
    include_once('../admin_area/navigator.php');
    ?>
        <form action="insert.php" method="post"  nenctype="multipart/form-data">
            <table align="center">
                <tr>
                    <td><h2>Insert Product</h2></td>
                </tr>
                <tr>
                    <td>Book Title:</td>
                    <td><input type="text" class="form-control" placeholder="Book Title" name="book_title"></td>
                </tr>
                <tr>
                    <td>Author:</td>
                    <td><input type="text" class="form-control" placeholder="Author" name="book_author"></td>
                </tr>
                <tr>
                    <td>Publication of Book:</td>
                    <td><select name="book_publication" class="form-control">
                            <option>Select a Publication</option>
                            <?php
                            $getPublication = "SELECT * FROM publication";

                            $runPublication = $conn->query($getPublication);

                            if ($runPublication->num_rows > 0) {

                                    $publication_id = $rowPublication['publication_id '];
                                    $publication_name = $rowPublication['publication_name'];

                                    echo "<option value='$publication_id'>$publication_name</option>";

                                }
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Date od Release:</td>
                    <td><input type="text" class="form-control" placeholder="Date" name="book_date_release"></button></td>
                </tr>
                <tr>
                    <td>Image of Book:</td>
                    <td><input type="file" class="form-control" placeholder="Image" name="book_image"></button></td>
                </tr>
                <tr>
                    <td>ISBN number:</td>
                    <td><input type="text" class="form-control" placeholder="ISBN" name="book_isbn"></button></td>
                </tr>
                <tr>
                    <td>Describe:</td>
                    <td><input type="text" class="form-control" placeholder="Describe" name="book_desc"></button></td>
                </tr>
                <tr class="col-xs-1">
                    <td><button type="submit" class="btn btn-default" name="insert_post" value="Insert Now!">Submit</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_POST['insert_post'])) {
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publication = $_POST['book_publication'];
    $book_date_release = $_POST['book_date_release'];
    $book_isbn = $_POST['book_isbn'];

    $insert_book = "INSERT INTO `book` (`book_title`, `book_author`, `book_publication`, `book_date_release`, `book_isbn`) VALUES ('$book_title','$book_author','$book_publication','$book_date_release','$book_isbn')";

    $inserted_book = $conn->query($insert_book);

    if(!$inserted_book) {
        echo "<script>alert('Cant add this book to database - check code!')</script>";
    } else {
        echo "<script>alert('This book was added!')</script>";
    }
}
?>
