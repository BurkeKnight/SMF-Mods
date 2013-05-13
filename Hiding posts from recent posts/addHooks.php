<?php
/**************************************************
	GoogleTagged Mod v2.0 - GoogleTaggged-Integrate.php
**************************************************/
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

?>