<?

checkIfuserIsNotLoggedIn();

require "parts/header.php"?>


    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Post</h1>
        <?php require "parts/errorbox.php"?>
      </div>
      <div class="card mb-2 p-4">
        <form action="/post/add" method="post">
          <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="post-title" />
          </div>
          <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea
              name="content"
              class="form-control"
              id="post-content"
              rows="10"
            ></textarea>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage_posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>

    <?require "parts/footer.php"?>
