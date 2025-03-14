<?php
//Handling GET request
//process_search.php?query=php$category=tutorials
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $searchQuery = $_GET['Query'] ?? "";
    $category = $_GET['category'] ?? "";

    echo "Searching for PHP '$searchQuery' in category '$category'<br>";
}
