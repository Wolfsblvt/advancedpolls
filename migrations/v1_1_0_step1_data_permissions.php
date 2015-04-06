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

class v1_1_0_step1_data_permissions extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_0_0_schema');
	}

	public function update_data()
	{
		return array(
			array('permission.add', array('u_see_voters')),
			array('permission.permission_set', array('ROLE_USER_FULL', 'u_see_voters')),
			array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_see_voters')),
			array('permission.permission_set', array('REGISTERED', 'u_see_voters', 'group')),
			array('permission.permission_set', array('REGISTERED_COPPA', 'u_see_voters', 'group')),
		);
	}
}
