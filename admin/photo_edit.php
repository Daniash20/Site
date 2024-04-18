<?php include('db_connect.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
} else { $id = mysqli_insert_id($db);}
?>
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
        <div class="photo">
            <?php if (isset($_GET['id'])) { ?>
            <?php 
            $sql = "SELECT * FROM photo WHERE id = '$id'";
            $result = mysqli_query($db, $sql);
            while($myrow = mysqli_fetch_array($result)){?>
            <form action="photos_handler.php?task=edit&id=<?php echo $id ?>" class="edit" enctype="multipart/form-data" method="post">
            
            <p class="subtitle">Name</p>
            <input type="text" name="name" class="edit__name" placeholder ="<?php echo $myrow['name'] ?>">
            
            <p class="subtitle">Image</p>
            <img src="../photos/<?php echo $myrow['name_file']?>" alt="<?php echo $myrow['name']?>" class="edit__photo">
            <input type="file" name="filename" class="edit_file">

            <p class="subtitle">Published</p>
            <label><input type="radio" name="published" value="1" class="edit__radio" <?php if($myrow['published'] == 1) echo "checked";?>>Yes</label>
            <label><input type="radio" name="published" value="0" class="edit__radio"  <?php if($myrow['published'] == 0) echo "checked";?>>No</label>

            <input type="submit" name="submit" class="edit__submit">
            </form>
            <?php }?>
        <?php } else {?>
        <form action="photos_handler.php?task=new" method="post" enctype="multipart/form-data" class="edit">
            <p class="subtitle">Name</p>
            <input type="text" name="name" class="edit__name" placeholder ="name">
            
            <p class="subtitle">Image</p>
            <input type="file" name="filename" class="edit_file">

            <p class="subtitle">Published</p>
            <label><input type="radio" name="published" value="1" class="edit__radio" checked>Yes</label>
            <label><input type="radio" name="published" value="0" class="edit__radio" >No</label>

            <input type="submit">
        </form>
        <?php } ?>
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