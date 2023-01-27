<?php
include "connexion.php";
include "User.php";




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login/login.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Boxicons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Login</title>
</head>




<style>
    .msg {
        margin: 30px auto;
        padding: 10px;
        border-radius: 5px;
        color: #ff0000;
        background: #fcc6c7;
        border: 1px solid #c78585;
        width: 50%;
        text-align: center;
        position: fixed;
        bottom: 570px;
        left: 310px;
    }
</style>

<body style="  background-image:url(../img/stock.jpg)">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="msg">


            <?php
            echo $_SESSION['message'];

            unset($_SESSION['message']);
            ?>

        </div>
    <?php } ?>
    <div class="log" style="position:relative ; bottom:120px;">
        <div class="header">
            <div class="title">
                <h2 style="font-size:35px;position:relative ;top:100px; color:white;">GDANA-STOCK</h2>
            </div>
        </div>
        <div class="content" style="position:relative ;top:300px;">
            <form method="POST">
                <p style="text-align:center; color:rgb(161, 153, 153)">Please login to continue</p>
                <div class="mb-3">

                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">
                    <i class="fas fa-user" style="position: relative; bottom:32px;left:335px;"></i>
                </div>
                <div class="mb-3">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
                    <i class="fas fa-lock" style="position: relative; bottom:32px;left:335px;"></i>
                </div>

                <button type="submit" class="btn btn-primary" name="submit" style="position: relative;left:290px;bottom: 28px;; ">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>