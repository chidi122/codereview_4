<?php 
require_once 'db_connections.php';

$id= $_GET["id"];
$sql = "SELECT * FROM media WHERE id = $id"; 
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 0) {
    $layout = "<p>No details found for this item.</p>";
} else {
    $row = mysqli_fetch_assoc($result);

    $publishDate = date("F j, Y", strtotime($row["publish_date"]));

    $layout = "<div class='container'>
                    <img src='{$row["image"]}' class='img-fluid' alt='{$row["title"]}' />
                    <h2>{$row["title"]}</h2>
                    <p><strong>ISBN:</strong> {$row["isbn_code"]}</p>
                    <p><strong>Publish Date:</strong> {$publishDate}</p>
                    <p><strong>Description:</strong> {$row["short_description"]}</p>
                    <p><strong>Type:</strong> {$row["type"]}</p>
                    <p><strong>Author:</strong> {$row["author_first_name"]} {$row["author_last_name"]}</p>
                    <p><strong>Publisher:</strong> {$row["publisher_name"]}, {$row["publisher_address"]}</p>
              
              </div>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">


<style>

    /* details styling */

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


        
        
    .container {
        max-width: 800px; 
        margin: auto; 
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px; 
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
    }

    .container img {
        max-width: 100%; 
        height: auto; 
        border-radius: 5px; 
        margin-bottom: 20px; 
    }

    .container h2 {
        color: #333; 
        margin-bottom: 15px; 
    }

    

    .container p strong {
        color: #333; 
    }


    footer {
    background-color: #2c3e50; 
    color: #ffffff; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    padding: 40px 20px; 
    box-sizing: border-box; 
}

.footer-content {
    display: flex;
    flex-wrap: wrap; 
    justify-content: space-between; 
    max-width: 1200px; 
    margin: 0 auto; 
}

.contact-info p, .footer-links a, .legal-info a {
    color: #bdc3c7; 
    text-decoration: none; 
    margin: 5px 0; 
}

.footer-links a, .legal-info a {
    margin: 0 10px; 
}

.footer-links a:hover, .legal-info a:hover {
    text-decoration: underline; 
}

.social-media {
    margin: 20px 0; 
    
}

.newsletter-signup {
    margin: 20px 0; 
    
}

.legal-info, .footer-links {
    text-align: center; 
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column; 
        align-items: center; 
    }

    .footer-links, .legal-info {
        flex-basis: 100%; 
        margin: 10px 0; 
    }
}

.copyright {
    text-align: center; 
    margin-top: 20px; 
    font-size: 0.8em; 
}


    

   
      

        
       
</style>
    
</head>
<body>

<!-- details navbar -->


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

<?= $layout ?>


<!-- details footer -->

<footer>
    <div class="footer-content">
        <div class="contact-info">
            <p>Call us: (123) 456-7890</p>
            <p>Email: contact@abcbookshop.com</p>
            <p>Visit us: 123 Book Street, Booktown, BK 12345</p>
        </div>
        <div class="footer-links">
            <a href="/about">About Us</a> | 
            <a href="/browse">Browse Books</a> | 
            <a href="/events">Events</a> | 
            <a href="/faq">FAQs</a>
        </div>
        <div class="social-media">
            
        </div>
        <div class="newsletter-signup">
            
        </div>
        <div class="legal-info">
            <a href="/privacy">Privacy Policy</a> | 
            <a href="/terms">Terms of Service</a>
        </div>
    </div>
    <div class="copyright">
        <p>© 2024 ABC Bookshop. All rights reserved.</p>
    </div>
</footer>


   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
