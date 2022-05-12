<?php

include './classes/post.class.php';
$posts=new Posts();
if(isset($_POST['submit'])){
$title= $_POST['title'];
$body= $_POST['body'];
$author= $_POST['author'];
$posts->addPost($title,$body,$author);
}

else if($_GET['send']=="delete"){

    $id=$_GET['id'];
    $posts->deletePost($id);
}
else if(isset($_POST['update'])){
    $id=$_GET['id'];
    $title= $_POST['title'];
    $body= $_POST['body'];
    $author= $_POST['author'];
    $posts->updatePost($id,$title,$body,$author);
}
?>