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
        <div class="photos">
            <?php 
            $sql = "SELECT * FROM photo WHERE PUBLISHED = '1'";
            $result = mysqli_query($db, $sql);
            while($myrow = mysqli_fetch_array($result)){
            ?>
            <div class="photo">
                <img src="photos/<?php echo $myrow['name_file']?>" alt="<?php echo $myrow['name']?>" class="photo__img">
                <p class="photo__name"><?php echo $myrow['name']?></p>
            </div>
            <?php }?>
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
