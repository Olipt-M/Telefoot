<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Telefoot - La chaine du foot</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/icomoon.css" />
    <link rel="stylesheet" href="../public/assets/css/main.css" />
</head>

<body>
    <header>
        <img src="../public/assets/img/telefoot-color-bg-01.svg" alt="Telefoot - La chaine du foot" />
        <nav>
            <ul>
                <li><a href="home" class="btn-home">Home</a></li>
                <li>Telefoot Bar</li>
            </ul>
        </nav>
        <nav class="account-buttons">
            <ul>
                <?php if (isset($_SESSION["user"])) { ?>
                    <li>Bienvenue <?= $_SESSION["user"]["firstname"] ?></li>
                    <li><a href="user" class="btn-subscription">Mes lives</a></li>
                    <li><a href="logout" class="btn-login">Déconnexion</a></li>
                <?php } else { ?>
                    <li><a href="subscription" class="btn-subscription">S'abonner</a></li>
                    <li><a href="login" class="btn-login">Se connecter</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    