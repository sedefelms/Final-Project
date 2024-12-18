<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>  
    <style>
        * {
            box-sizing: border-box;
        }
        .main-header {
            background-color: #03254c;
            padding: 8px 16px;
        }
        .main-nav {
            display: inline-block;
            width: calc(100% - 110px);
            text-align: right;
        }
        .main-nav__items {
            margin: 0;
            list-style: none;
        }
        .main-nav__item {
            display: inline-block;
            margin: 0 10px;
        }
        .main-header__logo {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 22px;
        }
        .main-nav__item a {
            text-decoration: none;
            color: #fff;
            border-radius: 10px;
            display: inline-block;
            width: 125%;
            height: 200%;
            padding: 5px 5px;
            text-align: center;
            border: 2px solid #03254c;  
        }
        .main-nav__item input{
            text-decoration: none;
            color: #fff;
            border-radius: 10px;
            display: inline-block;
            width: 125%;
            height: 200%;
            padding: 5px 5px;
            text-align: center;
            border: 2px solid #03254c;  
            cursor: pointer;
        }
        .main-nav__item a:hover, .main-nav__item:hover::before, .main-nav__item input:hover{
            color: #2E4C6D;
            background-color: #fff;
        }
        .main-nav__item:active::before, .main-nav__item a:active, .main-nav__item input:active{
            color: #fff;
            background-color: #2E4C6D;
        }
        .main-nav__item::before {
            /* content: '\2022'; */
            color: #fff;
        }
        .main-nav__item--login input {
            color: #fff;
            background-color:#2E4C6D;
            border: 2px solid #fff;            
        }
        .main-nav__item--login a:hover {
            color: #2E4C6D;
            border-color:#2E4C6D;
            background-color: #fff;
        }
    </style>
</head>
<header class="main-header">
    <form action="giris-yap.php" method="post">
        <a href="#" class="main-header__logo">Uygulama</a>
        <nav class="main-nav">
            <ul class="main-nav__items">
                <li class="main-nav__item"><a href="home1.php">Anasayfa</a></li>
                <li class="main-nav__item"><a href="deneme.php">Profil</a></li>
                <li class="main-nav__item main-nav__item--login">
                    <input type="submit" name="cikis-yap" value="Çıkış Yap">
                </li>
            </ul>                       
        </nav>
    </form>
    </header>
    <?php
    global $user_id;
    $user_id = $_SESSION['id'];
    if(isset($_POST['cikis-yap'])){
        session_destroy();
    }
    ?>
