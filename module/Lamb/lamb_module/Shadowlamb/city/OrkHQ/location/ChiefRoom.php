<?php
final class OrkHQ_ChiefRoom extends SR_Location
{
	public function getFoundPercentage() { return 70; }
	public function getFoundText() { return 'You locate a room with an ork emblem. You hear noises from the inside...'; }
	public function getEnterText(SR_Player $player) { return 'You enter the room and see some Orks eating. One of them looks like the big boss.'; }
	public function onEnter(SR_Player $player)
	{
		parent::onEnter($player);
		$party = $player->getParty();
		$orks = array();
		foreach ($party->getMembers() as $member)
		{
			$orks[] = 'Redmond_Ork';
		}
		$orks[] = 'Redmond_Ork';
		$orks[] = 'Redmond_OrkLeader';
		SR_NPC::createEnemyParty($orks)->fight($party, true);
	}
	
}
?>