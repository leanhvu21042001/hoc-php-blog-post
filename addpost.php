<?php
require_once './config/config.php';
require_once './config/db.php';
// Check for Submit
if (isset($_POST['submit'])) {
  // Get form data
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  
  // Insert value to db
  $query = "INSERT INTO posts(title, author, body) VALUES('$title', '$author', '$body')";
  if(mysqli_query($conn, $query)) {
    header("location:".ROOT_URL.'');
  } else {
    echo "ERROR: ". mysqli_error($conn);
  }

}
?>

<?php include('./views/header.php'); ?>
<h1 class="text-center">Add Post</h1>
<div class="container">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
  <div class="form-group">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input id="author" type="text" name="author" class="form-control">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea id="body" name="body" class="form-control"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include('./views/footer.php'); ?>