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
            <a href="<?php echo $this->is_logged_in ? ROOT_URL . 'admin/admin/' : ROOT_URL . 'index.php'; ?>" class="navbar-brand">Blog System Softuni</a>
            
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo ROOT_URL; ?>post/index">Posts</a></li>
                <?php 
                    if ( empty( $this->logged_user )) {
                ?>
                <li><a href="<?php echo ROOT_URL; ?>login/index">Login</a></li>
                <li><a href="<?php echo ROOT_URL; ?>register/index">Register</a></li>
                <?php    
                    } else {
                ?>
                <li><a href="<?php echo ROOT_URL; ?>login/logout/">Logout</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
      </div>
    </div>
      <div class="container">
          <div class="current-user-bar">
              <?php echo $this->is_logged_in ? 'Logged in as: ' . $this->logged_user['username'] : ''; ?>
          </div>
      </div>

