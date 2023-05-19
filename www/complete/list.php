<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Export</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>User Data</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Birthday</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Father Name</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sn=1;
                    $user_qry = "SELECT * from users";
                    $user_res = mysqli_query($link, $user_qry);
                    while($user_data = mysqli_fetch_assoc($user_res)){
                        ?>
                        <tr>
                            <td><?php echo $user_data['id']; ?></td>
                            <td><?php echo $user_data['username']; ?></td>
                            <td><?php echo $user_data['password']; ?></td>
                            <td><?php echo $user_data['birthday']; ?></td>
                            <td><?php echo $user_data['phone']; ?></td>
                            <td><?php echo $user_data['email']; ?></td>
                            <td><?php echo $user_data['father_name']; ?></td>
                            <td><?php echo $user_data['age']; ?></td>
                    </tr>
                    <?php 
                    $sn++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="text-center">
                <a href="excel.php" class="btn btn-primary target="_blank">Data Export</a>
            </div>

        </div>           
    </div>
</div>
</body>
</html>