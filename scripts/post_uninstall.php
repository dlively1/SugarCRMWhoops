<?php

function post_uninstall()
{
	require_once 'modules/Configurator/Configurator.php';

	$configuratorObj = new Configurator();
	
	$configuratorObj->loadConfig();
	$configuratorObj->config['whoops_dev'] = false;
	$configuratorObj->saveConfig();
}