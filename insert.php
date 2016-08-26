<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 08.08.2016
 * Time: 18:22
 */
include('core/connect.php');
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
                integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script> -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
    include_once('navigator.php');
    ?>
        <div class="container">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><h2>Insert Product</h2></td>
                    </tr>
                    <tr>
                        <td><input type='hidden' name='book_id'></td>
                    </tr>

                    <tr>
                        <td>Book Title:</td>
                        <td><input type="text" class="form-control" placeholder="Book Title" name="book_title" /></td>
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

                                if ($runPublication->num_rows > 0)
                                {
                                    while ($rowPublication = $runPublication->fetch_array())
                                    {

                                        $publication_id = $rowPublication['publication_id'];
                                        $publication_name = $rowPublication['publication_name'];

                                        echo "<option value='$publication_id'>$publication_name</option>";

                                    }
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Date od Release:</td>
                        <td><input type="date" class="form-control" placeholder="Date" name="book_date_release"></td>
                    </tr>
                    <tr>
                        <td>Image of Book:</td>
                        <td><input type="file" class="fileinput fileinput-new" data-icon="false" name="book_image"/></td>
                    </tr>
                    <tr>
                        <td>Book Description:</td>
                        <td><textarea name="book_desc" class="form-control" ></textarea></td>
                    </tr>
                    <tr>
                        <td>ISBN number:</td>
                        <td><input type="text" class="form-control" placeholder="ISBN" name="book_isbn"></td>
                    </tr>
                    <tr>
                        <td>Price of Book:</td>
                        <td><input type="text" class="form-control" placeholder="Price" name="book_price"></td>
                    </tr>
                    <div>
                        <input type="submit" class="btn btn-default" name="insert_post" value="Insert Now!">
                    </div>
                </table>
            </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['insert_post'])) {
    $pic_dir = "images/";
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publication = $_POST['book_publication'];
    $book_date_release = $_POST['book_date_release'];
    $book_isbn = $_POST['book_isbn'];

    $book_image = $_FILES['book_image']['name'];
    $book_image_tmp = $_FILES['book_image']['tmp_name'];

    $book_desc = $_POST['book_desc'];
    $book_price = $_POST['book_price'];

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!UPLOAD A IMAGE!!!!!

    if(is_uploaded_file($book_image_tmp))
    {
        move_uploaded_file($book_image_tmp,$pic_dir . $book_image);
    } else {
        die('File not uploaded.....');
    }


    echo $insert_book = "INSERT INTO `book` (`book_title`, `book_author`, `book_publication`, `book_image`, `book_desc`, `book_price`, `book_date_release`, `book_isbn`) VALUES ('$book_title','$book_author','$book_publication','$book_image','$book_desc','$book_price','$book_date_release','$book_isbn')";


    $inserted_book = $conn->query($insert_book);

    if(!$inserted_book) {
        echo "<script>alert('Cant add this book to database - check code!')</script>";
    } else {
        echo "<script>alert('This book was added!')</script>";
    }
} else
    echo "<script>alert('Please, fill the fields.')</script>"
?>
