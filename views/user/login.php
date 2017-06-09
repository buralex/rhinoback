<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Logging in</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                        <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Log in" />
                    </form>
                    <h2><a href="/user/register">Register</a></h2>
                </div><!--/sign up form-->
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>