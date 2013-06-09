<?php

/**
 * @package manifest file for Minimum characters for search
 * @version 1.2.1
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
 * The Initial Developer of the Original Code is
 * Joker (http://www.simplemachines.org/community/index.php?action=profile;u=226111)
 * Portions created by the Initial Developer are Copyright (C) 2011
 * the Initial Developer. All Rights Reserved.
 *
 */

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif(!defined('SMF'))
	die('<b>Error:</b> Cannot install - please verify that you put this file in the same place as SMF\'s index.php and SSI.php files.');

if ((SMF == 'SSI') && !$user_info['is_admin'])
	die('Admin privileges required.');

global $modSettings;

updateSettings(array('search_min_char' => '2'));

if (SMF == 'SSI')
	echo 'Database changes are complete! Please wait...';

?>