<?php 

	$GLOBALS['mysql'] = array(
		'host' => 'localhost',
		
		'username' => 'root',
		'password' => '',
		'database' => 'jpsrin_hosur_services'
		
		// 'username' => 'jpsrin_hosur_serv',
		// 'password' => 'SerVices9(o0()1!',
		// 'database' => 'jpsrin_hosur_services'
	);

	spl_autoload_register(function($class) {
		require_once 'classes/' . $class . '.php';
	});

?>