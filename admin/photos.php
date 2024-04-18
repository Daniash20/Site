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
            <a href="photo_edit.php">Добавить новую запись</a>
            <div class="value">
                <p class="photo__id">ID</p>
                <p class="photo__name-table">Name</p>
                <p class="photo__img">Photo</p>
                <p class="photo__date">Date</p>
                <p class="photo__edit">Edit</p>
            </div>
            <?php 
            $sql = "SELECT * FROM photo";
            $result = mysqli_query($db, $sql);
            while($myrow = mysqli_fetch_array($result)){
            ?>
            <div class="photo" name="<?php echo $myrow['id'] ?>">
                <p class="photo__id"><?php echo $myrow['id']; ?></p>
                <input class="photo__name" value="<?php echo $myrow['name']?>" name="name">
                <img src="../photos/<?php echo $myrow['name_file']?>" alt="<?php echo $myrow['name']?>" class="photo__img">
                <p class="photo__date"><?php echo $myrow['date'] ?> </p> 
                <div class="photo__edit">
                    <a href="photos_handler.php?id=<?php echo $myrow['id']?>&task=delete"><button class="photo__delete">x</button></a>
                    <?php if($myrow['published'] == '1') {?>
                    <a href="photos_handler.php?id=<?php echo $myrow['id']?>&task=post"><button class="photo__status">✓</button></a>
                    <?php } else {?>
                    <a href="photos_handler.php?id=<?php echo $myrow['id']?>&task=post"><button class="photo__status">x</button></a>
                    <?php } ?>
                    <a href="photo_edit.php?id=<?php echo $myrow['id'] ?>"><button><img src="assets/img/rename.png" class="rename__img"></button></a>
               </div>
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