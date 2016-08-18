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
}

function getPublication()
{

    global $conn;

    $getPublication = "SELECT * FROM publication";

    $runPublication = $conn->query($getPublication);

    if ($runPublication->num_rows > 0)
    {
        while ($rowPublication = $runPublication->fetch_assoc())
        {

            $publication_id = $rowPublication['publication_id '];
            $publication_name = $rowPublication['publication_name'];

            echo "<option value='$publication_id'>$publication_name</option>";

        }
    }
}

function getBook()
{

    global $conn;

    $getBook = "SELECT * FROM book";

    $runBook = $conn->query($getBook);

    if ($runBook->num_rows > 0)
    {
        while ($rowBook = $runBook->fetch_assoc())
        {

            $book_id = $rowBook['book_id'];
            $book_title = $rowBook['book_title'];
            $book_author = $rowBook['book_author'];
            $book_publication = $rowBook['book_publication'];
            $book_date_release = $rowBook['book_date_release'];
            $book_price = $rowBook['book_price'];
            $book_image = $rowBook['book_image'];
            $book_desc = $rowBook['book_desc'];
            $book_isbn = $rowBook['book_isbn'];

            echo "

                <div id='single_book'>
                    <h3>$book_title</h3>
                    
                    <img src='../product_images/$book_image' width='180' height='260'/>
                    
                </div>
               
                ";

        }
    }
}

    ?>