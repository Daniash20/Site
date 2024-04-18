<?php 
include('db_connect.php'); 
if(isset($_GET["task"])) { 
    $task = $_GET["task"];
}
switch ($task) {
    default: 
    case "send":
        sendMessage();
        break;
        case "delete":
            deleteMessage();
            break;
}
function sendMessage(){
    $name = addslashes($_POST["name"]);
    $email = addslashes($_POST["email"]);
    $message = addslashes($_POST["message"]);
    $result = mysqli_query($db, "INSERT INTO guest_book (name, email, message, date_created) VALUES ('$name', '$email', '$message', NOW())");
    if($result){
        header("Location: guest_book.php");
        exit;
    }
}
function deleteMessage(){
    $id = $_GET['id'];
    $result = mysqli_query($db, "DELETE FROM guest_book WHERE id=$id");
    if($result){
        header("Location: guest_book.php");
        exit;
    }
}
function back(){
    $id = $_GET['id'];
    if($result){
        header("Location: guest_book.php#".$id);
        exit;
    }
}
?>