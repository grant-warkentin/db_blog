<?php
include 'db_connect.php';
//ChatGPT generated because I didn't want to import any frameworks nor write all this out
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        .post {
            border: 2px solid #000; /* Border around the entire post */
            margin-bottom: 20px; /* Space between posts */
            padding: 10px; /* Padding inside the post */
        }
        .header {
            display: flex; /* Layout the elements side by side */
            justify-content: space-between; /* Space out the elements */
            border-bottom: 2px solid #000; /* Border under the header */
            padding-bottom: 5px; /* Space between text and border */
        }
        .content {
            margin-top: 10px; /* Space between header and content */
        }
    </style>
</head>
<body>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="post">
            <div class="header">
                <span>Title: ' . htmlspecialchars($row["Title"]) . '</span>
                <span>Posted on: ' .htmlspecialchars($row["CreatedAt"]) . '</span>
            </div>
            <div class="content">' . nl2br(htmlspecialchars($row["Content"])) . '</div>
        </div>';
    }
} else {
    echo "<p>0 results</p>";
}

$conn->close();

echo '</body>
</html>';
?>
