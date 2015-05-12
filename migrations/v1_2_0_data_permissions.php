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

class v1_2_0_data_permissions extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_2_0_configs');
	}

	public function update_data()
	{
		return array(
			array('permission.add', array('f_seevoters', false, 'f_votechg')),
			array('permission.add', array('m_seevoters', true)),
			array('permission.add', array('m_seevoters', false)),
			array('permission.permission_set', array('ROLE_MOD_FULL', 'm_seevoters')),
		);
	}
}
