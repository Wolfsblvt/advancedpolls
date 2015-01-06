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

class v1_0_0_schema extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_0_0_data_module');
	}

	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'topics'	=> array(
					'wolfsblvt_poll_votes_hide'			=> array('BOOL', 0),
					'wolfsblvt_poll_voters_show'		=> array('BOOL', 0),
					'wolfsblvt_poll_voters_limit'		=> array('BOOL', 0),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'topics'	=> array(
					'wolfsblvt_poll_votes_hide',
					'wolfsblvt_poll_voters_show',
					'wolfsblvt_poll_voters_limit',
				),
			),
		);
	}
}
