<?php //var_dump($post); ?>
<div class="row">
    <div class="container">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
            <form role="form" method="POST">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value="<?php echo addslashes($post['title']); ?>">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" name="content"><?php echo addslashes($post['content']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>