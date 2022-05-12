<?php
include './classes/dbconnect.class.php';
include './classes/post.class.php';
require_once('./templates/header.php');

$posts= new Posts();
$post= $posts->getPost($_GET['id']);
?>


<div class="container">
<form action="post.process.php?id=<?=$post['id']?>" method="post">
            <div class="form-group">
                <label >Title</label>
                <input class="form-control" type="text" name="title" value=<?= $post['title']?> required>
            </div>
            <div class="form-group">
                <label >Body</label>
                <input class="form-control" type="text" name="body" value=<?= $post['body']?>required>
            </div>
            <div class="form-group">
                <label >Author</label>
                <input class="form-control" type="text" name="author" required value=<?= $post['author']?>>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">update</button>
      </div>
        </form>
</div>
<?php

require_once('./templates/footer.php')

?>