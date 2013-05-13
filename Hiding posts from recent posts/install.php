<?php
/**
 * @package manifest file for Hiding posts from recent posts
 * @version 1.3
 * @author Joker (http://www.simplemachines.org/community/index.php?action=profile;u=226111)
 * @copyright Copyright (c) 2012
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

/*
 * Version: MPL 1.1
 *
 * The contents of this file are subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * Contributor(s):
 * Joker (http://www.simplemachines.org/community/index.php?action=profile;u=226111)
 * Helped in updating the mod for SMF 2.x branch
 */

// If SSI.php is in the same place as this file, and SMF isn't defined, this is being run standalone.
if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
// Hmm... no SSI.php and no SMF?
elseif(!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify you put this file in the same place as SMF\'s SSI.php.');

$integrations = array(
	'integrate_pre_include' => 'Sources/addHooks.php',
	'integrate_load_permissions' => 'hideTopicsPermissions',
	'integrate_display_buttons' => 'addHideButton',
);

foreach ($integrations as $hook => $function)
	add_integration_function($hook, $function);	
	
if(SMF == 'SSI')
   echo 'Database changes are complete!';

?>