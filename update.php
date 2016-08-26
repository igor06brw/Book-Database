<?php

include('core/connect.php');
if(isset($_POST['btn-update'])){

    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publication = $_POST['book_publication'];
    $book_date_release = $_POST['book_date_release'];
    $book_isbn = $_POST['book_isbn'];
    $book_desc = $_POST['book_desc'];
    $book_price = $_POST['book_price'];

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!UPLOAD A IMAGE!!!!!00
    $update = "UPDATE `book` SET `book_title` = '$book_title', `book_author` = '$book_author' WHERE `book`.`book_id` =". $_POST['book_id'];
    $up = mysqli_query($conn, $update);


    if (!empty($_POST["book_title"])) {
        echo "Yes, title is set";
    }else{
        echo "N0, title is not set";
    }

    if(!isset($up)){
        die ("Error $up" .mysqli_connect_error());
    }
    else
    {
        header("location: index.php");
    }
    echo "<script>alert('is updated!')</script>";


}
include('core/connect.php');
if(isset($_GET['edit_id'])){
    $sql = "SELECT * FROM book  WHERE book_id =" .$_GET['edit_id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $book_id = $row['book_id'];
    $book_title = $row['book_title'];
    $book_author = $row['book_author'];
    $book_publication = $row['book_publication'];
    $book_date_release = $row['book_date_release'];
    $book_price = $row['book_price'];
    $book_image = $row['book_image'];
    $book_desc = $row['book_desc'];
    $book_isbn = $row['book_isbn'];

    echo "<script>alert('GET ID GOOD')";
 }else
    echo "<script>alert('Problem with $/_GET function')";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BookDB - Update Book</title>
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
<div>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><h2>Update Product</h2></td>
            </tr>
            <tr>
                <input type='hidden' name='book_id' value="<?php echo $book_id; ?> "/>
            </tr>
            <tr>
                <td>Book Title:</td>
                <td><input type="text" class="form-control" placeholder="Book Title" name="book_title" value="<?php echo $book_title; ?> "/></td>
            </tr>
            <tr>
                <td>Author:</td>
                <td><input type="text" class="form-control" placeholder="Author" name="book_author" value="<?php echo $book_author; ?> "></td>
            </tr>
            <tr>
                <td>Publication of Book:</td>
                <td><select name="book_publication" class="form-control">
                        <option><?php echo $book_publication; ?></option>
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
                <td><input type="date" class="form-control" placeholder="Date" name="book_date_release" value="<?php echo $book_date_release; ?>"></td>
            </tr>
            <tr>
                <td>Image of Book:</td>
                        <td><input type="file" class="fileinput fileinput-new" data-icon="false" name="book_image" value="<?php echo $book_image; ?>"></td>
                <td><img src='images/<?php echo $book_image ?>' width='140' height='180' /></td>
            </tr>
            <tr>
                <td>Book Description:</td>
                <td><textarea name="book_desc" class="form-control" ><?php echo $book_desc; ?></textarea></td>
            </tr>
            <tr>
                <td>ISBN number:</td>
                <td><input type="text" class="form-control" placeholder="ISBN" name="book_isbn" value="<?php echo $book_isbn; ?>"></td>
            </tr>
            <tr>
                <td>Price of Book:</td>
                <td><input type="text" class="form-control" placeholder="Price" name="book_price" value="<?php echo $book_price; ?>"></td>
            </tr>
                <input type="submit" class="btn btn-default" name="btn-update" value="Accept"/>
        </table>
    </form>
</div>
</body>
</html>


