<?php

// 1. connect to database
$database = connectToDB();
// 2. get all the data from the form using $_POST
$title = $_POST['title'];
$content = $_POST['content'];
$status = $_POST['status'];
$id = $_POST['id'];

// 3. do error checking - make sure all the fields are not empty
if ( empty( $title ) || empty( $content ) || empty( $status )) {
    setError( "fill in everything.", '/manage_posts_edit?id=' . $id );
}
// 4. update the user data

// 4.1
$sql = "UPDATE posts SET title = :title, content = :content, status = :status WHERE id = :id";
// 4.2
$query = $database->prepare( $sql );
// 4.3
$query->execute([
    'title' => $title,
    'content' => $content,
    'status' => $status,
    'id' => $id
]);

header("Location: /manage_posts");
exit;