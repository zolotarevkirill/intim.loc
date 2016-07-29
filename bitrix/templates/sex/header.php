<!DOCTYPE html>
<html lang="ru_RU"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <META NAME="ROBOTS" content="ALL">
        <?php $APPLICATION->ShowMeta("keywords") ?>
        <?php $APPLICATION->ShowMeta("description") ?>
        <title><?php $APPLICATION->ShowTitle(); ?> | www.mysecretplace.ru.ru</title> 

        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <!-- CSS Global -->
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/owl-carousel2/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/owl-carousel2/assets/owl.theme.default.min.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/animate/animate.min.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/css/theme.css" rel="stylesheet">
        <link href="<?=SITE_TEMPLATE_PATH?>/assets/css/theme-green-2.css" rel="stylesheet" id="theme-config-link">

        <!-- Head Libs -->
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/modernizr.custom.js"></script>

        <!--[if lt IE 9]>
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/iesupport/html5shiv.js"></script>
        <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/iesupport/respond.min.js"></script>
        <![endif]-->
         <?php $APPLICATION->ShowHeadStrings(); ?>
        <?php $APPLICATION->ShowHead(); ?>
    </head>
    <?php if ($USER->IsAdmin()): ?>   
            <div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>    
        <?php endif; ?>
    <body id="home" class="wide">
        <!-- PRELOADER -->
        <div id="preloader">
            <div id="preloader-status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <div id="preloader-title">Loading</div>
            </div>
        </div>
        <!-- /PRELOADER -->

        <!-- WRAPPER -->
        <div class="wrapper">
            <noindex>
            <!-- Popup: Shopping cart items -->
            <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="container">
                        <div class="cart-items">
                            <div class="cart-items-inner">
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object item-image" src="<?=SITE_TEMPLATE_PATH?>/assets/img/preview/shop/order-1s.jpg" alt=""></a>
                                    <p class="pull-right item-price">$450.00</p>
                                    <div class="media-body">
                                        <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                                        <p class="item-desc">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <p class="pull-right item-price">$450.00</p>
                                    <div class="media-body">
                                        <h4 class="media-heading item-title summary">Subtotal</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <div>
                                            <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a><!--
                                            --><a href="shopping-cart.html" class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Popup: Shopping cart items -->
            </noindex>
            <!-- Header top bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-left">
                        <ul class="list-inline">
                            <li class="icon-user"><a href="login.html"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon-1.png" alt=""/> <span>Login</span></a></li>
                            <li class="icon-form"><a href="login.html"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icon-2.png" alt=""/> <span>Not a Member? <span class="colored">Sign Up</span></span></a></li>
                            <li><a href="mailto:support@yourdomain.com"><i class="fa fa-envelope"></i> <span>support@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="list-inline">
                            <li class="hidden-xs"><a href="about.html">About</a></li>
                            <li class="hidden-xs"><a href="blog.html">Blog</a></li>                             
                            <li class="hidden-xs"><a href="accountinformation.html">My Account</a></li>
                            <li class="hidden-xs"><a href="contact.html">Contact</a></li>
                            <li class="hidden-xs"><a href="faq.html">FAQ</a></li>
                            <li class="hidden-xs"><a href="wishlist.html">My Wishlist</a></li>
                            <li class="dropdown currency">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">€ EURO<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">€ EURO</a></li>
                                    <li><a href="#">€ EURO</a></li>
                                    <li><a href="#">€ EURO</a></li>
                                </ul>
                            </li>
                            <li class="dropdown flags">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/flag.gif" alt=""/> Eng<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/flag.gif" alt=""/> Eng</a></li>
                                    <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/flag.gif" alt=""/> Eng</a></li>
                                    <li><a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/flag.gif" alt=""/> Eng</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Header top bar -->

            <!-- HEADER -->
            <header class="header fixed header-logo-left">
                <div class="header-wrapper">
                    <div class="container">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo-bella-shop.png" alt="Bella Shop"/></a>
                        </div>
                        <!-- /Logo -->

                        <!-- Header search -->
                        <div class="header-search">
                            <input class="form-control" type="text" placeholder="What are you looking?"/>
                            <select
                                class="selectpicker header-search-select" data-live-search="true"
                                data-toggle="tooltip" title="Select">
                                <option>All Categories </option>
                                <option>Categories </option>
                                <option>Categories </option>
                            </select>
                            <button><i class="fa fa-search"></i></button>
                        </div>
                        <!-- /Header search -->

                        <!-- Header shopping cart -->
                        <div class="header-cart">
                            <div class="cart-wrapper">
                                <a href="wishlist.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-heart"></i></a>
                                <a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>
                                
                                <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart">
                                    <i class="fa fa-shopping-cart"></i> 
                                    <span class="hidden-xs" data-header="counter"> 0 товар(ов) - 0 рублей </span> 
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                
                                <!-- Mobile menu toggle button -->
                                <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                                <!-- /Mobile menu toggle button -->
                            </div>
                        </div>
                        <!-- Header shopping cart -->

                    </div>
                </div>
                <div class="navigation-wrapper">
                    <div class="container">
                        <!-- Navigation -->
                        <nav class="navigation closed clearfix">
                            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                            <ul class="nav sf-menu">
                                <li class="active"><a href="index.html">Homepage</a>
                                    <ul>
                                        <li><a href="index.html">Homepage 1</a></li>
                                        <li><a href="index-2.html">Homepage 2</a></li>
                                        <li><a href="index-3.html">Homepage 3</a></li>
                                        <li><a href="index-4.html">Homepage 4</a></li>
                                        <li><a href="index-5.html">Homepage 5</a></li>
                                        <li><a href="index-6.html">Homepage 6</a></li>
                                        <li><a href="index-7.html">Homepage 7</a></li>
                                        <li><a href="index-8.html">Homepage 8</a></li>
                                        <li><a href="index-9.html">Homepage 9</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Men</a></li>
                                
                        </nav>
                        <!-- /Navigation -->
                    </div>
                </div>
            </header>
            <!-- /HEADER -->

            <!-- CONTENT AREA -->
            <div class="content-area">

              

            </div>
            <!-- /CONTENT AREA -->

            