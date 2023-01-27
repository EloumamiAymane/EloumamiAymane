<?php
session_start();



$connexion = mysqli_connect('localhost', 'root', '', 'Stock') or die(mysqli_error($connection));;


if (isset($_POST['submit'])) {
    $userr = $_POST['username'];
    $pass = $_POST['pass'];

    if (!empty($userr) && !empty($pass)) {



        $infoACCOUNT = $connexion->query("SELECT * FROM `ADMIN` WHERE usernameadm='$userr'and password='$pass' ") or die(mysqli_error($connexion));
        $result = $infoACCOUNT->fetch_assoc();

        if ($result) {
            $_SESSION["User"] = $result["usernameadm"];
            $_SESSION["pass"] = $result["password"];
            if (isset($_SESSION["User"])) {
                header("location:../home/home.php");
            }
        } else {
            $_SESSION['message'] = "Mot de Passe ou Username Incorrect ";
        }
    } else {
        $_SESSION['message'] = "Veuillez Inserez Vos Informations! ";
    }
}
