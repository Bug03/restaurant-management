<?php
function load_database($class_name)
{
	$path_to_file = __DIR__. '/'.'Database/' . $class_name . '.php';
	if (file_exists($path_to_file)) {
		require $path_to_file;
	}
}


spl_autoload_register('load_database');
?>