<?php
    //links db
    $database = connectToDB();

    //declaration
    $id = $_POST["id"];

    echo $id;

    //poof
    $sql = "DELETE FROM posts where id = :id";

    $query = $database->prepare( $sql );

    //exec
    $query->execute([
        "id" => $id
    ]);

    //redirect
    header("Location: /manage_posts");
    exit;