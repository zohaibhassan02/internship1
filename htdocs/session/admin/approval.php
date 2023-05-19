<?php

session_start();

if(!isset($_SESSION["signedin"]) || $_SESSION["signedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "/xampp/htdocs/session/config.php";


?>

<!DOCTYPE html>
<head>
    <title>Home page</title>
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
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="approval.php">Approvals</a>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"><a href="/session/logout.php">Sign Out</a></button>
      </form>
    </div>
  </div>
</nav>

<script>
  var txt = "<?php if(isset($_SESSION["message"])){echo $_SESSION["message"];} ?>";
  if(txt != ""){
    document.write(txt);
  }
<?php unset($_SESSION["message"]); ?>
</script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Posts Data</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Post id</th>
                        <th>Post</th>
                        <th>Topic</th>
                        <th>Email</th>
                        <th>Sn</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sn=1;
                    $user_qry = "SELECT * FROM approval";
                    $user_res = mysqli_query($con, $user_qry);
                    while($user_data = mysqli_fetch_assoc($user_res)){
                        ?>
                        <tr>
                            <td><?php echo $user_data['postid']; ?></td>
                            <td><?php echo $user_data['post']; ?></td>
                            <td><?php echo $user_data['topic']; ?></td>
                            <td><?php echo $user_data['email']; ?></td>
                            <td><?php echo $user_data['sn']; ?></td>
                            <td><?php echo $user_data['time']; ?></td>   
                            <td><button name="approved"><a href='approve.php?postid=<?php echo $user_data['postid'];?>'>Approve</a></button> <button name="disapproved"><a href='disapprove.php?postid=<?php echo $user_data['postid'];?>'>Disapprove</a></button></td>                
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