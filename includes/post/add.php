<?php

    $user_id = $_SESSION['user']['id'];
    // 1. connect to Database faster
    $database = connectToDB();

    // 2. get all the data from the form using $_POST
    $title = $_POST['title'];
    $content = $_POST['content'];

    //make post
    $sql = "INSERT INTO posts (`title`,`content`,`user_id`) VALUES (:title, :content, :user_id)";
            // prepare (put everything into the bowl)
            $query = $database->prepare( $sql );
            // execute (cook it)
            $query->execute([
                'title' => $title,
                'content' => $content,
                'user_id' => $user_id
            ]);

    header("Location: /manage_posts");
    exit;

?>
