<?php
/**
 *
 * Advanced Polls
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

namespace wolfsblvt\advancedpolls\migrations;

class v1_0_0_data_module extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_0_0_configs');
	}

	public function update_data()
	{
		return array(
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'AP_TITLE_ACP'
			)),
			array('module.add', array(
				'acp',
				'AP_TITLE_ACP',
				array(
					'module_basename'	=> '\wolfsblvt\advancedpolls\acp\advancedpolls_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
