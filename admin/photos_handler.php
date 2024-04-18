<?php include('db_connect.php');
$db = mysqli_connect('localhost', 'root', '', 'my_site');
// edit, new, post, delete
if(isset($_GET['task'])){
    $task = $_GET['task'];
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
switch($task){
    case 'edit': 
        edit($id);
        break;
    case 'new':
        newPost();
        break;
    case 'delete': 
        deletePost($id);
        break;
    case 'post':
        post($id);
        break;
}
// name, published, file 
function edit($id){
    $db = mysqli_connect('localhost', 'root', '', 'my_site');
    $id = $_GET['id'];
    $name = $_POST['name'];
    $res = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM photo WHERE id = '$id'"));
    $db_name = $res['name'];
    if($name == ''){
        $name = $db_name;
    }
    $published = $_POST['published'];

    if($_FILES['filename']['name'] != ''){
        $file_name = $_FILES['filename']['tmp_name'];
        $dir = '../photos/'.$_FILES['filename']['name'];
        $file =  $_FILES['filename']['name'];
        unlink("../photos/".$res['name_file']);
        move_uploaded_file($_FILES['filename']['tmp_name'], $dir);
        $sql = "UPDATE photo SET name_file = '$file', name = '$name', date = NOW(), published = '$published' WHERE id = '$id'";
        mysqli_query($db, $sql);
    } else {
            $sql = "UPDATE photo SET name = '$name', date = NOW(), published = '$published' WHERE id = '$id'";
            mysqli_query($db, $sql);
    }
    header('location: photos.php');
    exit;
}
function newPost(){
    $db = mysqli_connect('localhost', 'root', '', 'my_site');
    $name = $_POST['name'];
    $published = $_POST['published'];
    $file = $_FILES['filename']['name'];
    $filename = $_FILES['filename']['tmp_name'];
    move_uploaded_file($filename, "../photos/".$file);
    $sql = "INSERT INTO photo (name, published, date, name_file) VALUES ('$name', '', NOW(), '$file')";
    mysqli_query($db, $sql);
    header('location: photos.php');
    exit;
}
function deletePost($id){
    $sql = "SELECT * FROM photo WHERE id = '$id'";
    $db = mysqli_connect('localhost', 'root', '', 'my_site');
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);
    $toDel = $row['name_file'];
    unlink("../photos/".$toDel);
    mysqli_query($db, "DELETE FROM photo WHERE id = '$id'");
    header('location: photos.php');
    exit;
}
function post($id){
    $db = mysqli_connect('localhost', 'root', '', 'my_site');
    $row = mysqli_fetch_array(mysqli_query($db, "SELECT published FROM photo WHERE id = '$id'"));
    $published  = $row['published'];
    if($published == '0'){
        mysqli_query($db, "UPDATE photo SET published = '1' WHERE id = '$id'");
    }
    if($published == '1'){
        mysqli_query($db, "UPDATE photo SET published = '0' WHERE id = '$id'");
    }
    header('location: photos.php');
    exit;
}