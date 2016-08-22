<?php // MAKED FOR COMMENT THE HTML SYNTAX\

include ('core/connect.php');
include('navigator.php')
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard - Index</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="functions/functions.js"></script>
</head>
<body>
<div>
    <?php
        if(isset($_GET['update'])){
        include("update.php");
        }
        if(isset($_GET['delete'])){
        include("delete.php");
        }
    ?>
</div>
<div class="container" style="text-align: center;">
    <?php
    $getBook = "SELECT * FROM book";

    $runBook = $conn->query($getBook);

    if ($runBook->num_rows > 0)
    {
        while ($rowBook = $runBook->fetch_array())
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

            ?>
                <div id='single_product'>
                
                    
                    <img src='images/<?php echo $book_image ?>' width='140' height='180' />
                    <h2><em><?php echo $book_title ?></em></h2>
                    
                    <p id='author'>By: <em><strong><?php echo $book_author ?></strong></em></p>
                    <div id='desc'>
                        <p><em><strong>Description:</strong></em></p>
                        <p><?php echo $book_desc ?></p>
                    </div>
                    <a href='../projekt_wsb_db/index.php?update=<?php echo $book_id ?>' class='btn btn-primary' id='edit'>Edit</a>
                    <a href='../projekt_wsb_db/index.php?delete=<?php echo $book_id ?>' class='btn btn-danger' id='danger' >Delete</a>
                    <p id='price'>Price: <strong><?php echo $book_price ?></strong> PLN</p>
                </div>
      <?php  }
    } ?>
</div>
</body>
</html>

