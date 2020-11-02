<?php
require_once './config/config.php';
require_once './config/db.php';

// Check for Submit
if (isset($_POST['delete'])) {
  // Get form data
  $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

  // Delete value to db by id
  $query =
  "DELETE FROM posts WHERE id = {$delete_id}";
  
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
  <div class="container">
    <h1 class="text-center"><?php echo $post['title'] ?></h1>

    <div class="well">
      
      <small><?php echo $post['created_at'] ?></small>
      <small><?php echo $post['author'] ?></small>
      <p><?php echo $post['body'] ?></p>
      <hr>
      <form class="mr-auto" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="delete_id" value="<?php echo $post['id'] ?>">
        <button type="submit" name="delete" class="btn btn-dark">Delete</button>
      </form>
      <a href="<?php echo ROOT_URL ?>editpost.php?id=<?php echo $post['id'] ?>" class="btn btn-danger">Edit</a>
    </div>
    
  </div>
  <a class="btn btn-default" href="<?php echo ROOT_URL; ?>">Back</a>
  <?php include('./views/footer.php'); ?>