<?php
include './classes/dbconnect.class.php';
include './classes/post.class.php';
require_once('./templates/header.php');



?>
<!-- Button trigger modal -->
<button type="button" class="my-5 btn btn-primary" data-toggle="modal" data-target="#addPostModal">
 Create a post
</button>

<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPostModalLabel">Add new post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- form -->

        <form action="post.process.php" method="post">
            <div class="form-group">
                <label >Title</label>
                <input class="form-control" type="text" name="title" required>
            </div>
            <div class="form-group">
                <label >Body</label>
                <input class="form-control" type="text" name="body" required>
            </div>
            <div class="form-group">
                <label >Author</label>
                <input class="form-control" type="text" name="author" required>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">save</button>
      </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>

<div class="row">

<?php  $posts= new Posts(); ?>
<?php  if($posts->getPosts()) : ?>
<?php  foreach($posts->getPosts() as $post): ?>
    <div class="col-md-6 my-4">
        <div class="card">
            <div class="card-body">

           
            <h5 class="card-title"><?= $post['title']?></h5>
            <p class="card-text"> <?= $post['body']?> </p>
            <h6 class="card-subtitle text-right text-muted"><?= $post['author']?></h6>
            <a href="editForm.php?id=<?=$post['id']?>" class="btn btn-warning">Edit</a>
            <a href="post.process.php?id=<?=$post['id'] ?>&send=delete" class="btn btn-danger">Delete</a>
            </div>
        </div>

     
    </div>       
            
<?php endforeach?>

</div>
<?php else: ?>
    <p>no post available</p>
 <?php endif ?>  
<?php

require_once('./templates/footer.php')

?>