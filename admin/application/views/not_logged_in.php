<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <?php if ($auth->messages) : ?>
            <div class="alert alert-success" role="alert">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <?php 
                foreach ($auth->messages as $message) {
                    echo $message;
                }
                ?>
            </div>
            <?php endif; ?>

            <?php if ($auth->errors) : ?>
            <div class="alert alert-danger" role="alert">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <?php 
                foreach ($auth->errors as $errors) {
                    echo $errors;
                }
                ?>
            </div>
            <?php endif; ?>
            
            <form method="post" action="<?php echo ADMIN_URL; ?>/" name="loginform" class="bootstrap-admin-login-form">
                <h1>Login</h1>
                <div class="form-group">                    
                    <input id="login_input_username" class="form-control login_input" type="text" name="user_name" placeholder="Username/E-mail" required />
                </div>
                <div class="form-group">
                    <input id="login_input_password" class="form-control login_input" type="password" name="user_password" placeholder="Password" autocomplete="off" required />
                </div>                                
                <input type="submit" class="btn btn-lg btn-primary pull-right" name="login" value="Log in" />
            </form>
        </div>
    </div>
</div>



