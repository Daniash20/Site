<?php include('db_connect.php'); ?>
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
        <?php 
            $sql = "SELECT * FROM articles";
            $result = mysqli_query($db,$sql);
            while($myrow = mysqli_fetch_array($result)){
        ?>
        <table class="post">
            <tr>
                <td class="post__info">
                    <p class="post__title">
                        <b><a href="article.php?id=<?php echo $myrow["id"]?>" class="post__link">
                        <?php echo $myrow["title"] ?>
                        </a></b>
                    </p>
                    <p class="post__date-created">
                        Date created: <br><?php echo $myrow["date_created"] ?>
                    </p>
                    <p class="post__author">
                        Author: <?php echo $myrow["author"] ?>
                    </p>
                </td>
                <td class="post__description">
                    <?php echo $myrow["description"]?>
                </td>
            </tr>
        </table>
                <?php } ?>
    </main>
    <footer class="footer">
        <div class="footer__menu">
            <p class="footer__college">ET Avtomatika</p>
            <p class="footer__email">danil.sheshukov@bk.ru</p>
        </div>
    </footer>
</body>
</html>