<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Varela+Round');
    .logo_admin{
        width: 20px;
        height: 20px;
        font-family: 'Varela Round', sans-serif;
        display: flex;
        color: #fff;
    }
    .logo_admin>a{
        font-size: 22px;
        vertical-align: middle;
        text-decoration: none;
        transform: translateY(-2px);
        color: #858687;
    }
    .logout_admin{
        transform: translateX(7px);
    }
    .logout{
        color: #fff;
        transition: .3s;
        
    }
    .logout:hover {
        color: #0B6EBC;
    }

</style>
</head>
<body>
    <div class="logo_admin">
    <a href="#" class='bx bxs-user-circle' ></a>
    <span class="logout_admin"><a href="../delete_admin.php " style="font-size:15px; text-decoration: none;" class="logout">Logout</a></span>
    </div>
</body>
</html>
