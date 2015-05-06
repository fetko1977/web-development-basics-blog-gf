<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="<?php echo ROOT_URL; ?>css/lib/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo ROOT_URL; ?>css/bootswatch.min.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?php echo ROOT_URL; ?>css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <a href="<?php echo ROOT_URL; ?>index.php" class="navbar-brand">Blog System Softuni</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse col-lg-8" id="navbar-main">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo ROOT_URL; ?>login/index">Login</a></li>
                <li><a href="">Register</a></li>
            </ul>
        </div>
            <?php 
                if (!empty( $this->logged_user )) {
            ?>
          <div class="current-user col-lg-4"><?php echo 'Logged in as: ' . $this->logged_user['username'];?>
            <a href="<?php echo ROOT_URL; ?>login/logout/">[Logout]</a>
          </div>
            <?php    
                }
            ?>
      </div>
    </div>

