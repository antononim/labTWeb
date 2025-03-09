<?php
	// if ( !empty($_GET['a']) && ($_GET["a"] == 1) ) {
		// print("Whatever<br>");
	// }
	if ( empty( $_GET['pineapples'] ) ) {
		print("Error 420<br>");
		exit;
	}
	
	if ( $_GET['pineapples'] >= 100 ) {
		print("true");
	} else {
		print("false");
	}
	
	// 'on' == $_SERVER['HTTPS']
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri.'/dashboard/');
	// exit;
?>