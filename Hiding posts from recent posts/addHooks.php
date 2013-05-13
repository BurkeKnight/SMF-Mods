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

if (!defined('SMF'))
	die('Hacking attempt...');

function hideTopicsPermissions(&$permissionGroups, &$permissionList)
{
    $permissionGroups['membergroup']['simple'] = array('hidetopics');
    $permissionGroups['membergroup']['classic'] = array('hidetopics');
    $permissionList['membergroup'] = array_merge(array(
			'hidetopics_manage' => array(false, 'hidetopics', 'administrate'),
		), $permissionList['membergroup']
	);
}

function addHideButton(&$normal_buttons) {
	global $context, $scripturl;

	if(allowedTo('hidetopics_manage')) {
			$normal_buttons = array_merge($normal_buttons, array('hide_topic' => array('text' => $context['hidden_state'], 'image' => 'print.gif', 'lang' => true, 'custom' => 'rel="new_win nofollow"', 'url' => $scripturl . '?action=hidetopic;topic=' . $context['current_topic'] . '.0;' . $context['hidden_state'])));
	}
}

?>