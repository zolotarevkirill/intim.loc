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
        <link href='/bitrix/templates/.default/assets/css/bootstrap.min.css'  data-skip-moving="true"  rel='stylesheet' type='text/css'>
        <link href='/bitrix/templates/.default/assets/css/style.min.css' data-skip-moving="true" rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" data-skip-moving="true" ></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">


        <?php $APPLICATION->ShowHeadStrings(); ?>
        <?php $APPLICATION->ShowHead(); ?>

    </head>
    <body>
        <?php if ($USER->IsAdmin()): ?>   
            <div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>    
        <?php endif; ?>
        <div class="close-nav"></div>
        <div class="sticky-page">
            <section class="header" data-item="header">
                <div class="header-lvl-1">
                    <div class="container-fluid">
                        <div class="row">
                            <?php global $USER; ?>
                            <div class="col-xs-2 col-md-2 col-sm-2">
                                <?php if ($USER->IsAuthorized()): ?>
                                    <div class="login-name hidden-xs">
                                        Вы авторизованы как:<br>
                                        <a href="/account/"><?= $USER->GetEmail(); ?></a><br/>
                                        <a href="/?logout=yes">Выход</a>
                                    </div>
                                <?php else: ?>
                                    <div class="login-name hidden-xs">
                                        Доступ в личный кабинет
                                        <p><a href="#" data-toggle="modal" data-target="#signUp">регистрация</a> или <a href="#" data-toggle="modal" data-target="#signIn">авторизация</a></p>
                                        
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-xs-2 col-md-2 col-sm-2">
                                
                                <a href="tel:+74959674867" class="phone" style="font-size: 22px; color:#fff;">+7 495 967 48 67</a><br>
                                <span class="login-name">Принимаем звонки с 10-00 до 21-00.</span>
                            </div>
                            <div class="col-xs-8 col-md-4 col-sm-4 text-center">
                                <?php
                                $APPLICATION->IncludeComponent(
                                        "bitrix:main.include", "", Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => SITE_TEMPLATE_PATH . "/include/logo.php"
                                        )
                                );
                                ?>
                            </div>
                            <div class="col-xs-2 col-md-2 col-sm-2">
                                <a href="#" class="trash" data-item="offcanvas-menu">
                                    <div><p>В вашей корзине</p></div>
                                    <div id="HeaderCart">

                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-2 col-md-2 col-sm-2"></div>
                        </div>
                    </div>
                </div>
                <div class="header-lvl-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <nav class="navbar navbar-default">

                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="nav">
                                        <?php
                                        $APPLICATION->IncludeComponent(
                                                "bitrix:menu", "main_menu", Array(
                                            "ALLOW_MULTI_SELECT" => "N",
                                            "CHILD_MENU_TYPE" => "left",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "DELAY" => "N",
                                            "MAX_LEVEL" => "1",
                                            "MENU_CACHE_GET_VARS" => "",
                                            "MENU_CACHE_TIME" => "3600",
                                            "MENU_CACHE_TYPE" => "N",
                                            "MENU_CACHE_USE_GROUPS" => "N",
                                            "ROOT_MENU_TYPE" => "top",
                                            "USE_EXT" => "N"
                                                )
                                        );
                                        ?>
                                    </div><!-- /.navbar-collapse -->

                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </section>