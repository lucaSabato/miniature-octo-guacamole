<?php

/**
 * Load the class of the API
 *
 * @param string $class_name the name of the class
 *
 * @return void
 */
function load_api($class_name)
{
    $path_to_file = 'src/api/' . $class_name . '.php';

    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}

/**
 * Load the class of the exercise
 *
 * @param string $class_name the name of the class
 *
 * @return void
 */
function load_class($class_name)
{
    $path_to_file = 'src/' . $class_name . '.php';

    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}

spl_autoload_register('load_api');
spl_autoload_register('load_class');
