<?php $login = $_COOKIE['login']; 
		$f = fopen("../php/account/$login.id", "r");
		$all = fread($f,  filesize("../php/account/$login.id"));
		list($id, $login, $name, $pass, $money, $lip, $luser_agent) = explode("\n", $all);
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		?>
<!DOCTYPE html>
<html>
<head>
	<title>Подбор музыки</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, user-scalable = no">

	<link rel="stylesheet" href="../css/audio.css">
	<link rel="stylesheet" href="../css/global.css">

	<script src="../js/audio.js"></script>
	<script src="../js/global.js"></script>
	<script type="text/javascript" src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body onload="global_init();">
	<div style = "display: none;">
		<div id="user_name"><?php echo $name; ?></div>
		<div id="user_login"><?php echo $login; ?></div>
	</div>
	<div id = 'loading-wrapper'>
		<div id = 'loading-wrapper-gradient'>

		</div>
	</div>
	<div id = 'header'>
		
	</div>
	<!-- <div id = 'player'>
		<h1>Жопа коня <b>by sidq</b></h1>
		<div id = 'player-wrap'>
			<a>Стоп</a>
		</div>
	</div> -->	

	<div id = 'wrapper'>
		<h1>Add</h1>
		<form enctype="multipart/form-data" action="audio.php" method="POST">
			  Ритм: <input name="rhythm" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Мелодия: <input name="melody" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Басс: <input name="bass" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Адекватность: <input name="adequacy" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Звучность: <input name="ringing" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Исполнитель: <input type="text" name="singer"><br>
			  Название: <input type="text" name="name"><br>
	   		  Отправить этот файл: <input name="userfile" type="file"><br>

			  <input type="submit" name="submit">
		</form>
		<?php
		include("audio_handler.php");
		$uploaddir =  getcwd() . "/audio/";
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		if(explode('/', $_FILES['userfile']['type'])[0] == 'audio'){
			// while(1){
				if(!file_exists($uploadfile)){
					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
				    	echo "Файл корректен и был успешно загружен.\n";
				    	add_sound(basename($_FILES['userfile']['name']), $_POST['name'], $_POST['singer'], $_POST['rhythm'], $_POST['melody'], $_POST['bass'], $_POST['adequacy'], $_POST['ringing']);
				    // break;
					} else {
						echo "Ошибка";
					}
				} else {
					    echo "Файл сущевствует";
				}
			// }
			// print_r($_FILES);

		}
		?>
		<h1>Search</h1>
		<form action="search_audio.php" method="GET">
			  Ритм: <input name="rhythm" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Мелодия: <input name="melody" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Басс: <input name="bass" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Адекватность: <input name="adequacy" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  Звучность: <input name="ringing" type="range" min="1" max="100" value="50" class="slider" id="myRange"><br>
			  <input type="submit" name="submit">
		</form>
	</div>
	<div id = 'gui-container' class = 'hidden-on-start'>
			<b>Ваш никнейм: <i><?php echo $name; ?></i></b><br>
			<b>Ваш логин: <i><?php echo $login; ?></i></b><br>
			<b>Ваш пароль: <i>Хз, у нас хэши</i></b><br>
			<b>Ваш баланс: <i><?php echo $money; ?></i> <i class="fas fa-coins"></i></b><br>
			<b>Ваш id: <i><?php echo $id; ?></i></b><br>
			<b>Ваш юзер агент: <i><?php echo $user_agent; ?></i></b>
		</div>
	<div id="error_div" onclick="dismiss_error()">
		<br>
		<p>Вы хуйло!</p>
		<p>Блять</p>
		<br>
	</div>
</body>
</html>