<?php
    include '../Controller/connect.php';
    if(isset($_POST['login'])){
        $username = $_POST["username"]; 
        $password = $_POST["password"];
        if($username == "admin" && $password == "password"){
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['usernameAdmin'] = "Admin";
            header("Location: ../Admin/Login/Admin.php");
            exit;
        }else{
            echo '
                <script>
                    alert("Username atau password salah");
                </script>
            ';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/Dashboard/Login.css">
</head>
<body>
    <div class="navbar">
    <a href="home.php" id="home">Logo</a>
        <div class="menu">
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login</a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="leftContent">
            <img src="../../Img/login.jpg" alt="">
        </div>

        <div class="rightContent">
            <h3>Login Admin</h3>
            <form action="" method="POST">
                    <div class="username">
                        <ion-icon name="person-outline"></ion-icon>
                        <label for="username"></label>
                        <input type="text" id="username" name="username" required autocomplete="off" autofocus placeholder="Username">
                    </div>
                    <div class="password">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <label for="password"></label>
                        <input type="password" id="password" name="password"required autocomplete="off"  placeholder="Password">
                    </div>
                    <button type="submit" name="login">Login <ion-icon name="paper-plane-outline"></ion-icon></button>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>