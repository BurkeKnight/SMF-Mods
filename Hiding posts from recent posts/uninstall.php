<?php
/**************************************************
	GoogleTagged Mod v2.0 - uninstall.php
**************************************************/

// If SSI.php is in the same place as this file, and SMF isn't defined, this is being run standalone.
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif(!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify you put this file in the same place as SMF\'s SSI.php.');

$integrations = array(
	'integrate_pre_include' => 'addHooks.php',
	'integrate_load_permissions' => 'hideTopicsPermissions',
);

foreach ($integrations as $hook => $function)
	remove_integration_function($hook, $function);

if(SMF == 'SSI')
   echo 'Database changes are complete!';
?>