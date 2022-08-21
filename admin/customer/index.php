<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require '../connect.php';
        $sql = "select * from customers";
        $result = mysqli_query($connect,$sql);
    ?>
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Total information customer</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered" >
                    <thead>
                        <tr style="text-align: center;">
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Gender</th>
                            <th>Token</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $each): ?>
                        <tr style="text-align: center;">
                            <th >#<?php echo $each['id']?></th>
                            <td><?php echo $each['first_name']?></td>
                            <td><?php echo $each['last_name']?></td>
                            <td><?php echo $each['email']?></td>
                            <td><?php echo $each['password']?></td>
                            <td><?php echo $each['gender']?></td>
                            <td style="width: 400px;"><?php echo $each['token']?></td>
                            <td><?php echo $each['phone_number']?></td>
                            <td><?php echo $each['address']?></td>
                            <td style="width: 50px;"><a href="../customer/delete_cus.php?id=<?php echo $each['id']?>"  class='bx bx-x delete' style="font-size: 20px;"></a></td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>