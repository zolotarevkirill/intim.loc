</div>
<section class="footer">
    <div class="footer-lvl-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3 col-sm-3">
                    <?php
                    $APPLICATION->IncludeComponent(
                            "bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "COMPONENT_TEMPLATE" => ".default",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/social.php"
                            )
                    );
                    ?>
                    <?php
                    $APPLICATION->IncludeComponent(
                            "bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "COMPONENT_TEMPLATE" => ".default",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/copyright.php"
                            )
                    );
                    ?>
                </div>
                <div class="col-xs-12 col-md-2 col-sm-2">
                    <div class="my-table">
                        <p><a href="/garantiya/">Гарантия</a></p>
                        <p><a href="/anonimnost/">Aнонимность</a></p>
                        <p><a href="/dostavka/">Доставка</a></p>
                        <p><a href="/oplata/">Оплата</a></p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-3">
                    <?php
                    $APPLICATION->IncludeComponent(
                            "bitrix:main.include", "", Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "COMPONENT_TEMPLATE" => ".default",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/phone_footer.php"
                            )
                    );
                    ?>
                </div>
                <div class="col-xs-12 col-md-4 col-sm-4">
                    <form class="form-send" action="" method="post" data-form="send">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <p>Подписаться на новости</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-8 col-sm-8">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="mail" name="phone" class="form-control my-input" placeholder="Ваш E-mail" required/>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <button type="submit" class="btn btn-primary" name="from">Подписаться</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<noindex>
    <offcanvas class="offcanvas" data-item="offcanvas">
        <div class="offcanvas-header">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="my-flex">
                        <div>
                            <button class="btn offcanvas-btn" data-item="offcanvas-menu">
                                <i class="glyphicon glyphicon-menu-right"></i>
                            </button>
                        </div>
                        <div>
                            <h3>Корзина</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rightItemCart">


        </div>
    </offcanvas>

<div class="modal fade" id="attantion" tabindex="-1" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-md">

        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <img src="/bitrix/templates/.default/assets/img/18plus.png" alt="">
                        <p>Вам исполнилось 18 лет?</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-sm-6 text-left">
                        <button class="btn btn-warning" type="button" onclick="javascript: yes();" data-dismiss="modal" aria-label="Close">Да, мне исполнилось 18 лет!</button>
                    </div>
                    <div class="col-xs-12 col-md-6 col-sm-6 text-right">
                        <a href="http://yandex.ru/" class="btn btn-danger">Мне нет 18 лет!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signIn" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="text-center">Войти</h4>
					<form class="order-form" data-toggle="validator" action="/include/auth.php" method="post" role="form" data-form="send" id="FormAuth">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<label>Введите вашу почту</label>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input type="email" name="aEmail" class="my-input form-control" placeholder="exmaple@gmail.com" required>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<label>Введите ваш пароль</label>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input type="password" name="aPswd" class="my-input form-control"  placeholder="Введите пароль" required>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12 text-center">
									<button type="submit" class="btn btn-warning full-width">Войти</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="signUp" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body">
					<h4 class="text-center">Регистрация</h4>
					<form class="order-form" data-toggle="validator" action="/include/register.php" method="post" role="form" data-form="send" id="RegistrationForm">
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<label>Введите вашу почту</label>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input type="email" id="regEmail" name="rmail" class="my-input form-control" placeholder="exmaple@gmail.com" required>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<label>Введите ваш пароль</label>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input type="password" id="regPswd1" name="rp1" class="my-input form-control"  data-minlength="6" placeholder="Введите пароль" required>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<label>Повторите ваш пароль</label>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input id="regPswd2" type="password" name="rp2" class="form-control"  data-match="#regPswd1" data-match-error="Пароли не совпадаеют!" placeholder="Подтвердите пароль" required>
								</div>
								<div class="col-xs-12 col-md-12 col-sm-12">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-md-12 col-sm-12 text-center">
									<button type="submit" class="btn btn-warning full-width">Зарегистрироваться</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</noindex>




</body>
<link href='/bitrix/templates/.default/assets/css/owl.carousel.css' rel='stylesheet' type='text/css'>
<link href='/bitrix/templates/.default/assets/css/fontello.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/form.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/validator.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/SmoothScroll.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/main.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/catalog.js"></script>
<script type="text/javascript" src="/bitrix/templates/.default/assets/js/cookie.js"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter34474445 = new Ya.Metrika({ id:34474445, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/34474445" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</html>