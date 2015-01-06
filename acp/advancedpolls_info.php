<?php
/**
 * 
 * Advanced Polls
 * 
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

namespace wolfsblvt\advancedpolls\acp;

class advancedpolls_info
{
	function module()
	{
		return array(
			'filename'	=> '\wolfsblvt\advancedpolls\acp\advancedpolls_module',
			'title'		=> 'AP_TITLE_ACP',
			'modes'		=> array(
				'settings'	=> array('title' => 'AP_SETTINGS_ACP', 'auth' => 'ext_wolfsblvt/advancedpolls && acl_a_board', 'cat' => array('AP_TITLE_ACP')),
			),
		);
	}
}
