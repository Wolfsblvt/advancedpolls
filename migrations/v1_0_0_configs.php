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

class v1_0_0_configs extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return array(
			array('config.add', array('wolfsblvt.advancedpolls.activate_poll_votes_hide',		1)),
			array('config.add', array('wolfsblvt.advancedpolls.activate_poll_voters_show',		1)),
			array('config.add', array('wolfsblvt.advancedpolls.activate_poll_voters_limit',		1)),

			array('config.add', array('wolfsblvt.advancedpolls.default_poll_votes_hide',		1)),
			array('config.add', array('wolfsblvt.advancedpolls.default_poll_voters_show',		1)),
			array('config.add', array('wolfsblvt.advancedpolls.default_poll_voters_limit',		0)),
		);
	}

	public function revert_data()
	{
		return array(
			array('config.remove', array('wolfsblvt.advancedpolls.activate_poll_votes_hide')),
			array('config.remove', array('wolfsblvt.advancedpolls.activate_poll_voters_show')),
			array('config.remove', array('wolfsblvt.advancedpolls.activate_poll_voters_limit')),

			array('config.remove', array('wolfsblvt.advancedpolls.default_poll_votes_hide')),
			array('config.remove', array('wolfsblvt.advancedpolls.default_poll_voters_show')),
			array('config.remove', array('wolfsblvt.advancedpolls.default_poll_voters_limit')),
		);
	}
}
