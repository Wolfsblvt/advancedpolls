<?php
/**
 *
 * Advanced Polls
 *
 * @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de ) & javiexin ( www.exincastillos.es/jxmods )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

namespace wolfsblvt\advancedpolls\migrations;

class v1_2_0_schema extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return array('\wolfsblvt\advancedpolls\migrations\v1_2_0_configs');
	}

	public function update_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'topics'	=> array(
					'wolfsblvt_poll_show_ordered'		=> array('BOOL', 0),
					'wolfsblvt_poll_max_value'			=> array('UINT:4', 1),
					'wolfsblvt_poll_total_value'		=> array('UINT:4', 1),
				),
				$this->table_prefix . 'poll_votes'	=> array(
					'wolfsblvt_poll_option_value'		=> array('UINT:4', 1),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'topics'	=> array(
					'wolfsblvt_poll_show_ordered',
					'wolfsblvt_poll_max_value',
					'wolfsblvt_poll_total_value',
				),
				$this->table_prefix . 'poll_votes'	=> array(
					'wolfsblvt_poll_option_value',
				),
			),
		);
	}
}
