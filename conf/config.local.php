<?php

$parametros = array(
		'dsn' 		=> 'mysql:host=localhost;dbname=mn_teamwork;charset=utf8'
		,'usr' 		=> 'root'
		,'passwd'	=> 'pass'
		,'apiKey'	=> 'cat952yellow'
	);

foreach ($parametros as $key => $value) {
	define(strtoupper($key."_"), $value);
}
?>