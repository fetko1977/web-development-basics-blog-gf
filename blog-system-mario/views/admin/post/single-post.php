<div class="row">
    <div class="container">
<?php
foreach ($post as $selected_post) {
?>
        <h1 class="post-title"><?php echo $selected_post['title']; ?></h1>
        <p><?php echo $selected_post['content'];?></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: left;"><?php echo date("d/m/Y", strtotime($selected_post['date']));?></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: right;">
            <a href="<?php echo ROOT_URL . 'admin/post/edit/' . $selected_post['id']; ?>" class="btn btn-danger">Edit Post</a>
            <a href="<?php echo ROOT_URL . 'admin/post/delete/' . $selected_post['id']; ?>" class="btn btn-warning">Delete Post</a>
        </div>
    
<?php 
}
?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comments-wraper">
            <?php 
                if( count( $post_comments ) > 0){
                    //var_dump($post_comments);
                    foreach ($post_comments as $comment) {
                        $comment_date = $comment['date'];
                        $comment_date_value= date('Y/m/d', strtotime($comment_date));
            ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-item">
                    <div class="comment-item-header">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><?php echo $comment['firstname'] . ' ' . $comment['lastname']; ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p><?php echo $comment_date_value; ?></p>
                        </div>
                    </div>
                    <div class="comment-item-content">
                        <p><?php echo $comment['content']; ?></p>
                    </div>
                    <div class="comment-item-footer">
                        <a href="<?php echo ROOT_URL . 'admin/comment/edit/' . $comment['id']; ?>" class="btn btn-danger">Edit Comment</a>
                        <a href="<?php echo ROOT_URL . 'admin/comment/delete/' . $comment['id']; ?>" class="btn btn-warning">Delete Comment</a>
                    </div>
                </div>
            <?php
                    }
                }
            ?>
        </div>
        </div>
</div>

