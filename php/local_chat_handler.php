<?php

	$me = $_GET['me'];
	$to = $_GET['to'];
	$mess = strip_tags($_GET['mess']);
	if(file_exists("messlog/localchat/$me-$to.log")){
		if($mess != ''){
			$f = fopen("messlog/localchat/$me-$to.log", "r");
			$text = fread($f, filesize("messlog/localchat/$me-$to.log"));
			fclose($f);
			$mess = $mess . "<br>\n" . $text;
			$f = fopen("messlog/localchat/$me-$to.log", "w");
			fwrite($f, "$me: $mess");
			fclose($f);
		}
		$f = fopen("messlog/localchat/$me-$to.log", "r");
		$text = fread($f, filesize("messlog/localchat/$me-$to.log"));
		fclose($f);

	}elseif(file_exists("messlog/localchat/$to-$me.log")){
		if($mess != ''){
			$f = fopen("messlog/localchat/$to-$me.log", "r");
			$text = fread($f, filesize("messlog/localchat/$to-$me.log"));
			fclose($f);
			$mess = $mess . "<br>\n" . $text;
			$f = fopen("messlog/localchat/$to-$me.log", "w");
			fwrite($f, "$me: $mess");
			fclose($f);
		}
		$f = fopen("messlog/localchat/$to-$me.log", "r");
		$text = fread($f, filesize("messlog/localchat/$to-$me.log"));
		fclose($f);

	}else{
		if($mess != ''){
			$f = fopen("messlog/localchat/$me-$to.log", "w");
			fwrite($f, "$me: $mess<br> \n");
			fclose($f);

			$f = fopen("messlog/localchat/$me-$to.log", "r");
			$text = fread($f, filesize("messlog/localchat/$me-$to.log"));
			fclose($f);
			}
		$text = '';
	}

	echo json_encode($text); 

?>