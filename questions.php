<?php include("db_connect.php");
if(isset($_REQUEST["id"])){
    $id = intval($_REQUEST['id']);
    $sql = "SELECT * FROM articles WHERE id = '$id'";
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'my_site'), $sql);
    $article = mysqli_fetch_array($result);
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
    <title><?php echo $article['title'] ?></title>
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
        <table class="post">
            <tr>
                <td class="post__info">
                    <p class="post__title">
                        <b><a href="article.php?id=<?php echo $article["id"]?>" class="post__link">
                        <?php echo $article["title"] ?>
                        </a></b>
                    </p>
                    <p class="post__date-created">
                        Date created: <br><?php echo $article["date_created"] ?>
                    </p>
                    <p class="post__author">
                        Author: <?php echo $article["author"] ?>
                    </p>
                </td>
                <td class="post__description">
                    <?php echo $article["description"]?>
                </td>
            </tr>
        </table>
        <?php 
         if($_SESSION['auth'] == 1){
            $name = $_SESSION['name'];
            $id = $article['id'];
            $req = mysqli_fetch_array(mysqli_query($db, "SELECT count(*) as cnt FROM my_site.test_resultation WHERE name = '$name' AND test_num = '$id'"));
            if($req['cnt'] == '0'){ ?>
            <form action="check_answers.php" class="questions" method="post">
            <?php 
            $sql = "SELECT * FROM my_site.questions WHERE article_id = '$id'";
            $result = mysqli_query($db, $sql);
            while($questions = mysqli_fetch_array($result)) {
                $questions["answer"] = explode("|", $questions['answer']); ?>

                <div class="question">

                    <h4 class="question__text"><?php echo $questions['quest'] ?> </h4>

                <?php
                    foreach($questions['answer'] as $number => $answer) {
                        $number1 = $number + 1; 
                    ?>
                    
                        <label>
                            <p class="answer">
                            <input type="radio"
                            class="answer__input"
                            name="answer_<?php echo $questions['id']; ?>"
                            value="<?php echo $number1?>"
                            >
                            <?php echo $answer ?>
                            </p>
                        </label>

                <?php } ?>
                </div>
            <?php } ?>
        </div>
                <p><input type="submit" name="button" value="Submit" class="question__btn"></p>
                <input type="hidden" name="id" value="<?php echo $article["id"] ?>">
        </form>
        <?php } 
        else if ($req['cnt'] != '0') {
            $id = $article['id'];
            $req = mysqli_fetch_array(mysqli_query($db, "SELECT resultation FROM my_site.test_resultation WHERE name = '$name' AND test_num = '$id'"));
            ?>
            <p class='resultation__result'>Вы уже проходили этот тест с результатом: <?php echo $req['resultation'] ?>%</p>
        <?php } 
        }?>
    </main>
    <footer class="footer">
        <div class="footer__menu">
            <p class="footer__college">ET Avtomatika</p>
            <p class="footer__email">danil.sheshukov@bk.ru</p>
        </div>
    </footer>
</body>
</html>