<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <p class="site">www.Pak_Quiz.com</p>
                        <p class="num">Call: +92 307 715 4686</p>
                        <ul class="fh5co-social">
                            <li><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li><a href="#"><i class="icon-twitter2"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble2"></i></a></li>
                            <li><a href="#"><i class="icon-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="index.php"><i class="icon-study"></i>Pak_Quiz<span>.</span></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) : ?>
                                <?php if ($_SESSION['role'] == 'admin') : ?>
                                    <li><a href="quiz_administration.php">Quiz Administration</a></li>
                                    <li><a href="user_administration.php">User Administration</a></li>
                                <?php else : ?>
                                    <li><a href="quiz.php">Quiz</a></li>
                                    <li><a href="quiz_history.php">Quiz_History</a></li>
                                <?php endif; ?>
                                <li class="btn-cta"><a href="logout.php"><span>Logout</span></a></li>
                            <?php else : ?>
                                <li class="btn-cta"><a href="login.php"><span>Login</span></a></li>
                                <li class="btn-cta"><a href="registration.php"><span>Create an Account</span></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>