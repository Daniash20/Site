<?php include("db_connect.php");
if(isset($_REQUEST["id"])){

    $id = intval($_REQUEST['id']);
    $count = mysqli_fetch_array(mysqli_query($db, "SELECT count(*) as cnt FROM my_site.questions WHERE article_id = '$id'")); //счетчик вопросов
    $sql = "SELECT * FROM articles WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $article = mysqli_fetch_array($result);

    $sql = "SELECT * FROM my_site.questions WHERE article_id='$id'";
    $result = mysqli_query($db, $sql);
    $verno = 0;
    $neverno = 0;
    while($questions = mysqli_fetch_array($result)){
        if($questions['correct'] == $_POST['answer_'.$questions['id']]){
            $verno++;
        }
    }
    $itog = ($verno / $count['cnt'])*100;

    $id = $_POST['id'];
    $name = $_SESSION['name'];
    mysqli_query($db, "INSERT INTO test_resultation (name, resultation, test_num) VALUES ('$name', '$itog', '$id')");
}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="<?php echo $article['metadescription'] ?>" />
    <meta name="keywords" content="<?php echo $article['metadescription'] ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style/style.css" rel="stylesheet">
    <title>Результат знаний. Тема: <?php $article['title'] ?></title>
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
        <div class="resultation">
            <h2 class="resultation"><?php if($_SESSION['auth'] == 1) echo $_SESSION['name']. ", " ?> Ваши результаты </h2>
            <p class="resultation__quantity">Количество вопросов: <b><?php echo $count['cnt'] ?></b></p>
            <p class="resultation__answer">Количество верных ответов: <b><?php echo $verno ?></b></p>
            <p class="resultation__result">Результат: <b><?php echo $itog ?>%</b></p>
        </p>
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
