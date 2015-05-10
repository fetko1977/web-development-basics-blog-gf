<div class="row">
    <div class="container">
        <p style="text-align: center;">
        <?php 
            if( isset( $_GET['success'] ) ) {
                echo "You register successfully! Use our login form to log in!";
            }
        ?>
        </p>
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
            <form role="form" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required />
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

