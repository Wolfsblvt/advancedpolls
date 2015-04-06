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

class v1_1_0_step3_configs extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_1_0_step2_data_revert_null_votes');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('wolfsblvt.advancedpolls.default_poll_votes_change',		1)),
		);
	}
}
