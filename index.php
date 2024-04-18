<?php include('db_connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/style.css" rel="stylesheet">
    <title>My Site</title>
</head>
<body>
    <header class="header">
        <div class="header__container">
            <h2 class="header__title">MY SITE</h2>
            <p class="header__fio">developer: Sheshukov Danil</h3>
            <p class="header__group">group: ISP 420/V</h3>
        </div>
        <?php include('menu.php'); ?>
    </header>
    <main class="main">
        <h1 class="title">
            Для чего стоит посетить этот сайт?
        </h1>
        <p class="text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, eos illo. Temporibus, ipsa optio animi molestias totam nihil natus sapiente repudiandae consequuntur aliquid nam modi inventore quis et harum doloremque!
            Accusamus ipsa delectus sint, at eaque vel atque explicabo natus labore dolorum sunt dolorem fugiat aliquid velit inventore exercitationem temporibus rerum suscipit dignissimos reprehenderit iste optio cum. Cupiditate, laboriosam quia.
            Ex, est sapiente ratione, consequatur suscipit architecto porro eveniet nam necessitatibus dolorem dignissimos quia earum cum odit illum reprehenderit neque placeat voluptatem veritatis quaerat et, odio praesentium saepe. Dolorum, iure.
        </p>
    </main>
    <footer class="footer">
        <div class="footer__menu">
            <p class="footer__college">ET Avtomatika</p>
            <p class="footer__email">danil.sheshukov@bk.ru</p>
        </div>
    </footer>
</body>
</html>