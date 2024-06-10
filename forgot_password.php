<?php include('header.php'); ?>
</div>
<div class="content">
    <div class="wrap">
        <div class="content-top" style="min-height:300px;padding:50px">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Forgot Password</div>
                    <div class="panel-body">
                        <?php include('msgbox.php'); ?>
                        <p class="login-box-msg">Enter your email, new password, and verification code to reset your password</p>
                        <form action="process_reset_password.php" method="post">
                            <div class="form-group has-feedback">
                                <input name="email" type="email" size="25" placeholder="Email" class="form-control" required />
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input name="new_password" type="password" size="25" placeholder="New Password" class="form-control" required />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input name="confirm_password" type="password" size="25" placeholder="Re-enter New Password" class="form-control" required />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input name="verification_code" type="text" size="25" placeholder="Verification Code" class="form-control" required />
                                <!-- Code to send verification code to user's email will be added -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" href="login.php">Reset Password</button>

                                <p class="login-box-msg" style="padding-top:20px">Remember your password? <a href="login.php">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>

    </div>
    <?php include('footer.php'); ?>
</div>
