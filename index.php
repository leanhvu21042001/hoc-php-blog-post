<?php
require_once './config/config.php';
require_once './config/db.php';

// Create Query
$query = "SELECT * FROM posts ORDER BY created_at DESC";

// Get result
$result = mysqli_query($conn, $query);

// Fetch Data
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($posts);

// Free result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);
?>

<?php include('./views/header.php'); ?>
<h1 class="text-center">Posts</h1>
<div class="container">
  <?php foreach($posts as $post): ?>
    <div class="well">
      <h3><?php echo $post['title'] ?></h3>
      <small><?php echo $post['created_at'] ?></small>
      <small><?php echo $post['author'] ?></small>
      <p><?php echo $post['body'] ?></p>
      <a class="btn btn-default" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
    </div>
  <?php endforeach; ?>
</div>

<?php include('./views/footer.php'); ?>