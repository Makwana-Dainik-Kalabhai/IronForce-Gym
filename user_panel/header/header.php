<?php session_start(); ?>
<style>
    body {
        background-color: #111111;
    }
</style>
<script>
    $(document).ready(function() {
        $(".login-btn").click(function() {
            $(".form-slider").toggle(200);
        });
        $(".form-slider .fa-xmark").click(function() {
            $(".form-slider").toggle(200);
        });
    });
</script>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="fa fa-close"></i>
    </div>
    <div class="canvas-search search-switch">
        <i class="fa fa-search"></i>
    </div>
    <nav class="canvas-menu mobile-menu">
        <ul>
            <li><a href="<?php echo HTTP_PATH . "/index.php"; ?>">Home</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/about-us.php"; ?>">About Us</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php"; ?>">Classes</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>">Services</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/team.php"; ?> ">Our Team</a></li>
            <li><a href="#">Pages</a>
                <ul class="dropdown">
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/about-us.php"; ?> ">About us</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php"; ?>">Membership</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/bmi-calculator.php"; ?>">Bmi calculate</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/team.php"; ?>">Our team</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/gallery.php"; ?>">Gallery</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/blog/blog.php"; ?>">Our blog</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/404.php"; ?>">404</a></li>
                </ul>
            </li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/contact/contact.php"; ?>">Contact</a></li>
            <li><button class="btn primary-btn login-btn">Login</button></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="canvas-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo">
                    <a href="./index.php">
                        <img src="<?php echo HTTP_PATH . "/user_panel/logo.png"; ?>" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="nav-menu">
                    <ul>
                        <li class="active"><a href="<?php echo HTTP_PATH . "/index.php"; ?>">Home</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/about-us.php"; ?>">About Us</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php"; ?>">Membership</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>">Services</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/team.php"; ?>">Our Team</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/about-us.php"; ?>">About us</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php"; ?>">Classe Details</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/bmi-calculator.php"; ?>">Bmi calculate</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/team.php"; ?>">Our team</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/gallery.php"; ?>">Gallery</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/blog/blog.php"; ?>">Our blog</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/404.php"; ?>">404</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/contact/contact.php"; ?>">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <?php if (!isset($_SESSION["email"])) { ?>
                <div class="col-lg-2">
                    <nav class="nav-menu">
                        <ul>
                            <li><button class="btn login-btn primary-btn">Login</button></li>
                            <?php if (isset($_SESSION["email"])) { ?>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/notification/notification.php"; ?>"><i class="fa-solid fa-bell text-light" style="cursor: pointer;"></i></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION["email"])) { ?>
                <div class="col-lg-2">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="<?php echo HTTP_PATH . "/user_panel/login/logout.php"; ?>" class="btn logout-btn primary-btn px-3">Logout</a></li>
                        </ul>
                    </nav>
                </div>
            <?php } ?>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header End -->