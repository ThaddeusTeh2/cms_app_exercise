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

    case '/home':
      require 'pages/home.php';
      break;

    case '/post':
      require 'pages/post.php';
      break;

    case '/logout':
      require 'pages/logout.php';
      break;

    case '/manage_posts':
      require 'pages/manage_posts.php';
      break;

    case '/manage_users':
      require 'pages/manage_users.php';
      break;

    //managing pages
    
    case '/manage_posts_add':
      require 'pages/manage_posts_add.php';
      break;

    case '/manage_posts_edit':
      require 'pages/manage_posts_edit.php';
      break;

    case '/manage_users_add':
      require 'pages/manage_users_add.php';
      break;
        
    case '/manage_users_edit':
      require 'pages/manage_users_edit.php';
      break;

    case '/manage_users_changepwd':
      require 'pages/manage_users_changepwd.php';
      break;


      

    default:
      require 'pages/dashboard.php';
      break;
  }