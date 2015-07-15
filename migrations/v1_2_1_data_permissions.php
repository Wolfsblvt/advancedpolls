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

class v1_2_1_data_permissions extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_2_0_data_permissions');
	}

	public function update_data()
	{
		return array(
			array('permission.remove', array('u_see_voters')),
		);
	}
}
