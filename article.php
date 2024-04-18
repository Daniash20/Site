<?php include('db_connect.php');
if(isset($_REQUEST)){
    $id = intval($_REQUEST['id']);
    $sql = "select * from articles where id = $id";
    $result = mysqli_query($db, $sql);
    $myrow = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="<?php echo $myrow['metadescription'] ?>" />
    <meta name="keywords" content="<?php echo $myrow['metadescription'] ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/style.css" rel="stylesheet">
    <title><?php echo $myrow['title'] ?></title>
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
    <div class="post">
        <div class="post__info">
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
        </div>
        <div class="post__description">
            <p class="post__description-text">
                <?php echo $myrow["description"]?>
            </p>
            <p class="post__questions">
                <a href="questions.php?id=<?php echo $myrow["id"]?>" class="post__questions-link">Questions</a>
            </p>
        </div>
    </div>
        
    </main>
    <footer class="footer">
        <div class="footer__menu">
            <p class="footer__college">ET Avtomatika</p>
            <p class="footer__email">danil.sheshukov@bk.ru</p>
        </div>
    </footer>
</body>
</html>