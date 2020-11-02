
<?php
require_once './config/config.php';
require_once './config/db.php';
// Check for Submit
if (isset($_POST['submit'])) {
  // Get form data
  $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  
  // Update value to db by id
  $query =
  "UPDATE posts SET
  title='$title',
  author ='$author',
  body='$body'
  WHERE id = {$update_id}";
  
  // die($query);

  if(mysqli_query($conn, $query)) {
    header("location:".ROOT_URL.'');
  } else {
    echo "ERROR: ". mysqli_error($conn);
  }

}

// Get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Create Query
$query = "SELECT * FROM posts WHERE id = $id";

// Get result
$result = mysqli_query($conn, $query);

// Fetch Data
$post = mysqli_fetch_assoc($result);
// var_dump($post);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

<?php include('./views/header.php'); ?>
<h1 class="text-center">Edit Post</h1>
<div class="container">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" class="form-control" value="<?php echo $post['title'] ?>">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input id="author" type="text" name="author" class="form-control" value="<?php echo $post['author'] ?>">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" name="body" class="form-control"><?php echo $post['body'] ?></textarea>
  </div>
  <input type="hidden" name="update_id" value="<?php echo $post['id'] ?>">
  <button type="submit" name="submit" class="btn btn-primary">Update</button>
  </form>
</div>

<?php include('./views/footer.php'); ?>