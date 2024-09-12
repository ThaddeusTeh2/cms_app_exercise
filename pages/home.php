<?require "parts/header.php"?>

<!--displays if logged in-->
<? if ( isset( $_SESSION['user'] ) ) : ?>
           

    <div class="d-flex flex-column container mx-auto my-5" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center">My Blog</h1>

      <h4 class="text-center">Welcome back, <?= $_SESSION['user']['name']; ?>!</h4>
      

      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 4</h5>
          <p class="card-text">Here's some content about post 4</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 3</h5>
          <p class="card-text">This is for post 3</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 2</h5>
          <p class="card-text">This is about post 2</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 1</h5>
          <p class="card-text">This is a post</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>

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
