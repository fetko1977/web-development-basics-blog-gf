<?php
foreach ($post as $selected_post) {
    ?>
<div class="row">
    <div class="container">
        <h1><?php echo $selected_post['title']; ?></h1>
        <p><?php echo $selected_post['content'];?></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: left;"><?php echo date("d/m/Y", strtotime($selected_post['date']));?></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: right;"><?php echo $selected_post['firstname'] . ' ' . $selected_post['lastname']; ?></div>
    </div>
</div>
<?php
}

