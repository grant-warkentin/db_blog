<?php
include 'db_connect.php';

function searchPosts($keyword, $tag) {
    global $conn;

    //Get Posts based on combination of tag and keyword
    //Assumes Tag Name is known 
    if (!empty($keyword) && !empty($tag)) {
	    $sql = "SELECT DISTINCT posts.* FROM posts
            	LEFT JOIN postTags ON posts.PostID = postTags.PostID
            	LEFT JOIN tags ON postTags.TagID = tags.TagID
            	WHERE (posts.Title LIKE '%$keyword%' OR posts.Content LIKE '%$keyword%') AND tags.TagName = '$tag'";
    } elseif (!empty($keyword)) {
	    $sql = "SELECT DISTINCT posts.* FROM posts WHERE posts.Title LIKE '%$keyword%' OR posts.Content LIKE '%$keyword%'";
    } elseif (!empty($tag)) {
	    $sql = "SELECT DISTINCT posts.* FROM posts
            LEFT JOIN postTags ON posts.PostID = postTags.PostID
            LEFT JOIN tags ON postTags.TagID = tags.TagID
            WHERE tags.TagName = '$tag'";
    } else {
	    $sql = "SELECT * FROM posts";
    }


    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch and display all posts containing the keyword
        while($row = $result->fetch_assoc()) {
            echo "PostID: " . $row["PostID"]. " - Title: " . $row["Title"]. " - Content: " . $row["Content"]. "<br>";
        }
    } else {
        echo "No results found";
    }
}


$keyword = $_GET['keyword'];
$tag = $_GET['tag'];
searchPosts($keyword, $tag);

$conn->close();
?>
