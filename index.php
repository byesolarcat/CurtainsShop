<?php require 'src/db.php';
session_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <title>Магазин штор</title>
</head>

<body>
    <?php require 'src/header.php'; ?>
    <div class="lal">
        <div class="news_11">
            <div class="sidebar">
                <div class="menu_1">
                    <h1>Каталог</h1>
                    <ul>
                        <li class="left-menu-spisok"><a class="linker" href="items.php?category=1"> Тюль </a> </li>
                        <li class="left-menu-spisok"><a class="linker" href="items.php?category=2"> Ночные шторы</a></li>
                        <li class="left-menu-spisok"><a class="linker" href="items.php?category=3"> Карнизы</a></li>
                        <li class="left-menu-spisok"><a class="linker" href="items.php?category=4"> Аксессуары</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-block">
                <main>
                    <h1 class="sale">Скидка 20% на тюли</h1>
                    <div class="slider">
                        <div class="sld sld1"></div>
                        <div class="sld sld2"></div>
                        <div class="sld sld3"></div>
                    </div>
                </main>
                <?php
                if (!isset($_COOKIE['userphone'])) echo '
                <div class="side">
                    <form class="vhod" action="src/user/login.php" method="POST">
                        <h1 class="rega">Вход:</h1>
                        <div class="group">
                            <label for="number">Телефон:</label>
                            <input type="text" name = "number" require>
                        </div>
                        <div class="group">
                            <label for="pass">Пароль :</label>
                            <input type="password" name = "pass" require>
                        </div>

                        <div class="group">
                            <button type = "submit">Войти</button>
                        </div>
                    </form>

                    <form class="rega_1" action="src/user/register.php" method="POST">
                        <h1 class="rega">Регистрация:</h1>
                        <div class="group">
                            <label for="number">Телефон:</label>
                            <input type="text" name = "number" required>
                        </div>
                        <div class="group">
                            <label for="pass">Пароль :</label>
                            <input type="password" name = "pass" required>
                        </div>
                        <div class="group">
                            <label for="email">Адрес электронной почты:</label>
                            <input type="email" name = "email" required>
                        </div>
                        <div class="group">
                            <label for="pass">Имя :</label>
                            <input type="text" name = "name" required>
                        </div>
                        <div class="group">
                            <button type = "submit">Регистрация</button>
                        </div>
                    </form>
                </div>';
                else echo '<div class="side">
                <h1 class="rega">Добро пожаловать, ' . $_COOKIE['username'] . '</h1>
                
                    <div class="group">
                        <form class="vhod" action="src/user/logout.php">
                            <button type = "submit">Выйти из аккаунта</button>
                        </form>
                        <form class="vhod" action="src/items/edititem.php" method = "GET">
                            <input type = "hidden" name = "action" value = "add">
                            <button type = "submit">Добавить товар</button>
                        </form>
                    </div>
                </div>';
                ?>
            </div>
            <div class="product-main">
                <div class="product-item">
                    <img src="/img/items/acc1.jpg">
                    <div class="product-list">
                        <h3>Аксессуары</h3>
                        <span class="price">от 600 Р</span>
                        <a href="items.php?category=4" class="button">Смотреть еще</a>
                    </div>
                </div>
                <div class="product-item">
                    <img src="/img/items/karniz1.jpg">
                    <div class="product-list">
                        <h3>Карнизы</h3>
                        <span class="price">от 1200 Р</span>
                        <a href="items.php?category=3" class="button">Смотреть еще</a>
                    </div>
                </div>
                <div class="product-item">
                    <img src="/img/items/shtora1.jpg">
                    <div class="product-list">
                        <h3>Ночные шторы</h3>
                        <span class="price">от 1999 Р</span>
                        <a href="items.php?category=2" class="button">Смотреть еще</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="content"></div>
        </div>
    </div>
</body>

</html>