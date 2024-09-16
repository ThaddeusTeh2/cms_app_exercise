<?php

// connect to database
function connectToDB() {
    // setup database credential
    $host = '127.0.0.1';
    $database_name = 'cmsapp';
    $database_user = 'root';
    $database_password = '';

    // connect to the database
    $database = new PDO(
        "mysql:host=$host;dbname=$database_name",
        $database_user,
        $database_password
    );
    
    return $database;
}

function setError( $message, $redirect ) {
    $_SESSION['error'] = $message;
    header("Location: " . $redirect);
    exit;
}

// check if user is logged in or not
function checkIfuserIsNotLoggedIn() {
    if ( !isset( $_SESSION['user'] ) ) {
      header("Location: /login");
      exit;
    }
  }

// check if current user is an admin or not
function checkIfIsNotAdmin() {
    if ( isset( $_SESSION['user'] ) && $_SESSION['user']['role'] != 'admin' ) {
        header("Location: /dashboard");
        exit;
    }
}
