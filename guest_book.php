<?php include('db_connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/style.css" rel="stylesheet" type="text/css">
    <title>Guest book: place for discussion</title>
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
        <h1 class="title">Guest book: place for discussion</h1>
        <?php 
        $sql = "SELECT * FROM guest_book ORDER BY date_created DESC";
        $result = mysqli_query($db, $sql);
        while ($myrow = mysqli_fetch_array($result)) { ?>
        <div class="post">
            <div class="post__info">
                <p class="post__author">
                    <b><?php echo $myrow['name'] ?></b>
                </p>
                <p class="post__contact">
                    <?php echo $myrow['email'] ?>
                </p>
                <p class="post__date">
                    <?php echo $myrow['date_created'] ?>
                </p>
            </div>
            <p class="post__message"><?php echo $myrow['message'] ?></p>
            <div class="delete__btn"><a href="guest_book_handler.php?task=delete&id=<?php echo $myrow['id'] ?>" class="delete__link" id="delete">x</a></div>
        </div>
        <?php } ?>
        <form action="guest_book_handler.php?task=send" method="post" class="form">
            <p class="form__name"><input type="text" name="name" class="input__name form__input"></p>
            <p class="form__email"><input type="email" name="email" class="input__email form__input"></p>
            <p class="form__message"><textarea name="message" class="input__message form__input" rows="5" cols="30" ></textarea></p>
            <button class="form__btn btn" name="submit">Submit</button>
        </form>
    </main>
    <footer class="footer">
        <div class="footer__menu">
            <p class="footer__college">ET Avtomatika</p>
            <p class="footer__email">danil.sheshukov@bk.ru</p>
        </div>
    </footer>
</body>
</html>