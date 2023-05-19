<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require_once "config.php";

$posts = $topic = "";
$posts_err = $topic_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["posts"]))){
        $posts_err = "Please write something in your post";
    }
    else{
    $posts = $_POST["posts"];
    }

    if(!isset($_POST["topic"])){
        $topic_err = "Please choose a topic for your post.";
    }
    else{
        $topic = $_POST["topic"];
    }

        if(empty($posts_err) && empty($topic_err)){
            $sql = "INSERT INTO approval (post, topic, email, sn) VALUES (?, ?, ?, ?)";
            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "sssi", $param_post, $param_topic, $param_email, $param_sn);

                $param_post = $posts;
                $param_topic = $topic;
                $param_email = $_SESSION["email"];
                $param_sn = $_SESSION["sn"];

                if(mysqli_stmt_execute($stmt)){
                    $_SESSION["message"] = "Post is submitted. Waiting for admin's approval";
                    header("location: homepage.php");
                }
                else{
                   echo "Oops! Something went wrong";
                }
                mysqli_stmt_close($stmt);
            }
        }
mysqli_close($con);
}


?>

<!DOCTYPE html>
<head> 
    <title>Write a post</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="homepage.php">Home page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="write_post.php">Write a post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="your_posts.php">Your posts</a>
        </li>
      </ul>
      <form class="d-flex">
        <button class="btn btn-outline-success" type="submit"><a href="logout.php">Sign Out</a></button>
      </form>
    </div>
  </div>
</nav>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <p>Which of these topics best describe your post</p>
        <input type="radio" value="movies" name="topic" id="type1">
        <label for="type1">Movies</label><br>

        
        <input type="radio" value="politics" name="topic" id="type2">
        <label for="type2">Politics</label><br>

        
        <input type="radio" value="sports" name="topic" id="type3">
        <label for="type3">Sports</label><br>

        
        <input type="radio" value="other" name="topic" id="type4">
        <label for="type4">Other</label><br>

        <div>
            <?= $topic_err; ?>
        </div><br>

        <div>
        <label for="posts">Write your post here:</label>
        <textarea id="posts" name="posts" rows="10" cols="50" value="<?= $posts; ?>"></textarea>
        <small><?= $posts_err; ?></small>
        </div><br>
        

        <input type="submit" value="submit">

</form>
</body>
</html>