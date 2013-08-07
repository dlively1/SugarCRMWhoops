<?php


$manifest = array(
    'acceptable_sugar_flavors' => array('CE', 'PRO', 'CORP', 'ENT', 'ULT'),
    'acceptable_sugar_versions' => array(
		'regex_matches' => array ('6\\.5\\.(.*?)', '6\\.6\\.(.*?)', '6\\.6\\.(.*?)\\.(.*?)', '6\\.7\\.(.*?)', '6\\.7\\.(.*?)\\.(.*?)'),
    ),
    'readme' => '',
    'author' => 'Dan Lively',
    'description' => 'Whoops error reporting for SugarCRM Development',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'SugarWhoops',
    'published_date' => '',
    'type' => 'module',
    'version' => '1.0',
    'remove_tables' => 'prompt',
);

$installdefs = array(
    'id' => 'SugarWhoops',
    'copy' => array(
        0 => array(
            'from' => '<basepath>/Files/custom',
            'to' => 'custom',
        ),
    ),
    'logic_hooks' => array(
       0 => array(
            'module' => '',
            'hook' => 'after_entry_point',
            'order' => 9,
            'description' => 'Loads Library and Registers Error Handler',
            'file' => 'custom/ExceptionHookManager.php',
            'class' => 'ExceptionHookManager',
            'function' => 'loadErrorHandler',
        ),
       1 => array(
           'module' => '',
           'hook' => 'handle_exception',
           'order' => 1,
           'description' => 'Runs Exception through Whoops',
           'file' => 'custom/ExceptionHookManager.php',
           'class' => 'ExceptionHookManager',
           'function' => 'handle',
       ),
    ),

);
