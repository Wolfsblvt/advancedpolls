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

class v1_1_0_step2_data_revert_null_votes extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_1_0_step1_data_permissions');
	}

	public function revert_data()
	{
		return array(
			array('custom', array(
				array(&$this, 'remove_null_votes'),
			)),
		);
	}

	public function remove_null_votes($value)
	{
		// Clear up all null votes when extension is removed
		$sql = 'DELETE FROM ' . POLL_VOTES_TABLE . '
					WHERE poll_option_id = 0';
		$this->db->sql_query($sql);
	}
}
