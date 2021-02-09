<?php
    require 'head.php';
    require 'header.php';
    require 'includes/dbc.inc.php'
?>
<section class="section te-padding">
    <div class="container">
        <div class="card te-form">
            <div class="te-formtitle">Log In</div>
            <div class="card-content">
                <form id="login-form" action="includes/login.inc.php" method="post">
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="text" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <br>
                    <div class="field">
                        <input class="input button is-medium is-fullwidth is-link" type="submit" name="login-submit" value="Log In">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require 'scripts.php';
    require 'footer.php';
?>
