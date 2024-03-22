<?php 
require_once 'db_connections.php';

if(isset($_GET["publisher"])) {
    $publisherName = $_GET["publisher"];
    
    
    $sql = "SELECT * FROM media WHERE publisher_name = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $publisherName);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0) {
        $layout = "<p>No media found for this publisher.</p>";
    } else {
        $layout = "";
        while($row = $result->fetch_assoc()) {
            $publishDate = date("F j, Y", strtotime($row["publish_date"]));

            $layout .= "<div class='col-lg-4 col-md-6 mb-4'>
                            <div class='card'>
                                <img src='{$row["image"]}' class='card-img-top' alt='{$row["title"]}' >
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row["title"]}</h5>
                                    <p class='card-text'>Author: {$row["author_first_name"]} {$row["author_last_name"]}</p>
                                    <p class='card-text'>ISBN: {$row["isbn_code"]}</p>
                                    <p class='card-text'>Description: {$row["short_description"]}</p>
                                    <p class='card-text'>Type: {$row["type"]}</p>
                                    <p class='card-text'>Publish Date: {$publishDate}</p>
                                </div>
                            </div>
                        </div>";
        }
        $layout = "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4'>$layout</div>";
    }
} else {
    $layout = "<p>No publisher specified.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">


    <style>

     /* publisher styling */

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
        <!-- publisher navbar -->

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


<div class="container mt-3">
    <a href="index.php" class="btn btn-primary">&laquo; Go back</a>
</div>


<section class="jumbotron text-center">
    <div class="container">
        <h1 class="display-4">Publisher Media</h1>
        <p class="lead">Browse media items published by <?= htmlspecialchars($publisherName) ?></p>
    </div>
</section>

<div class="container">
    <?= $layout ?>
</div>



<!-- publisher footer -->

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
