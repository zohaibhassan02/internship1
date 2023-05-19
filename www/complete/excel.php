<?php
include 'config.php';

header('Content-type: application/vnd-ms-excel');
$filename = "user_data.xls";
header("Content-Disposition:attachment;filename=\"$filename\"");
?>

<table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="border:2px solid black;padding=10px;">ID</th>
                        <th style="border:2px solid black;padding=10px">Username</th>
                        <th style="border:2px solid black;padding=10px">Password</th>
                        <th style="border:2px solid black;padding=10px">Birthday</th>
                        <th style="border:2px solid black;padding=10px">Phone</th>
                        <th style="border:2px solid black;padding=10px">Email</th>
                        <th style="border:2px solid black;padding=10px">Father's name</th>
                        <th style="border:2px solid black;padding=10px">Age</th>
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
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['id']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['username']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['password']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['birthday']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['phone']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['email']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['father_name']; ?></td>
                            <td style="border:2px solid black;padding=10px"><?php echo $user_data['age']; ?></td>
                    </tr>
                    <?php 
                    $sn++;
                    }
                    ?>
                </tbody>
            </table>