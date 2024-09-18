<?php 

    // 1. connect to database
        $database = connectToDB();
    // 2. load the "publish" posts data
    $sql = "SELECT 
    posts.id, posts.title, posts.content, posts.user_id, users.name 
    FROM posts 
    JOIN users 
    ON posts.user_id = users.id 
    WHERE status = 'published'";
$query = $database -> prepare($sql);
$query -> execute();
$posts = $query -> fetchAll();

require "parts/header.php"; ?>

<!--displays if logged in-->
<? if ( isset( $_SESSION['user'] ) ) : ?>
           

    <div class="d-flex flex-column container mx-auto my-5" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center">My Blog</h1>

      <h4 class="text-center">Welcome back, <?= $_SESSION['user']['name']; ?>!</h4>
      

      <?php foreach ($posts as $post) : ?> 
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title"><?= $post['title']; ?></h5>
                <p class="card-text">
                    Author: <?= $post['name']; ?>
                </p>
                <div class="text-end">
                <a href="/post?id=<?= $post['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
                </div>
            </div>
        </div>
      <?php endforeach ;?>
  

      <a href="/dashboard" class="btn btn-link btn-sm">Dashboard</a>
        <a href="/logout" class="btn btn-link btn-sm">Logout</a>

      <!--displays if not logged in-->
      <?php else : ?>
      <div class="mt-4 d-flex flex-column justify-content-center align-items-center gap-3">

       <div>
       <h1 class="h1 mb-4 text-center">Simple CMS App</h1>
       </div>

       <div>
         <a href="login" class="btn btn-primary btn-sm">Login</a>
         <a href="signup" class="btn btn-primary btn-sm">Sign Up</a>
       </div>
      </div>
    </div>
    <?php endif; ?>

    <!--displays if not logged in-->

    <?require "parts/footer.php"?>
