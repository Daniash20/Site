<?php
if(isset($_SESSION['name'])){
    $_SESSION['auth'] = 1;
} else {
    $_SESSION['auth'] = 0;
}
if(isset($_POST['name']) && isset($_POST['password'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $pass = md5($password);
    $sql = "SELECT name, password FROM my_site.users WHERE name = '$name'";
    $result = mysqli_query($db, $sql);
    $myrow = mysqli_fetch_array($result);
    $pas_res = $myrow['password'] ?? null;
    $pas_name = $myrow['name'] ?? null;
    if($pas_res == '' && $pas_name == ''){
        $result = mysqli_query($db, "INSERT INTO my_site.users (name, password) VALUES ('$name', '$pass')");
        $_SESSION['auth'] = 1;
        $_SESSION["name"] = $name;
    }
    else if($myrow['password'] == $pass && $myrow['name'] == $name){
        $_SESSION['auth'] = 1;
        $_SESSION["name"] = $name;
    } else {
        $_SESSION['auth'] = 2;
    }
} else {
    if(isset($_SESSION["name"])){
        $name = $_SESSION['name'];
        $auth = $_SESSION['auth'];
    }
}

switch($_SESSION['auth']){
    case 0:
    ?>
    <form method="post" class="auth">
        <input type="text" name="name" class="auth__input auth__login-input"  placeholder="Login"/>
        <input type="password" name="password" class="auth__input auth__password-input"  placeholder="Password"/>
        <input type="submit" value="Join" class="auth__login" />
    </form>  
    <?php
    break;
    case 1:
    ?> 
        <div class="user">
            <p class="user__name">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
            <p class="user__logout"><a href="logout.php">Logout</a></p>
        </div>
        <?php 
    break;
    case 2:
    ?>
    <form method="post" class="auth">
        <p class="auth__incorrect">Incorrect password</p>
        <input type="text" name="name" class="auth__input auth__login-input"  placeholder="Login"/>
        <input type="password" name="password" class="auth__input auth__password-input"  placeholder="Password"/>
        <input type="submit" value="Join" class="auth__login" />
    </form>  
    <?php
    break;
    }
?>