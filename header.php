<div class="te-push">
    <nav id="navbar" class="navbar is-p" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php">
                <?php
                    require 'assets/type-evolved.svg';
                ?>
                 </a>

            </div>
            <div id="nav-menu" class="navbar-menu is-active">
                <div class="navbar-end">
                <?php
                    if (isset($_SESSION["username"])) {
                        echo '
                            <div class="navbar-item">
                                <div class="buttons">
                                    <a class="button is-primary" href="account.php">My Account</a>                           
                                    <form action="includes/logout.inc.php" method="post">
                                        <input type="submit" class="button" name="logout-submit" value="Log Out">
                                    </form>
                                </div>
                            </div>
                        ';
                    } else {
                        echo '
                            <div class="navbar-item">
                                <div class="buttons">
                                    <a class="button is-primary" href="register.php">Register</a>
                                    <a class="button is-blue" href="login.php">Log In</a>
                                </div>
                            </div>              
                        ';
                    }
                ?>
                </div>
            </div>
        </div>
    </nav>




