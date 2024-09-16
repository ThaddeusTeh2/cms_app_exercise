<?

//only logged in users can see this
checkIfuserIsNotLoggedIn();

  // 1. connect to the database
  $database = connectToDB();
  
  if ( ($_SESSION['user']['role'] == 'admin') || ($_SESSION['user']['role'] == 'editor') )   {
    $sql = "SELECT * FROM posts";
    $query = $database->prepare( $sql );
    $query->execute();
    $posts = $query->fetchAll();
  } else {
    $sql = "SELECT * FROM posts WHERE user_id = :user_id";
    $query = $database->prepare( $sql );
    $query->execute([
      'user_id' => $_SESSION['user']['id']
    ]);
    $posts = $query->fetchAll();
  }

  //get all the posts (admin)
  

require "parts/header.php"?>


    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Posts</h1>
        <div class="text-end">
          <a href="/manage_posts_add" class="btn btn-primary btn-sm"
            >Add New Post</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 40%;">Title</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($posts as $index => $post) :?>
            <tr>
              <th scope="row"><?= $post['id']?></th>
              <td><?= $post['title']?></td>
              <td><span class="badge bg-primary"><?=$post['status']?></span></td>
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="post.php"
                    target="_blank"
                    class="btn btn-primary btn-sm me-2 disabled"
                    ><i class="bi bi-eye"></i
                  ></a>
                  <a
                    href="/manage_posts_edit?id=<?= $post['id']; ?>"
                    class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                 <form method="POST" action="post/delete">
                 <input type="hidden" name="id" value="<?= $post['id']; ?>" />
                 <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                 </form>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>

    <?require "parts/footer.php"?>
