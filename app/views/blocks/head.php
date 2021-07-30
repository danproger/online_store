<!doctype html>
<html lang="ru">
    <head>
        <!-- BASE META -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- ADDITIONAL META -->
        <?php if (!isset($data['meta-desc'])) { $data['meta-desc'] = "Интернет-магазин"; } ?>
        <meta name="description" content="<?= $data['meta-desc']; ?>">

        <!-- STYLES -->
        <link rel="icon" href="/public/img/icon.ico">
        <link rel="stylesheet" href="/public/css/bt5/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/public/css/main.css" type="text/css">
        <link rel="stylesheet" href="/public/css/form.css" type="text/css">

        <!-- FONTS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">

        <?php if (!isset($data['title'])) { $data['title'] = "Интернет-магазин"; } ?>
        <title><?= $data['title']; ?></title>
    </head>
    <body>
        <header class="pb-3">
            <div class="q-bg-d">
                <div class="container">
                    <div class="d-flex flex-column text-center text-uppercase flex-md-row justify-content-md-between py-2 top-menu">
                        <div>
                            <a href="/" class="mx-2 q-link">Главная</a>
                            <span> | </span>
                            <a href="/contacts" class="mx-2 q-link"> Контакты</a>
                            <span class="d-none d-sm-inline"> | </span><br class="d-inline d-sm-none">
                            <a href="/contacts/about" class="mx-2 q-link"> Про нас</a>
                        </div>
                        <div class="tel">
                            <i class="fas fa-phone"></i> +38(000)-000-00-00
                        </div>
                    </div>
                </div>
            </div>
            <div class="q-bg-l">
                <div class="container">
                    <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center middle-menu">
                        <div class="d-flex flex-column flex-md-row align-items-center text-center text-md-start justify-content-md-between">
                            <img class="logo" src="/public/img/red-k.svg" alt="LOGO">
                            <h1 class="d-block"><b>Мы знаем, чего вы хотите!</b></h1>
                        </div>
                        <div class="d-flex flex-column auth-basket-block my-3 my-md-0">
                            <a href="/basket" class="mb-1">
                                <button class="q-btn q-btn-ol-w w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                    Корзина
                                    <?php
                                        require_once "app/models/Basket.php";
                                        $basket = new Basket();
                                    ?>
                                    <b>(<span class="basket-amount"><?= $basket->countItems(); ?></span>)</b>
                                </button>
                            </a>
                            <?php if (isset($_COOKIE['logged']) && $_COOKIE['logged'] != ""): ?>
                                <a href="/user/dashboard">
                                    <button class="q-btn q-btn-ol-k">
                                        Кабинет пользователя
                                    </button>
                                </a>
                            <?php else: ?>
                                <div class="d-flex flex-row justify-content-between">
                                    <a href="/user/auth">
                                        <button class="q-btn q-btn-k">
                                            Войти
                                        </button>
                                    </a>
                                    <pre> </pre>
                                    <a href="/user/reg" class="ml-1">
                                        <button class="q-btn q-btn-ol-k">
                                            Регистрация
                                        </button>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="cat-menu">
                    <ul class="rounded d-flex flex-column flex-md-row text-center justify-content-md-around p-0">
                        <li class="cat-menu-item py-2 w-100"><a class="q-link" href="/categories/1">Все товары</a></li>
                        <li class="cat-menu-item py-2 w-100"><a class="q-link" href="/categories/footwear">Обувь</a></li>
                        <li class="cat-menu-item py-2 w-100"><a class="q-link" href="/categories/hats">Головные уборы</a></li>
                        <li class="cat-menu-item py-2 w-100"><a class="q-link" href="/categories/shirts">Футболки</a></li>
                        <li class="cat-menu-item py-2 w-100"><a class="q-link" href="/categories/watches">Часы</a></li>
                    </ul>
                </div>
            </div>
        </header>