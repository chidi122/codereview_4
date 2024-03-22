<?php
require "db_connections.php";

if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $isbn_code = $_POST["isbn_code"];
    $short_description = $_POST["short_description"];
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = $_POST["publish_date"];

 
    $image = !empty($_POST["image"]) ? $_POST["image"] : 'https://cdn.pixabay.com/photo/2018/01/17/18/43/book-3088775_1280.jpg';

    $sql = "INSERT INTO `media` (`title`, `image`, `isbn_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`) VALUES ('$title', '$image', '$isbn_code', '$short_description', '$type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date')";

    if (mysqli_query($connect, $sql)) {
        echo "<div class='alert alert-success' role='alert'>
        New media item has been created successfully!
      </div>";
        header("refresh: 3; url= index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        Something went wrong, please try again later!
      </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-3">
    <a href="index.php" class="btn btn-primary">&laquo; Go back</a>
</div>
    <div class="container">
        <h2>Create New Media Item</h2>
        <form method="post">
            <input type="text" class="form-control mb-2" placeholder="Title" name="title" required>
            <input type="text" class="form-control mb-2" placeholder="Image URL or filename" name="image">
            <input type="text" class="form-control mb-2" placeholder="ISBN Code" name="isbn_code">
            <textarea class="form-control mb-2" placeholder="Short Description" name="short_description"></textarea>
            <select class="form-control mb-2" name="type" required>
                <option value="book">Book</option>
                <option value="CD">CD</option>
                <option value="DVD">DVD</option>
            </select>
            <input type="text" class="form-control mb-2" placeholder="Author First Name" name="author_first_name">
            <input type="text" class="form-control mb-2" placeholder="Author Last Name" name="author_last_name">
            <input type="text" class="form-control mb-2" placeholder="Publisher Name" name="publisher_name">
            <input type="text" class="form-control mb-2" placeholder="Publisher Address" name="publisher_address">
            <input type="date" class="form-control mb-2" placeholder="Publish Date" name="publish_date">
            <input class="btn btn-primary" type="submit" value="Create Media Item" name="create">
        </form>
    </div>
</body>
</html>
