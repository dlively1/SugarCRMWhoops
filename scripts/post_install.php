<?php

function post_install()
{
	require_once 'modules/Configurator/Configurator.php';

	$configuratorObj = new Configurator();
	
	$configuratorObj->loadConfig();
	$configuratorObj->config['whoops_dev'] = true;
	$configuratorObj->saveConfig();
}