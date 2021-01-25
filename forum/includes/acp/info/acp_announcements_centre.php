<?php
/** 
*
* @package acp
* @version $Id: acp_announcements_centre.php 278 2011-02-21 14:32:49Z lefty74 $ 
* @copyright (c) 2007, 2008, 2009 lefty74 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/
/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
/**
* @package module_install
*/
class acp_announcements_centre_info
{
	function module()
	{
		global $user;

		$user->add_lang('mods/announcement_centre');

		return array(
			'filename'	=> 'acp_announcements_centre',
			'title'		=> 'ACP_ANNOUNCEMENTS_CENTRE',
			'version'	=> '1.2.4',
			'modes'		=> array(
			'configuration'		=> array('title' => 'ACP_ANNOUNCEMENTS_CENTRE_CONFIG', 'auth' => 'acl_a_announcement_centre', 'cat' => array('ACP_DOT_MODS')),
			'announcements'		=> array('title' => 'ACP_ANNOUNCEMENTS_CENTRE', 'auth' => 'acl_a_announcement_centre', 'cat' => array('ACP_DOT_MODS')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}


?>