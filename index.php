<?php
require_once "db_connections.php"; 

if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'];
    $sql = "SELECT * FROM media WHERE title LIKE '%$searchKeyword%' OR author_first_name LIKE '%$searchKeyword%' OR author_last_name LIKE '%$searchKeyword%'";
} else {
    $sql = "SELECT * FROM media";
}

$result = mysqli_query($connect, $sql);
$layout = "";

if (mysqli_num_rows($result) == 0) {
    $layout = "<p>No result found</p>";
} else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($rows as $value) {


        $layout .= "<div class='col-lg-4 col-md-6 mb-4'>
            <div class='card'>
                <img src='{$value["image"]}' class='card-img-top image-height' alt='Media Image'>
                <div class='card-body'>
                    <h5 class='card-title'>Title: {$value["title"]}</h5>
                    <p class='card-text'>Author name: {$value["author_first_name"]} {$value["author_last_name"]} </p>
                    <p class='card-text'>International code : {$value["isbn_code"]} </p>
                    <p class='card-text'>Description: {$value["short_description"]} </p>
                    <p class='card-text'>Type: {$value["type"]}</p>
                    <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                    
                    <a href='publisher.php?publisher={$value["publisher_name"]}' class='btn btn-primary'>The Publisher </a>
                </div>
            </div>
        </div>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    


    <style>
    /* index styling */

    .card {
        height: 100%; 
    }
    .card-body {
        height: calc(100% - 180px);  
        overflow-y: auto; 
    }


    .navbar-custom {
            background-color:  #2c3e50;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: white;
        }
        .navbar-custom .navbar-nav .nav-link:hover {
            color: #666;
        }
        
        .ml-auto .nav-item:not(:last-child) {
            margin-right: auto; 
        }


        .footer {
            padding: 20px 0;
            background-color:  #2c3e50;
            color: white;
            text-align: center;
            width: 100%;
        }
        .social-icons a {
            color: #333;
            margin: 0 15px;
            display: inline-block;
        }
        .social-icons a:hover {
            color: #666;
        }
</style>

      
</head>
<body>
 
<!-- index navbar -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="#">Welcome to Chidi's Book Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link" href="#">About Us</a>
      <a class="nav-item nav-link" href="#">Details</a>
    </div>
  </div>
</nav>




    
    <div class="container">
    <form action="" method="GET">
                <div class="input-group my-2">
                    <input type="text" class="form-control" placeholder="Search by title or author" name="search">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
            <a href='form.php' class='btn btn-primary mb-5'>Add media</a>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?= $layout ?>


         <!-- index footer -->

            <footer class="footer">
        <div class="container">
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
            </div>
            © 2024 Chidi's Book Library. All Rights Reserved.
        </div>
    </footer>
           
   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>