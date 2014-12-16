<?php
/**
 * 
 * Advanced Polls
 * 
 * @copyright (c) 2014 Wolfsblvt ( www.pinkes-forum.de )
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 * @author Clemens Husung (Wolfsblvt)
 */

namespace wolfsblvt\advancedpolls\migrations;

class v1_0_0_configs extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('wolfsblvt.advancedpolls.activate_hide_votes',	1)),
			array('config.add', array('wolfsblvt.advancedpolls.activate_show_voters',	1)),
			array('config.add', array('wolfsblvt.advancedpolls.activate_limit_voters',	1)),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.remove', array('wolfsblvt.advancedpolls.activate_hide_votes')),
			array('config.remove', array('wolfsblvt.advancedpolls.activate_show_voters')),
			array('config.remove', array('wolfsblvt.advancedpolls.activate_limit_voters')),
		);
	}
}
