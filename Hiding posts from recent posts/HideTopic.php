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

function HideTopic() {
	global $txt, $topic, $user_info, $modSettings, $context, $smcFunc;

	if (isset($topic) & !empty($topic)) {
		$topic = (int)$topic;
	} else {
		redirectexit();
	}
	$hide_topic = isset($_GET['hide_topic']) ? true : false;

	if (!isset($modSetting)) {
		$replaceArray[] = array('hide_topics', '');
		$smcFunc['db_insert']('replace', '{db_prefix}settings', array('variable' => 'string-255', 'value' => 'string-65534'), array('hide_topics', ''), array(''));
	}
	$checked = array();
	if (strlen($modSettings['hide_topics']) > 0) {
		$temp = explode(',', $modSettings['hide_topics']);
		foreach ($temp as $check) {
			if (((string)(int)$check) == ((string)$check))
				$checked[] = $check;
		}
	}

	if ($hide_topic) {
		if (!in_array($topic, $checked)) {
			$checked[] = $topic;
		}
	} else {
		$checked = array_diff($checked, array($topic));
	}
	$values = implode(',', $checked);

	$request = $smcFunc['db_query']('', '
		UPDATE {db_prefix}settings
		SET value = {string:val}
		WHERE variable = {string:is_solved}', array('is_solved' => 'hide_topics', 'val' => $values, ));

	clean_cache();
	if ($hide_topic) {
		redirectexit('posthidden;topic=' . $topic . '.0');
	} else {
		redirectexit('postunhidden;topic=' . $topic . '.0');
	}
}

?>