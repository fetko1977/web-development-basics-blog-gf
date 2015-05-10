<div class="row">
    <div class="container">
<?php
foreach ($post as $selected_post) {
?>
        <h1 class="post-title"><?php echo $selected_post['title']; ?></h1>
        <p style="text-align: right;"><?php echo 'Views: ' . $counter; ?></p>
        <p><?php echo $selected_post['content'];?></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: left;"><?php echo date("d/m/Y", strtotime($selected_post['date']));?></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: right;"><?php echo $selected_post['firstname'] . ' ' . $selected_post['lastname']; ?></div>
    
<?php 
}
?>
        </div>
</div>
<div class="row">
    <div class="container">
        <p class="comment-label">Please leave a comment.</p>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <form role="form" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" name="firstname" required />
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" name="lastname" required />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="content">Comment:</label>
                    <textarea type="text" class="form-control" name="content" required /></textarea>
                </div>
                
            <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comments-wraper">
            <?php 
                if( count( $post_comments ) > 0){
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
                    <p><?php echo $comment['content']; ?></p>
                </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

