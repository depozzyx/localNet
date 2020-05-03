function init_main_js(){
	lchat_check()
	
	document.getElementById("goto").addEventListener("input", () => lchat_check_chain_input(), true);
}
function error(){
	document.location.href='../index.php';
}
// Gchat
shown = 0
function check_gchat_if_disabled(){
	function back_gchat_but(){
		document.getElementById('glb').style.opacity = '1'
	}
	document.getElementById('glb').style.opacity = '0.5'
	setTimeout(back_gchat_but, 3000)
	if (shown == 0){
		function set_gchat_text(){
			document.getElementById('help_div').innerHTML = html
		}
		var but = document.getElementById('glb');
		html = "<b>Tip: Кнопка блокируется на 3 секунды</b><br><b>после отправки сообщения</b>"
		shown = 1
		setTimeout(set_gchat_text, 1000)
	}
}
function lchat_check_chain_input(){
	val = document.getElementById("goto").value
	if (val != ''){
		var found = 0
		document.getElementById("local_answer").onChange = setTimeout(lchat_check_chain_input_p2, 1000)
		/*while (found == 0){
			sleep(100);
			function lchat_check_chain_input_break(){
				break
			}
			setTimeout(lchat_check_chain_input_break,1500)
			if (document.getElementById("local_answer").innerHTML != 'Загрузка...'){
				found = 1
				break
			}
		}
		if (found == 1){
			document.getElementById("lchat-start").style.display = 'none'
			document.getElementById("lchat-end").style.display = 'block'
		}else{
			display_error('Не найдено')
		}*/
	}
}
function lchat_check_chain_input_p2(){
	if (document.getElementById("local_answer").innerHTML != 'Загрузка...'){
		document.getElementById("lchat-start").style.display = 'none'
		document.getElementById("lchat-end").style.display = 'block'
	}
}
// function sleep(ms) {
// 	return new Promise(resolve => setTimeout(resolve, ms));
// }

gchat_shown = 1
lchat_shown = 1
function gchat_check(){
	if (gchat_shown == 1){
		chat_hide(0, 'global_chat', 'gchat-hide')
		gchat_shown = 0
	}else if (gchat_shown == 0){
		chat_show(0, 'global_chat', 'gchat-hide', '70%')
		gchat_shown = 1
		// alert('show')
	}else{
		display_error('Ошибка. Код ошибки: gchat_shown != (1 or 0)');
	}
}
function lchat_check(){
	if (lchat_shown == 1){
		chat_hide(1, 'local_chat', 'lchat-hide')
		lchat_shown = 0
	}else if (lchat_shown == 0){
		chat_show(1, 'local_chat', 'lchat-hide', '40%')
		lchat_shown = 1
		// alert('show')
	}else{
		display_error('Ошибка. Код ошибки: lchat_shown != (1 or 0)');
	}
}
function chat_hide(tit_id, c_handl, hide_hanl){
	document.getElementById(hide_hanl).style.display = 'none'
	document.getElementById(c_handl).style.height = 'auto'
	document.getElementsByClassName('gchat-title')[tit_id].style.lineHeight = '400%'
}
function chat_show(tit_id, c_handl, hide_hanl, hei){
	document.getElementById(hide_hanl).style.display = 'block'
	hght = hei
	document.getElementById(c_handl).style.height = hght
	document.getElementsByClassName('gchat-title')[tit_id].style.lineHeight = '100%'
}

// Gui
gui_account_opened = 0;
function gui_account_check(){
	if (gui_account_opened == 0){
		document.getElementById('header-login').style.backgroundColor = "#333"
		document.getElementById('header-login').style.color = "#fff"
		gui_account_opened = 1
		gui_account_open()
	}else if(gui_account_opened == 1){
		document.getElementById('header-login').style.backgroundColor = "#fff"
		document.getElementById('header-login').style.color = "#000"
		gui_account_opened = 0
		gui_account_close()
	}else{
		display_error('Ошибка. Код ошибки: gui_account_open != (1 or 0)');
	}
}
function gui_account_open(){
	document.getElementById('gui-bg').style.display = "block"
	document.getElementById('gui-account').style.display = "block"
}
function gui_account_close(){
	document.getElementById('gui-bg').style.display = "none"
	document.getElementById('gui-account').style.display = "none"
}

// Generic errors
// Display errors
function display_error(arg1,arg2){
	msg = '<br><p>'
	document.getElementById('error_div').style.backgroundColor = 'rgba(245, 70, 12, 0.7)';

	if (arg1){
		msg = msg + ''+arg1+''
	}
	if (arg2 == 1){
		document.getElementById('error_div').style.backgroundColor = 'rgba(31, 173, 34, 0.7)';
	}else if (arg2){
		msg = msg + ' '+arg2+''
	}
	msg = msg + '</p><br>	'
	document.getElementById('error_div').innerHTML = msg;
	document.getElementById('error_div').style.opacity = '1';
	document.getElementById('error_div').style.transform = 'translateX(0px)';

	setTimeout(dismiss_error, 5000)
}
function dismiss_error(){
	document.getElementById('error_div').style.opacity = '0';
	document.getElementById('error_div').style.transform = 'translateX(-30px)';
}