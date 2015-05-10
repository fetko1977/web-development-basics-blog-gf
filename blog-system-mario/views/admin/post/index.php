<div class="container">
        <article class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
<?php
//var_dump($posts);
foreach ($posts as $post) {    
?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<?php
    $post_date = $post['date'];
    $poat_date_value= date('Y/m/d', strtotime($post_date));
    ?>
        <a href="<?php echo ROOT_URL . 'admin/post/view/' . $post['id']; ?>">
            <h1 class="post-title"><?php echo $post['title']; ?></h1>
        </a>
        <p><?php echo $post['content'];?></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: left;"><?php echo $poat_date_value; ?></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align: right;"><?php echo $post['firstname'] . ' ' . $post['lastname']; ?></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comments-wraper">
<?php
}
?>
        </div>
</article>
<aside class="col-lg-4 col-md-4 col-sm-12- col-xs-12">
    <h1 class="tags-aside-title">Tags</h1>
    <?php 
        $tags = $this->model->get_all_tags();
        
        if( $tags != null ){
    ?>
    <ul class="tag-list">
    <?php
        foreach ($tags as $tag){
    ?>
        <li><?php echo $tag['name']; ?></li>
    <?php
        }
    ?>
    </ul>
    <?php
        }
        
        
    ?>
</aside>
</div>

