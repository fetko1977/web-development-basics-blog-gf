<div class="row">
    <div class="container">
<?php
foreach ($post as $selected_post) {
?>
        <h1 class="post-title"><?php echo $selected_post['title']; ?></h1>
        <p><?php echo $selected_post['content'];?></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: left;"><?php echo date("d/m/Y", strtotime($selected_post['date']));?></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: right;"><a href="<?php echo ROOT_URL . 'admin/post/edit/' . $selected_post['id']; ?>" class="btn btn-danger">Edit Post</a></div>
    
<?php 
}
?>
        </div>
</div>

