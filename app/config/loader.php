<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    [
        'login\Controllers' => $config->application->controllersDir,
        'login\Models' =>$config->application->modelsDir,
        'login\Forms' => $config->application->formsDir,
        'login' => $config->application->libraryDir
    ]
)->register();



$linkedList =  new SplDoublyLinkedList();

