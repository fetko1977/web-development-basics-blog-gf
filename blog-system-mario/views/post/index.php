<?php
foreach ($posts as $post) {
    ?>
<div class="row">
    <div class="container">
        <h1><?php echo $post['title']; ?></h1>
        <p><?php echo $post['content'];?></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: left;"><?php echo $post['date']; ?></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: right;"><?php echo $post['firstname'] . ' ' . $post['lastname']; ?></div>
    </div>
</div>
<?php
}

