<?

checkIfuserIsNotLoggedIn();
 // get the id from the URL
 $id = $_GET['id'];

  // 1. connect to the database
  $database = connectToDB();


  //get the post
  $sql = "SELECT * FROM posts WHERE id = :id";
  $query = $database->prepare( $sql );
  $query->execute(['id'=>$id]);
  $posts = $query->fetch();


require "parts/header.php"; 

?>


    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Post</h1>
      </div>

      <?php require "parts/errorbox.php"?>

      <div class="card mb-2 p-4">
        <form method="POST" action="post/edit">

        <!--TITLE-->
          <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input
              name="title"
              type="text"
              class="form-control"
              id="post-title"
              value="<?= $posts['title']; ?>"
            />
          </div>

          <!--CONTENT-->
          <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="post-content" rows="10"><?= $posts['content']; ?></textarea>
          </div>


          <!--STATUS-->
          <div class="mb-3">
            <label for="post-content" class="form-label">Status</label>
            <select class="form-control" id="post-status" name="status">
            
            <?php if ( $posts['status'] == 'published' ) : ?>
                <option value="published" selected>Published</option>
              <?php else: ?>
                <option value="published">Published</option>
              <?php endif; ?>

              <?php if ( $posts['status'] == 'pending' ) : ?>
                <option value="pending" selected>Pending</option>
              <?php else: ?>
                <option value="pending">Pending</option>
              <?php endif; ?>
              
            </select>
          </div>

          <!--update-->
          <div class="text-end">
            <input type="hidden" name="id" value="<?= $posts['id']; ?>"/>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>

      </div>
      <div class="text-center">
        <a href="manage_posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>

    <?require "parts/footer.php"?>
