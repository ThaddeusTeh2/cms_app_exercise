<?php
  // start session
  session_start();

  // import all the required files
  require "includes/functions.php";

    //simple routing system -> decide what page to load depending the url the user visit


  // figure out visited url
  $path = $_SERVER["REQUEST_URI"];



  //load relevant content
  switch( $path ) {

    // actions
    case '/auth/login':
      require 'includes/auth/login.php';
      break;
    case '/auth/signup':
      require 'includes/auth/signup.php';
      break;
    
      
    // pages
    case '/login':
      require 'pages/login.php';
      break;
    case '/signup':
      require 'pages/signup.php';
      break;
    case '/logout':
      require 'pages/logout.php';
      break;

    default:
      require 'pages/home.php';
      break;
  }