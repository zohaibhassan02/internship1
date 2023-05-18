<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
include "config.php";
$email = $_SESSION["email"];
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
          <a class="nav-link" href="write_post.php">Write a post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="your_posts.php">Your posts</a>
        </li>
      </ul>
      <form class="d-flex">
        <button class="btn btn-outline-success" type="submit"><a href="logout.php">Sign Out</a></button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Posts Data</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Topic</th>
                        <th>Post</th>
                        <th>time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sn=1;
                    $user_qry = "SELECT topic, post, time FROM posts WHERE email = '$email'";
                    $user_res = mysqli_query($con, $user_qry);
                    while($user_data = mysqli_fetch_assoc($user_res)){
                        ?>
                        <tr>
                            <td><?php echo $user_data['topic']; ?></td>
                            <td><?php echo $user_data['post']; ?></td>
                            <td><?php echo $user_data['time']; ?></td>                   
                    </tr>
                    <?php 
                    $sn++;
                    }
                    ?>
                </tbody>
            </table>

        </div>           
    </div>
</div>
</body>
</html>