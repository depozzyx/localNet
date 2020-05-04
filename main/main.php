<?php
		if(isset($_GET['login'])){
			$login = $_GET['login'];
		}elseif (isset($_COOKIE['login'])) {
			$login = $_COOKIE['login'];
		}else{
			echo"<script>error()</script>";
		}
		setcookie("login", $login, time() + 172800, '/');
		setcookie("login", $login, time() + 172800);

		
		// phpinfo(32);
		echo "<script src='../js/main.js'></script>";

		$f = fopen("../php/account/$login.id", "r");
		$all = fread($f,  filesize("../php/account/$login.id"));
		list($id, $login, $name, $pass, $lip, $luser_agent) = explode("\n", $all);
		$ip = $_SERVER['REMOTE_ADDR'];
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		if($ip != $lip or $user_agent != $luser_agent){
			// ! ОТКЛЮЧИТЬ !echo"<script>error()</script>";
		}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $name; ?></title>
	
	<link rel="stylesheet" href="../css/global.css">
	<link rel="stylesheet" href="../css/main.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="../js/ajax_script.js"></script>
  	<script src="../js/ajax.js"></script>
  	<script src="../js/main.js"></script>
  	<script src="../js/global.js"></script>
  	<script src="../js/local.js"></script>
</head>
<body onload="global_init(); update(); init(); init_main_js();">
	<div id = 'header-placeholder'>
		<div style = 'display: none;'>
			<div id="user_name"><?php echo $name; ?></div>
			<div id="user_login"><?php echo $login; ?></div>
			<p id = 'cepochka'>30%</p>
		</div>
	</div>
	<div id = "phone-header-menu">
		<div id = "phone-header-top">
			<div class = 'phone-header-top-item'>
				<a href="../veronika/veronika.php">
					<!-- <b>[</b>NEW<b>]</b> --> Вероника
				</a>
			</div>
			<div class = 'phone-header-top-item '>
				-_-
			</div>
			<div class = 'phone-header-top-item'>
				Медиа
			</div>
			<div class = 'phone-header-top-item'>
				О проэкте
			</div>
			<div class = 'phone-header-top-item' id = 'header-login' onclick = 'phone_switch_menu(); gui_account_check();'>
				<!-- <div class = 'header-picker'>Никнейм: <?php echo $name; ?>,<br> Логин: <?php echo $login; ?></div> -->
				Аккаунт
			</div>
		</div>
		<div id = "phone-header-bot">
			<a href="/main/main.php?login=<?php echo $login; ?>"><div id = 'header-logo'></div></a>
			<div class = 'header-item header-item-a' onclick = "phone_switch_menu()">
				<div class = 'header-picker'>
					Меню <i id = 'phone-i-rotate' style = 'transform: skewX(-12deg) rotate(0deg); transition: all 1s ease;' class="fas fa-caret-down"></i>
				</div>
			</div>
		</div>
	</div>
	<div id = "header-menu">
		<div id = 'header-items'>
			<a href="/main/main.php?login=<?php echo $login; ?>"><div id = 'header-logo'></div></a>
			<div class = 'header-item header-item-a' >
				<div class = 'header-picker'>
					<a href="../veronika/veronika.php">
						<!-- <b>[</b>NEW<b>]</b> --> Вероника
					</a>
				</div>
			</div>
			<div class = 'header-item header-item-a' onclick = "display_error('Недоступно (')"><div class = 'header-picker'>-_-</div></div>
			<div class = 'header-item header-item-a' onclick = "display_error('Недоступно (')"><div class = 'header-picker'>Медиа</div></div>
			<div class = 'header-item header-item-a' onclick = "display_error('Недоступно (')"><div class = 'header-picker'>Локал Чат</div></div>
			<div class = 'header-item header-item-a' id = 'header-login' onclick = 'gui_account_check()'>
			<!-- <div class = 'header-picker'>Никнейм: <?php echo $name; ?>,<br> Логин: <?php echo $login; ?></div> -->
				<div class = 'header-picker'>Аккаунт</div>
			</div>
		</div>
	</div>
	<!-- a -->
	<div id = 'wrapper-content'>
		<div id = 'wrapper-left'>
			<div class = 'article article-one' style = 'background-image: url(../css/images/art1.jpg);'>
				<div class = 'article-content'>
					<br>
					<div class = 'article-picker'>
						<h1>Почему птенцы детей рожают узбеков?</h1>
						<p>Или как мир несправедлив</p>
					</div>
				</div>
				<!-- <div class = 'article-watch'>
					Просмотреть
				</div> -->
			</div>
			<div class = 'article article-triple' style = 'background-image: url(../css/images/art3.jpeg);'>
				<div class = 'article-content'>
					<br>
					<div class = 'article-picker'>
						<h1>Как акцизы Венесуэлы влияют на город Белорусь</h1>
						<!-- <p>Или как мир несправедлив</p> -->
					</div>
				</div>
			</div>	
			<div class = 'article-triple-separator'><br></div>
			<div class = 'article article-triple' style = 'background-image: url(../css/images/bg.jpg);'>
				<div class = 'article-content'>
					<br>
					<div class = 'article-picker'>
						<h1>Ммм... Масло.</h1>
						<!-- <p>Или как мир несправедлив</p> -->
					</div>
				</div>
			</div>
			<div class = 'article-triple-separator'><br></div>
			<div class = 'article article-triple' style = 'background-image: url(../css/images/art1.jpg);'>
				<div class = 'article-content'>
					<br>
					<div class = 'article-picker'>
						<h1>Жьжьжь жьжьжь</h1>
						<!-- <p>Или как мир несправедлив</p> -->
					</div>
				</div>
			</div>
			<div class = 'article article-one' style = 'background-image: url(../css/images/art2.jpg);'>
				<div class = 'article-content'>
					<br>
					<div class = 'article-picker'>
						<h1>Ищем свежих казахов!</h1>
						<p>Из авторской серии: как найти девушку?</p>
					</div>
				</div>
			</div>
		</div>
		<div id = 'wrapper-right'>
			<div id="global_chat">
				<div class='gchat-title' onclick = 'gchat_check()'>
					Общий чат
				</div>

				<div id = 'gchat-hide'>
					<div id="help_div" style = "margin-top: 3%; margin-bottom: 3%;">
						<b>Ваши сообщения увидят вce пользователи сайта</b>
					</div>
					<form method="post" id="global_chat_form" action="" >
				        <input placeholder="Сообщение" type="text" maxlength="50" name="mess" id="messin"><br>
				        <button id="glb" style="margin-top: 3%;" onclick = "check_gchat_if_disabled()" class = 'gui-but gui-but-small'>Отправить</button>
				    </form>

				    <div id="result_form"></div> 
				</div>
			</div>

			<div id="local_chat" style = "height: auto;">
				<div class='gchat-title' style = 'line-height: 400%;' onclick = 'lchat_check()'>
					Локал Чат
				</div>
				<div id = 'lchat-hide' style = "display: none;">
					<form method="post" id="ajax_form" action="" >
						<div id = 'lchat-start'>
							<div id="help_div" style = "margin-top: 3%; margin-bottom: 3%;">
								<b>Выберите цепочку сообщений</b><br>

							</div>
							<!-- <input list="guys" type="text" name="goto" id="goto" > -->
							<select id="goto" name="goto">
								<?php 
									$files = scandir("../php/account");
									foreach ($files as $file) {
										if($file == '.' or $file == '..'){
											continue;
										}else{
											$f = fopen("../php/account/$file", "r");
											$all = fread($f,  filesize("../php/account/$file"));
											fclose($f);
											list($id_, $login_, $name_, $pass_) = explode("\n", $all);
											echo "<option>$login_($name_)</option>";
										}
									}
								?>
			   				</select> 
			   				<button style="margin-top: 3%;" type = 'button' onclick="start_c()" class = 'gui-but gui-but-small'>Выбрать</button>
			   				<div id="help_div">
								<p type = "button" onclick="clean_c()">Очистить поле ввода</p>
							</div>	
			   			</div>
			   			<div id = 'lchat-end' style = 'display: none;'>
			   				<div type = "button" onclick="stop_c()" id="help_div" style = "margin-top: 0%; margin-bottom: 0%;">
								<p>Выйти из цепочки</p>
							</div>	
			   				<div id="help_div" style = "margin-top: 3%; margin-bottom: 3%;">
								<b>Ваши сообщения увидет только</b><br>
								<b id = "c_usr">получатель -</b>
							</div>
					        <input type="text" name="messloc" id="messloc"><br>
					        <!-- <input type="button" id="lcl" value="Отправить">  -->
					        <!-- ывывы -->
					        <button type="button" id="lcl" style="margin-top: 3%;" onclick="local_handler()" class = 'gui-but gui-but-small'>Отправить</button>
					        <div id="local_answer">Загрузка...</div>
					    </div>
				    </form>
				</div>
			</div>

		</div>
	</div>

	<div id="gui-bg" onclick="gui_account_check()"></div>
	<div id="gui-account" class = 'gui' style = "display: none;">
		<div class="gui_title">
			Аккаунт
		</div>

		<div class = "generic_form">
			<div id="help_div" style = "margin-top: 3%; margin-bottom: 17%">
				<b>Ваш никнейм: <?php echo $name; ?></b><br>
				<b>Ваш логин: <?php echo $login; ?></b><br>
				<b>Ваш пароль: Хз, у нас хэши</b>
			</div>

			<button onclick="gui_account_check()" class="gui-but gui-but-small">Вернуться</button>
			<div id="help_div" style = "margin-top: 3%;">
				<a href='/'><p>Выйти</p></a>
			</div>
		</div>
	</div>


	<div id="error_div" onclick="dismiss_error()">
		<br>
		<p>Вы хуйло!</p>
		<p>Блять</p>
		<br>
	</div>
<!-- Глобальный чал -->
</body>
</html>